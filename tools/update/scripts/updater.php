<?php
  $_SERVER = array();
  $_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__).'/../../../');
	include($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
//  require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/log4php/Logger.php');
	$config_path = realpath($_SERVER['DOCUMENT_ROOT'].'/config/log4php.xml');
  Logger::configure($config_path);

	abstract class BaseLoader {
		private $file_name;
		private $extension;
		
		protected $error_count;
		protected $logger;
		protected $fields;

		const FIELD_SEPARATOR = ',';
		const MAX_LINE_LENGTH = 1000;

		protected function __construct($file_name) {
			$this->file_name = $file_name;
			$this->extension = pathinfo($file_name, PATHINFO_EXTENSION);
			$fields = array();
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

		function Load() {
			$this->logger->info("Loading data...");
			//$this->logger->info('Field mapping:'.print_r($this->fields, true));
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
				if(!CModule::IncludeModule('iblock')) {
					$this->logger->fatal('Cannot include the iblock module');
					return;
				}
				while(($data = fgetcsv($file_handle, self::MAX_LINE_LENGTH, self::FIELD_SEPARATOR))) {
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
			$this->logger->info("error count: $this->error_count");
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
			if(!CModule::IncludeModule("iblock")) {
			  $this->logger->debug('iblock error');
			}
    	$update_element = new CIBlockElement;
			$db_elements = CIBlockElement::GetList( 
				array(),
				array(
					"IBLOCK_ID" => "1",
					"PROPERTY_col_model_code" => $model_code,
					"ID" => $id
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
				$this->logger->info("Successfully updated: model code:$model_code, id=$update_element_id, old price=$price_origin, new price=$price");
				return true;
			}

			$this->logger->error("Failed to update an item with model code:$model_code. Error: $update_element->LAST_ERROR");

			return false;
		}
	}

	set_time_limit(21600); // 6 часов

	// Example usage
	$l = new PriceLoader('price.csv');
	$l->Load();
  require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
