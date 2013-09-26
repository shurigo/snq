<?php
  $_SERVER = array();
  $_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__).'/../../..');
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  include($_SERVER['DOCUMENT_ROOT'].'/lib/log4php/Logger.php');
	
	$config_path = realpath($_SERVER['DOCUMENT_ROOT'].'/config/log4php.xml');
	Logger::configure($config_path);

	abstract class BaseLoader {
		private $file_name;
		private $extension;
    private $skip_first_row;
		
		protected $error_count = 0;
		protected $success_count = 0;
		protected $logger;
		protected $mailer;
		protected $fields;

		const FIELD_SEPARATOR = ';';
		const MAX_LINE_LENGTH = 1000;

		protected function __construct($file_name, $skip_first_row = false) {
			$this->file_name = $file_name;
			$this->extension = pathinfo($file_name, PATHINFO_EXTENSION);
      $this->skip_first_row = $skip_first_row;
			$fields = array();
			if(!CModule::IncludeModule('iblock')) die('failed to include iblock module');
			$this->mailer = Logger::getLogger('mailer');
		}

		protected function validate(array $data) {
			foreach($this->fields as $field) {
				if($field->type == FieldInfo::NUMBER_TYPE) {
					if(!$this->validateNumber($data[$field->column])) {
					  $this->logger->error("Validation of field '$field->name' failed. Invalid number: '".$data[$field->column]."'");
						return false;
					}
				}
				elseif($field->type == FieldInfo::STRING_TYPE) {
					if(!$this->validateString($data[$field->column])) {
						$this->logger->error("Validation of field '$field->name' failed. Invalid string '".$data[$field->column]."'");
						return false;
					}
				} 
				elseif($field->type == FieldInfo::PRICE_TYPE) {
					if(!$this->validatePrice($data[$field->column])) {
						$this->logger->error("Validation of field '$field->name' failed. Invalid price '".$data[$field->column]."'");
						return false;
					}
				} else {
				  $this->logger->warn("Unknown field type: $field->type");
					return false;
				}
			}
		  return true;
		}

		abstract function update(array $data);

		function load() {
			$this->logger->info("Loading data...");
			$this->logger->info($this->fields);
			if(!(file_exists($this->file_name) && is_readable($this->file_name))) {
				$this->error_count++;
				$this->logger->error("File does not exist or not readable: $this->file_name");
				return;
			}
			$this->logger->info("File exists. Loading from: $this->file_name");
			try {
				$file_handle = fopen($this->file_name, 'r');
				if(!$file_handle) {
				  $this->error_count++;
					$this->logger->error("Failed to open file for reading: $this->file_name");
					return;
				}
				while(($data = fgetcsv($file_handle, self::MAX_LINE_LENGTH, self::FIELD_SEPARATOR))) {
          if($this->skip_first_row) {
            $this->skip_first_row = false;
					  continue;	
          }
					if(!($this->validate($data) && $this->update($data))) {
						$this->logger->error('Failed to update an item. Data:'.print_r($data, true));
						$this->error_count++;
						continue;
					}
					$this->success_count++;
				}
				fclose($file_handle);
			} catch(Exception $e) {
				$this->logger->error('Failed to open file for reading:'.$this->file_name, $e);
			}
			$msg = "Load complete. Successful: $this->success_count, Errors: $this->error_count";
			$this->logger->info($msg);
			$this->mailer->info($msg);
		}

		protected function validateNumber($input) {
			$this->logger->debug("validateNumber.input:$input");
			return is_numeric(str_replace(' ', '', trim($input)));
		}

		protected function validateString($input) {
			$this->logger->debug("validateString.input:$input");
		  return is_string($input) && (strlen(trim($input)) != 0);
		}

		protected function validatePrice($input) {
		  $this->logger->debug("validatePrice.input:$input");
			return $this->validateNumber($input) && $input >= 0;
		}
	}

	class FieldInfo {
		const STRING_TYPE = 'string';
		const NUMBER_TYPE = 'number';
		const PRICE_TYPE  = 'price';

		public $name;
		public $column;
		public $type;

		public function __construct($name, $column, $type = FieldInfo::STRING_TYPE) {
		  $this->name = $name;
			$this->column = $column;
			$this->type = $type;
		}

		public function __toString() {
		  return "FieldInfo[name=$name,column=$column,type=$type]";
		}
	}
/*
	class PriceLoader extends BaseLoader {

		public function __construct($file_name) {
			parent::__construct($file_name);
			$this->logger = Logger::getLogger(__CLASS__);
			$this->logger->debug('ctor()');
			$this->fields['ID'] = new FieldInfo('ID',           0, FieldInfo::NUMBER_TYPE);
			$this->fields['MODEL_CODE'] = new FieldInfo('MODEL_CODE',   1, FieldInfo::STRING_TYPE);
			$this->fields['PRICE_ORIGIN'] = new FieldInfo('PRICE_ORIGIN', 3, FieldInfo::PRICE_TYPE);
			$this->fields['PRICE_FIELD'] = new FieldInfo('PRICE_FIELD',  4, FieldInfo::PRICE_TYPE);
		}

		public function validate(array $data) {
			$this->logger->debug('validate');
			return parent::validate($data);
		}

		public function update(array $data) {
			$this->logger->debug('update');
			$model_code   = $data[$this->fields['MODEL_CODE']->column];
			$id           = $data[$this->fields['ID']->column];
			$price_origin = $data[$this->fields['PRICE_ORIGIN']->column];
			$price        = $data[$this->fields['PRICE_FIELD']->column];
			$db_elements = CIBlockElement::GetList( 
				array(),
				array(
					'IBLOCK_ID' => 1,
					'PROPERTY_col_model_code' => $model_code,
					'ID' => IntVal($id)
				)
		  );
			if(!$db_element = $db_elements->GetNextElement()) {
				$this->logger->warn("Cannot find an item with model code=$model_code, id=$id");
				return false;
		  }
			$element = $db_element->GetFields();
			$element['PROPERTIES'] = $db_element->GetProperties();
    	$update_element = new CIBlockElement;
			$prop = array();

			foreach($element["PROPERTIES"] as $property) {
				if($property['PROPERTY_TYPE'] == 'L') {
					$prop[$property['ID']] = array('VALUE' => $property['VALUE_ENUM_ID']);
				} else {
					$prop[$property["ID"]] = $property['PROPERTY_TYPE'] == 'F' ? CFile::MakeFileArray($property['VALUE']) : $property["VALUE"];
				}
			}

			$prop[13] = $price_origin;
			$prop[3]  = $price;

			$db_element_fields = Array(
				      'MODIFIED_BY' => 1,
				'IBLOCK_SECTION_ID' => $element['IBLOCK_SECTION_ID'],
				        'IBLOCK_ID' => 1,
			 	 'PROP ERTY_VALUES' => $prop,
			 	             'NAME' => $element['NAME'],
				           'ACTIVE' => 'Y',
			 	     'PREVIEW_TEXT' => $element['PREVIEW_TEXT'],
				      'DETAIL_TEXT' => $element['DETAIL_TEXT'],
				  'PREVIEW_PICTURE' => CFile::MakeFileArray($element['PREVIEW_PICTURE']),
			 	   'DETAIL_PICTURE' => CFile::MakeFileArray($element['DETAIL_PICTURE'])
			);

			if($update_element_id = $update_element->Update($element["ID"], $db_element_fields)) {
				$this->logger->info("Successfully updated: model code:$model_code, id=".$element['ID'].", old price=$price_origin, new price=$price");
				return true;
			}

			$this->logger->error("Failed to update an item with model code:$model_code. Error: $update_element->LAST_ERROR");

			return false;
		}
	}
 */ 
  class NomenclatureLoader extends BaseLoader {
		const iblock_code = 'nomenclature';

		public function __construct($file_name, $skip_first_row = false) {
			parent::__construct($file_name, $skip_first_row);
			$this->logger = Logger::getLogger(__CLASS__);
			$this->logger->debug('ctor()');
			$this->fields['IDMFC']  = new FieldInfo('IDMFC',  1, FieldInfo::NUMBER_TYPE);
			$this->fields['ART_NO'] = new FieldInfo('ART_NO', 2, FieldInfo::NUMBER_TYPE);
			$this->fields['SIZE']   = new FieldInfo('SIZE',   3, FieldInfo::STRING_TYPE);
		}

		public function init() {
			$this->logger->debug('init');
      $iblock_id = getIblockIdByName(self::iblock_code);
			$elements = CIBlockElement::GetList( 
				array(),
				array(
					'IBLOCK_ID' => $iblock_id,
				)
		  );
			while($element = $elements->Fetch()) {
				$this->logger->info('Deleting id='.$element['ID']);
				CIBlockElement::Delete($element['ID']);
			}
		}

		public function validate(array $data) {
			$this->logger->debug('validate');
			return parent::validate($data);
		}

		public function update(array $data) {
			$this->logger->debug('update');
			$idmfc  = $data[$this->fields['IDMFC']->column];
			$art_no = $data[$this->fields['ART_NO']->column];
			$size   = $data[$this->fields['SIZE']->column];
			
			$iblock_id = getIblockIdByName(self::iblock_code);
      
      $props_db = CIBlockProperty::GetList(array(), array('IBLOCK_ID' => $iblock_id, 'ACTIVE' => 'Y', 'CHECK_PERMISSIONS' => 'N'));

      $props = array();
			while($prop = $props_db->GetNext()) {
				if($prop['CODE'] == 'col_idmfc')   $props[$prop['ID']] = $idmfc;
        if($prop['CODE'] == 'col_size')    $props[$prop['ID']] = $size;
			}
			$item = Array(
				'MODIFIED_BY'    => 1,
				'IBLOCK_SECTION_ID' => false,
				'IBLOCK_ID'      => IntVal($iblock_id),
				'PROPERTY_VALUES'=> $props,
				'NAME'           => $art_no,
				'ACTIVE'         => 'Y',
			);

			$element = new CIBlockElement;
      if($item_id = $element->Add($item)) {
				$this->logger->info("Successfully added: id=$item_id, idmfc=$idmfc, art no=$art_no, size=$size");
        return true;
      }

			$this->logger->error("Failed to add an item: idmfc=$idmfc, art no: $art_no, size: $size. Error: $item_id->LAST_ERROR");

			return false;
		}
	}
	
	class RemainderLoader extends BaseLoader {
		const iblock_code = 'remainder';

		public function __construct($file_name, $skip_first_row = false) {
			parent::__construct($file_name, $skip_first_row);
			$this->logger = Logger::getLogger(__CLASS__);
			$this->logger->debug('ctor()');
			$this->fields['ART_NO'] = new FieldInfo('ART_NO', 0, FieldInfo::NUMBER_TYPE);
			$this->fields['SHOP_EXT_ID'] = new FieldInfo('SHOP_EXT_ID', 1, FieldInfo::NUMBER_TYPE);
			$this->fields['QUANTITY']   = new FieldInfo('QUANTITY', 2, FieldInfo::STRING_TYPE);
		}

		public function init() {
			$this->logger->debug('init');
      $iblock_id = getIblockIdByName(self::iblock_code);
			$elements = CIBlockElement::GetList( 
				array(),
				array('IBLOCK_ID' => $iblock_id)
		  );
			while($element = $elements->Fetch()) {
				$this->logger->info('Deleting id='.$element['ID']);
				CIBlockElement::Delete($element['ID']);
			}
		}

		public function validate(array $data) {
			$this->logger->debug('validate');
			return parent::validate($data);
		}

		public function update(array $data) {
			$this->logger->debug('update');
			$art_no      = $data[$this->fields['ART_NO']->column];
			$shop_ext_id = $data[$this->fields['SHOP_EXT_ID']->column];
			$quantity    = $data[$this->fields['QUANTITY']->column];
			
			$iblock_id = getIblockIdByName(self::iblock_code);
      
      $props_db = CIBlockProperty::GetList(array(), array('IBLOCK_ID' => $iblock_id, 'ACTIVE' => 'Y', 'CHECK_PERMISSIONS' => 'N'));

      $props = array();
			while($prop = $props_db->GetNext()) {
				if($prop['CODE'] == 'col_nomenclature_id') $props[$prop['ID']] = $art_no;
        if($prop['CODE'] == 'col_quantity')        $props[$prop['ID']] = $quantity;
				if($prop['CODE'] == 'col_shop_id') 				 $props[$prop['ID']] = $shop_ext_id;
			}
			$item = Array(
				'MODIFIED_BY'       => 1,
				'IBLOCK_SECTION_ID' => false,
				'IBLOCK_ID'         => IntVal($iblock_id),
				'PROPERTY_VALUES'   => $props,
				'NAME'              => join('-', array($art_no, $shop_ext_id, $quantity)),
				'ACTIVE'            => 'Y',
			);
      $element = new CIBlockElement;
      if($item_id = $element->Add($item)) {
				$this->logger->info("Successfully added: id=$item_id, art no=$art_no, shop id=$shop_ext_id, quantity=$quantity");
        return true;
      }

			$this->logger->error("Failed to add an item: art no=$art_no, shop id=$shop_ext_id, quantity=$quantity. Error: $item_id->LAST_ERROR");

			return false;
		}
	}

	set_time_limit(21600); // 6 hours

//  Example usage:

//  $price_loader = new PriceLoader('price.csv');
//	$price_loader->load();
	
//  $nomenclature_loader = new NomenclatureLoader('nomenclature.csv', true);
// 	$nomenclature_loader->init();
//	$nomenclature_loader->load();

?>
