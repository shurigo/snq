<?
  $_SERVER = array();
  $_SERVER['DOCUMENT_ROOT'] = '/home/snowqueen/public_html';
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  require_once("func/func.php");

  set_time_limit(21600); // 6 часов
  $writeToFile = 1;

  define("FIELD_SEPARATOR", ",");
  define("ID_FIELD", 0);
  define("MODEL_CODE_FIELD", 1);
  define("PRICE_ORIGIN_FIELD", 3);
  define("PRICE_FIELD", 4);
  $file_dir = "/home/snqup/";
  $file_name = "price.csv";
  $extension = pathinfo($file_name, PATHINFO_EXTENSION);
  $file_path = $file_dir . DIRECTORY_SEPARATOR . $file_name;
  $rename_file_name = pathinfo($file_name, PATHINFO_FILENAME)."_".date("Y_m_d_Hi");
  $rename_file_path = $file_dir.$rename_file_name;
  $log_file = $_SERVER['DOCUMENT_ROOT'].'/tools/update/log/'.$rename_file_name.'.html';
  $success_cnt = 0;
  $error_cnt = 0;
  $all_cnt = 0;
  $mail_text = writeToLogFile($log_file, "<strong>Начало обновления.</strong>", "black", $writeToFile);
	if(!file_exists($file_path)) {
		writeToLogFile($log_file, "Файл ".$file_name." не существует. Обновление завершено.", "red", $writeToFile);
		die();
	}
	writeToLogFile($log_file, "Файл ".$file_name." существует. Приступаем к проверке данных в файле.", "green", $writeToFile);
	//Создание массива данных из файла
	$file = file($file_path);
	$file_array = array();
	foreach($file as $value) {
		$all_cnt++;
		//Проверка данных массива + обновление файла лога ошибок данной проверки
		$work_array = explode(FIELD_SEPARATOR, $value);

		$id = str_replace(' ', '', trim($work_array[ID_FIELD]));
		if(!is_numeric($id)) {
			writeToLogFile($log_file, "Не указан id в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$model_code = trim($work_array[MODEL_CODE_FIELD]);
		if(strlen($model_code) == 0) {
			writeToLogFile($log_file, "Не указан артикул в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$price_origin = str_replace(' ', '', trim($work_array[PRICE_ORIGIN_FIELD]));
		if(!is_numeric($price_origin)) {
			writeToLogFile($log_file, "Базовая цена должна быть числом в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		} elseif ($price_origin <= 0) {
			writeToLogFile($log_file, "Базовая цена должна быть больше нуля в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$price = str_replace(' ', '', trim($work_array[PRICE_FIELD]));
		if(!is_numeric($price)) {
			writeToLogFile($log_file, "Цена должна быть числом в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		} elseif ($price <= 0) {
			writeToLogFile($log_file, "Цена должна быть больше нуля в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}

		//Обновление каталога + запись ошибок и успешного завершения обновления в лог
		if(!CModule::IncludeModule("iblock")) {
			writeToLogFile($log_file, "Критическая ошибка: не удалось подключить модуль информационных блоков! Обновление завершено с критической ошибкой. Пожалуйста, обратитесь к разработчику.", "red", $writeToFile);
			continue;
		}
		$resElement = CIBlockElement::GetList(
			array(),
			array(
				"IBLOCK_ID" => "1",
				"PROPERTY_col_model_code" => $model_code,
				"ID" => $id
			)
		);
		if(!$objElement = $resElement->GetNextElement()) {
			writeToLogFile($log_file, "Позиция с артикулом «".$model_code."» (id=".$id.") не найдена, цена для этого артикула не обновлена.", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$arElement = $objElement->GetFields();
		$arElement["PROPERTIES"] = $objElement->GetProperties();

    $update_element = new CIBlockElement;

		$PROP = array();

		foreach($arElement["PROPERTIES"] as $arProperty) {
      $PROP[$arProperty["ID"]] = $arProperty["VALUE"];
		}

		$PROP[13] = $price_origin;
		$PROP[3] = $price;

		$arFieldsElement = Array(
			"MODIFIED_BY" => 1,
			"IBLOCK_SECTION_ID" => $arElement["IBLOCK_SECTION_ID"],
			"IBLOCK_ID" => 1,
			"PROPERTY_VALUES"=> $PROP,
			"NAME" => $arElement["NAME"],
			"ACTIVE" => "Y",
			"PREVIEW_TEXT" => $arElement["PREVIEW_TEXT"],
			"DETAIL_TEXT" => $arElement["DETAIL_TEXT"],
			"PREVIEW_PICTURE" => CFile::MakeFileArray($arElement["PREVIEW_PICTURE"]),
			"DETAIL_PICTURE" => CFile::MakeFileArray($arElement["DETAIL_PICTURE"])
		);

		if($update_element_id = $update_element->Update($arElement["ID"], $arFieldsElement)) {
			writeToLogFile($log_file, "Позиция с артикулом «".$model_code."» обновлена, ID позиции на сайте «".$arElement["ID"]."». Цена «".$price."/".$price_origin."» добавлена/изменена в поле «Цена / Базовая цена».", "green", $writeToFile);
			$success_cnt++;
		} else {
			writeToLogFile($log_file, "Неизвестная ошибка при обновлении позиции с артикулом «".$model_code."», пожалуйста обратитесь к разработчику.".print_r($update_element, true), "red", $writeToFile);
			$error_cnt++;
		}
	}

	$mail_text .= writeToLogFile($log_file, "<strong>Обновление завершено:</strong> всего обновлено позиций (".$all_cnt."), из них успешно (".$success_cnt."), с ошибкой (".$error_cnt.")", "black", $writeToFile);

	//После завершения обновления файла, переименовываем исходный файл
	if (copy($file_path, $rename_file_path)) {
		writeToLogFile($log_file, "Файл ".$file_name." успешно скопирован в ".$rename_file_name.".", "green", $writeToFile);
	}
	else {
		writeToLogFile($log_file, "Ошибка при копировании файла ".$file_name.". Обратитесь к разработчику.", "red", $writeToFile);
	}

	//Финализация файла лога
  writeToLogFile($log_file, "<strong>Завершение обновления.</strong>", "black", $writeToFile);

	$mail_text .= 'server-name./'.$rename_file_name.'.html';
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=windows-1251" . "\r\n";
  mail('dummy', 'snowqueen: price-update', $mail_text, $headers);
  
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
