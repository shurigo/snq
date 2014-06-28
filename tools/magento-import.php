<?php
//  include($_SERVER['DOCUMENT_ROOT'].'/lib/log4php/Logger.php');
	
//	$config_path = realpath($_SERVER['DOCUMENT_ROOT'].'/config/log4php.xml');
//	Logger::configure($config_path);
	function convert($input) {
		return iconv('cp1251', 'UTF-8', $input);
	}

	function convert_cyrillic($input) {
		return iconv('UTF-8', 'cp1251', $input);
	}

	function startsWith($haystack, $needle) {
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}

	function endsWith($haystack, $needle) {
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}
		return (substr($haystack, -$length) === $needle);
	}

  class MagentoImport {
		private $file_name;
		private $extension;
		private $output_file_name;

		protected $error_count = 0;
		protected $success_count = 0;
		//protected $logger;
		//protected $mailer;

		const FIELD_SEPARATOR_SNQ = ';';
		const FIELD_SEPARATOR_MAGENTO = ',';
		const MAX_LINE_LENGTH = 5000;

		// Magento required fields
    private $magento_fields = array(
      'sku',
      '_attribute_set',
      '_type',
      '_category',
      '_product_websites',
      'country_of_manufacture',
      'description',
      'manufacturer',
      'name',
      'price',
			'special_price',
			'color',
      'product_articule',
      'product_collection',
      'product_idfmc',
      'product_size',
      'short_description',
//			'collection',
      'status',
      'visibility',
      'is_in_stock',
      'weight',
			'tax_class_id',
			'manage_stock',
			'qty',
			'_root_category',
			'_super_products_sku',
			'_super_attribute_code', // = 'product_size'
			'_super_attribute_option',
			'has_options',
			'required_options'
    );

		// Snowqueen export fields
		private $snq_fields = array(
			'IDSCU',
			'IDMARTCARD',
			'VSARTMODEL',
			'VSARTCOLORDESC',
			'VARTLABEL',
			'S163',
			'VTRADEMARK',
			'VARTCOUNTRYRUS',
			'VSARTSIZE',
			'VARTSIZE',
			'NDS',
			'ZPRICE',
			'PLPRICE',
			'VSARTFACTURE',
			'VCARE',
			'VHUDDESCR',
			'VCOLLECTION'
		);

		public function __construct($file_name, $output_file_name) {
			$this->file_name = $file_name;
			$this->extension = pathinfo($file_name, PATHINFO_EXTENSION);
			$this->output_file_name = $output_file_name;
		}

		function SnqToMageProducts() {
					$category_map = array(
						'Платье' => 'Платья',
						'Блузка' =>	'Блузки',
						'Брюки' =>  'Брюки/Джинсы',
						'Джемпер' =>  'Кардиганы и джемперы',
						'Джинсы' =>  'Брюки/Джинсы',
						'Жакет' =>  'Куртки',
						'Жилет' =>  'Куртки',
						'Кардиган' =>  'Кардиганы и джемперы',
						'Комбинезон' =>  'Шорты и комбинезоны',
						'Пиджак' =>  'Пиджаки',
						'Платье' =>  'Платья',
						'Поло' =>  'Футболки',
						'Рубашка' =>  'Рубашки',
						'Толстовка' =>  'Куртки',
						'Топ' =>  'Футболки и топы',
						'Туника' =>  'Туники',
						'Футболка' =>  'Футболки и топы',
						'Футболка с длинным рукавом' =>  'Футболки и топы',
						'Шорты' =>  'Шорты',
						'Юбка' =>  'Юбки'
					);
//			$this->logger->info("Loading data...");
//			$this->logger->info($this->fields);
			if(!(file_exists($this->file_name) && is_readable($this->file_name))) {
				$this->error_count++;
//				$this->logger->error("File does not exist or not readable: $this->file_name");
				return;
			}
//			$this->logger->info("File exists. Loading from: $this->file_name");

			// Build indexed array with magento headers
			$hdr_magento = array();
			for($hdr_i = 0; $hdr_i < count($this->magento_fields); ++$hdr_i) {
				$hdr_magento[$this->magento_fields[$hdr_i]] = $hdr_i;
			}

			$data_new = array();
			try {
				$file_handle = fopen($this->file_name, 'r');
				if(!$file_handle) {
				  $this->error_count++;
//					$this->logger->error("Failed to open file for reading: $this->file_name");
					return;
				}

				// Get column numbers from header, skip empty columns
				$hdr_snowqueen = array();
				$hdr_raw = fgetcsv($file_handle, self::MAX_LINE_LENGTH, self::FIELD_SEPARATOR_SNQ);
				for($hdr_i = 0; $hdr_i < count($hdr_raw); ++$hdr_i) {
					if(!empty($hdr_raw[$hdr_i])) {
						$hdr_snowqueen[$hdr_raw[$hdr_i]] = $hdr_i;
					}
				}

				// Read data lines
				while(($data_str = fgets($file_handle, 4096)) !== false) {
					$data = str_getcsv($data_str, self::FIELD_SEPARATOR_SNQ);
					// Assign data to known fields
					$buf = array();
					$buf[$hdr_magento['sku']] = $data[$hdr_snowqueen['IDSCU']];
					$buf[$hdr_magento['product_idfmc']] = $data[$hdr_snowqueen['IDMARTCARD']];
					$idfmc = $buf[$hdr_magento['product_idfmc']];
					$buf[$hdr_magento['product_articule']] = $data[$hdr_snowqueen['VSARTMODEL']];
					$buf[$hdr_magento['color']] = $data[$hdr_snowqueen['VSARTCOLORDESC']];
					$buf[$hdr_magento['name']] = $data[$hdr_snowqueen['VARTLABEL']];
					// If brand is empty default to NONAME
					$buf[$hdr_magento['manufacturer']] = empty($data[$hdr_snowqueen['VTRADEMARK']]) ? 'NONAME' : $data[$hdr_snowqueen['VTRADEMARK']];
					// Correct spelling to match magento country list
					$buf[$hdr_magento['country_of_manufacture']] = convert($data[$hdr_snowqueen['VARTCOUNTRYRUS']]) == 'Тайланд' ? convert_cyrillic('Таиланд') : $data[$hdr_snowqueen['VARTCOUNTRYRUS']];
					$buf[$hdr_magento['product_size']] = str_replace('.', '', $data[$hdr_snowqueen['VARTSIZE']]);
					$buf[$hdr_magento['price']] = $data[$hdr_snowqueen['PLPRICE']];
					$buf[$hdr_magento['special_price']] = $data[$hdr_snowqueen['ZPRICE']];
					$buf[$hdr_magento['description']] = $data[$hdr_snowqueen['VHUDDESCR']];
					$buf[$hdr_magento['short_description']] = $data[$hdr_snowqueen['VHUDDESCR']];
					$buf[$hdr_magento['product_collection']] = $data[$hdr_snowqueen['VCOLLECTION']];
					$buf[$hdr_magento['status']] = 1;
					$buf[$hdr_magento['visibility']] = 1;
					$buf[$hdr_magento['is_in_stock']] = 1;
					$buf[$hdr_magento['weight']] = 1;
					$buf[$hdr_magento['tax_class_id']] = 0;
					$buf[$hdr_magento['manage_stock']] = 1;
					$buf[$hdr_magento['_attribute_set']] = 'Default';
					$buf[$hdr_magento['_type']] = 'simple';
					$buf[$hdr_magento['_super_products_sku']] = '';
					$buf[$hdr_magento['_super_attribute_code']] = '';
					$buf[$hdr_magento['_super_attribute_option']] = '';
					$category = null;
					if($data[$hdr_snowqueen['S163']] == convert_cyrillic('Женский')) {
						$category = convert_cyrillic('Женщины');
					} else if($data[$hdr_snowqueen['S163']] == convert_cyrillic('Мужской')) {
						$category = convert_cyrillic('Мужчины');
					}
					$category2 = convert_cyrillic($category_map[trim(convert($data[$hdr_snowqueen['VARTLABEL']]))]);
					$buf[$hdr_magento['_category']] = $category;
					$buf[$hdr_magento['qty']] = 1;
					$buf[$hdr_magento['_root_category']] = 'Default Category';
					$buf[$hdr_magento['_product_websites']] = 'base';

					// convert to utf-8
					$buf = array_map('trim', $buf);
					$buf = array_map('convert', $buf);
					ksort($buf);

					$data_new[$idfmc][] = $buf;
					$buf = array_fill(0, count($buf), null);
					$buf[$hdr_magento['_category']] = "$category/$category2";
					$buf = array_map('convert', $buf);
					ksort($buf);

					$data_new[$idfmc][] = $buf;
				}
				fclose($file_handle);
			} catch(Exception $e) {
				echo('Failed to open file for reading:'.$this->file_name . ':'.$e);
//				$this->logger->error('Failed to open file for reading:'.$this->file_name, $e);
			}

			// Write to magento file
			try {
				$file_handle_out = fopen($this->output_file_name, 'w+');
				if(!$file_handle_out) {
					$this->error_count++;
//					$this->logger->error("Failed to open file for reading: $this->file_name");
					return;
				}
				// Write header
				fputcsv($file_handle_out, array_keys($hdr_magento), self::FIELD_SEPARATOR_MAGENTO);
				foreach($data_new as $idfmc => $data) {
					if(count($data) > 1) { // Configurable
						$configurable = array();
						$category2 = $data[1][$hdr_magento['_category']];
						foreach($data as $data_row) {
							if(!is_array($data_row) || count($data_row) <= 0) continue;
							fputcsv($file_handle_out, $data_row, self::FIELD_SEPARATOR_MAGENTO);
							// create main 'configurable' product
						  if(count($configurable) == 0) {
								$buf = $data_row;
								$buf[$hdr_magento['sku']] = $buf[$hdr_magento['sku']].'-c';
								$buf[$hdr_magento['_type']] = 'configurable';
								$buf[$hdr_magento['product_size']] = '';
								$buf[$hdr_magento['visibility']] = '4';
								$buf[$hdr_magento['has_options']] = '1';
								$buf[$hdr_magento['required_options']] = '1';
							} else { // associated product
								$buf = array_fill(0, count($data_row), '');
								$buf[$hdr_magento['visibility']] = 1;
							} // associated product attributes
							$buf[$hdr_magento['_super_products_sku']] = $data_row[$hdr_magento['sku']];
							$buf[$hdr_magento['_super_attribute_code']] = 'product_size';
							$buf[$hdr_magento['_super_attribute_option']] = $data_row[$hdr_magento['product_size']];
							ksort($buf);
							$configurable[] = $buf; 
							if(count($configurable) == 1) {
								$buf = array_fill(0, count($data_row), '');
								ksort($buf);
							  $buf[$hdr_magento['_category']] = $category2;
								$configurable[] = $buf;
							}
						}
						foreach($configurable as $data_row) {
							if(!is_array($data_row) || count($data_row) <= 0) continue;
							if(empty($data_row[$hdr_magento['_super_attribute_option']]) && empty($data_row[$hdr_magento['_category']])) continue;
							fputcsv($file_handle_out, $data_row, self::FIELD_SEPARATOR_MAGENTO);
						}
					} else { // Simple product
						if(!is_array($data) || count($data) <= 0) continue;
						$data[$hdr_snowqueen['visibility']] = '4';
						fputcsv($file_handle_out, $data, self::FIELD_SEPARATOR_MAGENTO);
					}
				}
			} catch(Exception $e) {
				echo('Failed to open file for writing:'.$this->output_file_name . ':'.$e);
			}
			fclose($file_handle_out);
//			$msg = "Load complete. Successful: $this->success_count, Errors: $this->error_count";
//			$this->logger->info($msg);
//			$this->mailer->getAppender('mailAppender')->setSubject($this->logger->getName());
//			$this->mailer->info($msg);
		}
	}
	define('SNQ_FILE', '', true);
	define('MGE_FILE', '', true);
	$mi = new MagentoImport(SNQ_FILE, MGE_FILE);
	$mi->SnqToMageProducts();
?>
