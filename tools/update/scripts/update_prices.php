<?
  $_SERVER = array();
  $_SERVER['DOCUMENT_ROOT'] = '/home/snowqueen/public_html';
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  require_once("func/func.php");

  set_time_limit(21600); // 6 �����
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
  $mail_text = writeToLogFile($log_file, "<strong>������ ����������.</strong>", "black", $writeToFile);
	if(!file_exists($file_path)) {
		writeToLogFile($log_file, "���� ".$file_name." �� ����������. ���������� ���������.", "red", $writeToFile);
		die();
	}
	writeToLogFile($log_file, "���� ".$file_name." ����������. ���������� � �������� ������ � �����.", "green", $writeToFile);
	//�������� ������� ������ �� �����
	$file = file($file_path);
	$file_array = array();
	foreach($file as $value) {
		$all_cnt++;
		//�������� ������ ������� + ���������� ����� ���� ������ ������ ��������
		$work_array = explode(FIELD_SEPARATOR, $value);

		$id = str_replace(' ', '', trim($work_array[ID_FIELD]));
		if(!is_numeric($id)) {
			writeToLogFile($log_file, "�� ������ id � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$model_code = trim($work_array[MODEL_CODE_FIELD]);
		if(strlen($model_code) == 0) {
			writeToLogFile($log_file, "�� ������ ������� � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$price_origin = str_replace(' ', '', trim($work_array[PRICE_ORIGIN_FIELD]));
		if(!is_numeric($price_origin)) {
			writeToLogFile($log_file, "������� ���� ������ ���� ������ � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		} elseif ($price_origin <= 0) {
			writeToLogFile($log_file, "������� ���� ������ ���� ������ ���� � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		$price = str_replace(' ', '', trim($work_array[PRICE_FIELD]));
		if(!is_numeric($price)) {
			writeToLogFile($log_file, "���� ������ ���� ������ � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		} elseif ($price <= 0) {
			writeToLogFile($log_file, "���� ������ ���� ������ ���� � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		}

		//���������� �������� + ������ ������ � ��������� ���������� ���������� � ���
		if(!CModule::IncludeModule("iblock")) {
			writeToLogFile($log_file, "����������� ������: �� ������� ���������� ������ �������������� ������! ���������� ��������� � ����������� �������. ����������, ���������� � ������������.", "red", $writeToFile);
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
			writeToLogFile($log_file, "������� � ��������� �".$model_code."� (id=".$id.") �� �������, ���� ��� ����� �������� �� ���������.", "red", $writeToFile);
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
			writeToLogFile($log_file, "������� � ��������� �".$model_code."� ���������, ID ������� �� ����� �".$arElement["ID"]."�. ���� �".$price."/".$price_origin."� ���������/�������� � ���� ����� / ������� ����.", "green", $writeToFile);
			$success_cnt++;
		} else {
			writeToLogFile($log_file, "����������� ������ ��� ���������� ������� � ��������� �".$model_code."�, ���������� ���������� � ������������.".print_r($update_element, true), "red", $writeToFile);
			$error_cnt++;
		}
	}

	$mail_text .= writeToLogFile($log_file, "<strong>���������� ���������:</strong> ����� ��������� ������� (".$all_cnt."), �� ��� ������� (".$success_cnt."), � ������� (".$error_cnt.")", "black", $writeToFile);

	//����� ���������� ���������� �����, ��������������� �������� ����
	if (copy($file_path, $rename_file_path)) {
		writeToLogFile($log_file, "���� ".$file_name." ������� ���������� � ".$rename_file_name.".", "green", $writeToFile);
	}
	else {
		writeToLogFile($log_file, "������ ��� ����������� ����� ".$file_name.". ���������� � ������������.", "red", $writeToFile);
	}

	//����������� ����� ����
  writeToLogFile($log_file, "<strong>���������� ����������.</strong>", "black", $writeToFile);

	$mail_text .= 'server-name./'.$rename_file_name.'.html';
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=windows-1251" . "\r\n";
  mail('dummy', 'snowqueen: price-update', $mail_text, $headers);
  
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
