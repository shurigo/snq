<?php
ini_set('memory_limit', '512M');
//  include($_SERVER['DOCUMENT_ROOT'].'/lib/log4php/Logger.php');
	
//	$config_path = realpath($_SERVER['DOCUMENT_ROOT'].'/config/log4php.xml');
//	Logger::configure($config_path);

  // source: http://stackoverflow.com/a/2518021/1292905
	function mb_ucfirst($string, $encoding) {
		$strlen = mb_strlen($string, $encoding);
		$firstChar = mb_substr($string, 0, 1, $encoding);
		$then = mb_substr($string, 1, $strlen - 1, $encoding);
		return mb_strtoupper($firstChar, $encoding) . $then;
	}

	function convert($input) {
		print $input;
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

	// http://htmlweb.ru/php/example/translit.php
	function rus2translit($string) {
		$converter = array(
			'а' => 'a',   'б' => 'b',   'в' => 'v',
			'г' => 'g',   'д' => 'd',   'е' => 'e',
			'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
			'и' => 'i',   'й' => 'y',   'к' => 'k',
			'л' => 'l',   'м' => 'm',   'н' => 'n',
			'о' => 'o',   'п' => 'p',   'р' => 'r',
			'с' => 's',   'т' => 't',   'у' => 'u',
			'ф' => 'f',   'х' => 'h',   'ц' => 'c',
			'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
			'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
			'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
			'А' => 'A',   'Б' => 'B',   'В' => 'V',
			'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
			'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
			'И' => 'I',   'Й' => 'Y',   'К' => 'K',
			'Л' => 'L',   'М' => 'M',   'Н' => 'N',
			'О' => 'O',   'П' => 'P',   'Р' => 'R',
			'С' => 'S',   'Т' => 'T',   'У' => 'U',
			'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
			'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
			'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		);
		return strtr($string, $converter);
	}

	function str2url($str) {
		// переводим в транслит

		$str = rus2translit($str);

		// в нижний регистр
		$str = strtolower($str);

		// заменям все ненужное нам на "-"
		$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);

		// удаляем начальные и конечные '-'
		$str = trim($str, "-");

		return $str;
	}

  class MagentoImport {
		protected $error_count = 0;
		protected $success_count = 0;
		//protected $logger;
		//protected $mailer;

		const FIELD_SEPARATOR_SNQ = ',';
		const FIELD_SEPARATOR_MAGENTO = ',';
		const MAX_LINE_LENGTH = 5000;
		const READ_BUFFER = 4096;

		public $image_folder = '';

		// Magento fields
    private $magento_fields_product = array(
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
			'url_key',
			'meta_title',
			'meta_keyword',
			'meta_description',
      'product_size',
      'short_description',
      'status',
      'visibility',
      'is_in_stock',
      'weight',
			'tax_class_id',
			'manage_stock',
			'qty',
			'_root_category',
			'image',
			'small_image',
			'thumbnail',
			'_super_products_sku',
			'_super_attribute_code', // = 'product_size'
			'_super_attribute_option',
			'has_options',
			'_custom_option_is_required',
			'_custom_option_type',
			'_media_attribute_id', //default=88, determine select attribute_id from eav_attribute where attribute_code = 'media_gallery';
			'_media_position',
			'_media_image',
			'_media_is_disabled',
			'_media_lable',
			'_custom_option_row_title'
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
			//'VCARE',
			'VHUDDESCR',
			'VCOLLECTION'
		);

		// rename SNQ categories
		private $product_category_map = array(
			'Платье' => 'Платья',
			'Блузка' =>	'Блузки',
			'Брюки' =>  'Брюки/Джинсы',
			'Ветровка' => 'Куртки',
			'Водолазка' => 'Кардиганы и джемперы',
			'Джемпер' =>  'Кардиганы и джемперы',
			'Джемпер с коротким рукавом' => 'Кардиганы и джемперы',
			'Джинсы' =>  'Брюки/Джинсы',
			'Дубленка' => 'Дубленки',
			'Жакет' =>  'Куртки',
			'Жакет меховой' => 'Куртки',
			'Жилет' =>  'Куртки',
			'Жилет утепленный' => 'Куртки',
			'Жилет меховой' => 'Куртки',
			'Капри' => 'Брюки/Джинсы',
			'Кардиган' =>  'Кардиганы и джемперы',
			'Ключница из натуральной кожи' => 'Аксессуары',
			'Комбинезон' =>  'Шорты и комбинезоны',
			'Кошелек' => 'Аксессуары',
			'Кошелек из натуральной кожи' => 'Аксессуары',
			'Куртка' => 'Куртки',
			'Куртка из меховой ткани' => 'Куртки',
			'Куртка кожаная' => 'Куртки',
			'Куртка меховая' => 'Куртки',
			'Куртка овчинная' => 'Куртки',
			'Куртка пуховая' => 'Куртки',
			'Куртка утепленная мехом' => 'Куртки',
			'Куртка утепленная' => 'Куртки',
			'Куртка утепленная зимняя' => 'Куртки',
			'Леггинсы' => 'Брюки/Джинсы',
			'Мелкая кожгалантерея' => 'Аксессуары',
			'Обложка на паспорт' => 'Аксессуары',
			'Очки' => 'Аксессуары',
			'Пальто' => 'Пальто',
			'Пальто утепленное' => 'Пальто',
			'Пальто шерстяное' => 'Пальто',
			'Плащ' => 'Пальто',
			'Пальто пуховое' => 'Пальто',
			'Пальто утепленное зимнее' => 'Пальто',
			'Полупальто' => 'Пальто',
			'Полупальто меховое' => 'Пальто',
			'Полупальто из натуральной кожи' => 'Пальто',
			'Портмоне' => 'Аксессуары',
			'Пиджак' => 'Пиджаки',
			'Платье' => 'Платья',
			'Поло' => 'Футболки и топы',
			'Портмоне из натуральной кожи' => 'Аксессуары',
			'Рубашка' => 'Рубашки',
			'Свитер' => 'Кардиганы и джемперы',
			'Сумка' => 'Аксессуары',
			'Толстовка' => 'Куртки',
			'Топ' => 'Футболки и топы',
			'Туника' => 'Туники',
			'Футболка' => 'Футболки и топы',
			'Футболка с длинным рукавом' => 'Футболки и топы',
			'Чехол для ipad' => 'Аксессуары',
			'Чехол для iPad' => 'Аксессуары',
			'Шорты' => 'Шорты',
			'Шуба' => 'Шубы и меха',
			'Юбка' => 'Юбки'
		);

		// SNQ price update csv file columns
		private $snq_fields_price = array(
			'IDFMC',
			'PRICE',
			'SALEPRICE',
			'QTY'
		);

		// Magento price update csv file columns
		private $magento_fields_price = array(
			'sku',
			'price',
			'special_price',
			'qty'
		);

		public function __construct() {
		}

		function SnqToMagePrice($file_name, $output_file_name, $has_header = false) {
		}

		function SnqToMageProducts($file_name, $output_file_name, $has_header = false, $image_dir) {
			print "Loading data...\n";
			print "Input:$file_name\nOutput:$output_file_name\nHas header:$has_header\n";
			if(!(file_exists($file_name) && is_readable($file_name))) {
				$this->error_count++;
				print "File does not exist or not readable: $file_name\n";
				return;
			}
			print "File exists. Loading from: $file_name\n";

			// Build indexed array with magento headers
			$hdr_magento = array();
			for($hdr_i = 0; $hdr_i < count($this->magento_fields_product); ++$hdr_i) {
				$hdr_magento[$this->magento_fields_product[$hdr_i]] = $hdr_i;
			}

			$data_new = array();
			try {
				$file_handle = fopen($file_name, 'r');
				if(!$file_handle) {
				  $this->error_count++;
//					$this->logger->error("Failed to open file for reading: $this->file_name");
					return;
				}

				// Get column numbers from header, skip empty columns
				$hdr_snowqueen = array();
				$hdr_raw = $has_header ? fgetcsv($file_handle, self::MAX_LINE_LENGTH, self::FIELD_SEPARATOR_SNQ) : $this->snq_fields;
				for($hdr_i = 0; $hdr_i < count($hdr_raw); ++$hdr_i) {
					if(!empty($hdr_raw[$hdr_i])) {
						$hdr_snowqueen[$hdr_raw[$hdr_i]] = $hdr_i;
					}
				}

				$line = 1;
				// Read data lines
				while(($data_str = fgets($file_handle, self::READ_BUFFER)) !== false) {
					++$line; // debug
					$data = str_getcsv($data_str, self::FIELD_SEPARATOR_SNQ);
					// Assign data to known fields
					$buf = array_fill(0, count($hdr_magento), null);
					$buf[$hdr_magento['sku']] = $data[$hdr_snowqueen['IDSCU']];
					$buf[$hdr_magento['product_idfmc']] = $data[$hdr_snowqueen['IDMARTCARD']];
					$idfmc = $buf[$hdr_magento['product_idfmc']];
					$buf[$hdr_magento['product_articule']] = $data[$hdr_snowqueen['VSARTMODEL']];
					$buf[$hdr_magento['color']] = $data[$hdr_snowqueen['VSARTCOLORDESC']];
					$buf[$hdr_magento['name']] = $data[$hdr_snowqueen['VARTLABEL']];
					// If brand is empty default to NONAME
					$buf[$hdr_magento['manufacturer']] = empty($data[$hdr_snowqueen['VTRADEMARK']]) ? 'NONAME' : $data[$hdr_snowqueen['VTRADEMARK']];
					// Correct spelling to match magento country list
					$country = mb_convert_case($data[$hdr_snowqueen['VARTCOUNTRYRUS']], MB_CASE_TITLE, 'UTF-8'); 
					if($country == 'Тайланд') {
						$country = 'Таиланд';
					} else if($country == 'Гонконг') {
						$country = 'Гонконг, Особый Административный Район Китая';
					} else if($country == 'Республика Македония') {
						$country = 'Македония';
					} else if($country == 'Чешская Республика') {
						$country = 'Чешская республика';
					}
					$buf[$hdr_magento['country_of_manufacture']] = $country;
					//$buf[$hdr_magento['product_size']] = str_replace('.', '', $data[$hdr_snowqueen['VARTSIZE']]);
					$buf[$hdr_magento['product_size']] = str_replace('.', '', $data[$hdr_snowqueen['VSARTSIZE']]);
					$buf[$hdr_magento['price']] = $data[$hdr_snowqueen['PLPRICE']];
					$buf[$hdr_magento['special_price']] = $data[$hdr_snowqueen['ZPRICE']];
					$buf[$hdr_magento['description']] = empty($data[$hdr_snowqueen['VHUDDESCR']]) ? $data[$hdr_snowqueen['VARTLABEL']] . ' ' . $buf[$hdr_magento['manufacturer']] : $data[$hdr_snowqueen['VHUDDESCR']];
					$buf[$hdr_magento['short_description']] = $buf[$hdr_magento['description']];
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
					if($data[$hdr_snowqueen['S163']] == 'Женский') {
						$category = 'Женщины';
					} else if($data[$hdr_snowqueen['S163']] == 'Мужской') {
						$category = 'Мужчины';
					} else {
						print 'WARN: Unknown category: '.$data[$hdr_snowqueen['S163']].". Ignored\n";
						continue;
					}
					$category2 = null;
					$src_category = trim($data[$hdr_snowqueen['VARTLABEL']]);
					if(empty($src_category)) {
						print "ERROR: category is empty";
					}
					if(!isset($this->product_category_map[$src_category])) {
						print "ERROR: Failed to map category:\t$src_category\n";
						print $data_str;
					} else {
						$category2 = $this->product_category_map[$src_category];
					}
					if($category2 == 'Шубы и меха') {
						$category = $category2;
					}
					$buf[$hdr_magento['_category']] = $category;
					$buf[$hdr_magento['qty']] = 1;
					$buf[$hdr_magento['_root_category']] = 'Default Category';
					$buf[$hdr_magento['_product_websites']] = 'base';
					$buf[$hdr_magento['url_key']] = str2url(
						implode('-', 
						array(
							$buf[$hdr_magento['name']], 
							$idfmc,
							//$buf[$hdr_magento['sku']],
							$buf[$hdr_magento['manufacturer']],
							$buf[$hdr_magento['product_size']]
						)));

					// convert to utf-8
					$buf = array_map('trim', $buf);
					//$buf = array_map('convert', $buf);
					ksort($buf);
					$data_new[$idfmc][] = $buf;

					if($category != $category2) {
						$buf = array_fill(0, count($hdr_magento), null);
						$buf[$hdr_magento['_category']] = "$category/$category2";
						$buf[$hdr_magento['_attribute_set']] = 'Default';
						//$buf = array_map('convert', $buf);
						ksort($buf);
						$data_new[$idfmc][] = $buf;
					}
				}
				fclose($file_handle);
			} catch(Exception $e) {
				echo('Failed to open file for reading:'.$file_name . ':'.$e);
//				$this->logger->error('Failed to open file for reading:'.$this->file_name, $e);
			}

			// Write to magento file
			try {
				$file_handle_out = fopen($output_file_name, 'w+');
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
								$buf[$hdr_magento['has_options']] = '1';
								$buf[$hdr_magento['_custom_option_is_required']] = '1';
								$buf[$hdr_magento['_custom_option_type']] = 'drop_down';
								$buf[$hdr_magento['visibility']] = '4';
								$buf[$hdr_magento['_custom_option_row_title']] = 'title';
								$buf[$hdr_magento['_media_attribute_id']] = '88';
								$buf[$hdr_magento['_media_lable']] = 'image1';
								$buf[$hdr_magento['_media_position']] = '0';
								$buf[$hdr_magento['_media_is_disabled']] = '0';
								$buf[$hdr_magento['image']] = '/'.$idfmc.'_1.jpg';
								$buf[$hdr_magento['_media_image']] = '/'.$idfmc.'_1.jpg';
								$buf[$hdr_magento['small_image']] = '/'.$idfmc.'_1.jpg';
								$buf[$hdr_magento['thumbnail']] = '/'.$idfmc.'_1.jpg';
								$buf[$hdr_magento['meta_title']] = $buf[$hdr_magento['name']].' (артикул:'.$idfmc.') '.$buf[$hdr_magento['manufacturer']];
								$buf[$hdr_magento['meta_keyword']] = $buf[$hdr_magento['name']].';'.$buf[$hdr_magento['_category']].';'.explode('/', $category2)[1].';'.$buf[$hdr_magento['manufacturer']].';'.$idfmc;
								$buf[$hdr_magento['meta_description']] = $buf[$hdr_magento['description']];
								$buf[$hdr_magento['url_key']] = str2url(
									implode('-', 
									array(
										$buf[$hdr_magento['name']], 
										$idfmc,
										$buf[$hdr_magento['manufacturer']]
									)));
							} else { // associated product
								$buf = array_fill(0, count($hdr_magento), null);
								$buf[$hdr_magento['visibility']] = 1;
							} // associated product attributes
							$buf[$hdr_magento['_attribute_set']] = 'Default';
							$buf[$hdr_magento['_super_products_sku']] = $data_row[$hdr_magento['sku']];
							$buf[$hdr_magento['_super_attribute_code']] = 'product_size';
							$buf[$hdr_magento['_super_attribute_option']] = $data_row[$hdr_magento['product_size']];
							ksort($buf);
							$configurable[] = $buf; 
							if(count($configurable) == 1) {
								$buf = array_fill(0, count($hdr_magento), null);
							  $buf[$hdr_magento['_category']] = $category2;
                $buf[$hdr_magento['_attribute_set']] = 'Default';
								ksort($buf);
								$configurable[] = $buf;
							}
						}
						// add images
						$img_idx = 0;
						foreach(glob($image_dir.'/'.$idfmc.'*.jpg') as $filename) {
							++$img_idx;
              if($img_idx == 1) {
                continue; // skip first default image which's been already assigned
              }
							$buf = array_fill(0, count($hdr_magento), null);
							$buf[$hdr_magento['image']] = "/".basename($filename);
							$buf[$hdr_magento['_media_image']] = "/".basename($filename);
							$buf[$hdr_magento['small_image']] = "/".basename($filename);
							$buf[$hdr_magento['thumbnail']] = "/".basename($filename);
              $buf[$hdr_magento['_media_attribute_id']] = '88';
              $buf[$hdr_magento['_media_lable']] = 'image'.$img_idx;
              $buf[$hdr_magento['_media_position']] = $img_idx;
              $buf[$hdr_magento['_media_is_disabled']] = '0';
							$buf[$hdr_magento['_attribute_set']] = 'Default';
							ksort($buf);
							$configurable[] = $buf;
						}

						foreach($configurable as $data_row) {
							if(!is_array($data_row) || count($data_row) <= 0) continue;
							if(empty($data_row[$hdr_magento['image']]) && empty($data_row[$hdr_magento['_super_attribute_option']]) && empty($data_row[$hdr_magento['_category']])) continue;
							fputcsv($file_handle_out, $data_row, self::FIELD_SEPARATOR_MAGENTO);
						}
					} else { // Simple product
						if(!is_array($data) || count($data) <= 0) continue;
						$data[$hdr_magento['visibility']] = '4';
						$data[$hdr_magento['has_options']] = '1';
						$data[$hdr_magento['_custom_option_is_required']] = '1';
						ksort($data);
						fputcsv($file_handle_out, $data, self::FIELD_SEPARATOR_MAGENTO);
					}
				}
			} catch(Exception $e) {
				echo('Failed to open file for writing:'.$this->output_file_name . ':'.$e);
			}
			fclose($file_handle_out);
			$msg = "Load complete. Successful: $this->success_count, Errors: $this->error_count";
			print "$msg\n";
		}
	}
	$mi = new MagentoImport();
	// argv:
	// 1: input file
	// 2: output file
	// 3: has header (1-yes)
	// 4: image import directory
	
//	print(mb_ucfirst('КИТАЙ', 'CP1251')."\n");
	$mi->SnqToMageProducts($argv[1], $argv[2], $argv[3] == 1, $argv[4]);
?>
