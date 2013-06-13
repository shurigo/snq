<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  require_once("func/func.php");

  set_time_limit(21600); // 6 �����
  $writeToFile = 1;

  $file_dir = ".." . DIRECTORY_SEPARATOR;
  $file_name = "prices.csv";
  $extension = pathinfo($file_name, PATHINFO_EXTENSION);
  $file_path = $file_dir . DIRECTORY_SEPARATOR . $file_name;
  $rename_file_name = $file_name."_".date("Y_m_d_Hi").$extension;
  $rename_file_path = $file_dir.$rename_file_name;
  $log_file = pathinfo($file_name, PATHINFO_FILENAME).'.html';
  $success_cnt = 0;
  $error_cnt = 0;
  $all_cnt = 0;
echo $file_path;
  writeToLogFile($log_file, "<strong>������ ����������.</strong>", "black", $writeToFile);
  if (file_exists($file_path)) {
    writeToLogFile($log_file, "���� ".$file_name." ����������. ���������� � �������� ������ � �����.", "green", $writeToFile);
    //�������� ������� ������ �� �����
    $file = file($file_path);
    $file_array = array();
    foreach($file as $value) {
      $all_cnt++;
      //�������� ������ ������� + ���������� ����� ���� ������ ������ ��������
      $work_array = explode(";", $value);
      $good_number = trim($work_array[0]);
      if(strlen($good_number) == 0) {
        writeToLogFile($log_file, "�� ������ ������� � ������ �".$value."�", "red", $writeToFile);
        $error_cnt++;
        continue;
      }
      $good_price = str_replace(' ', '', trim($work_array[1]));
      if(!is_numeric($good_price)) {
        writeToLogFile($log_file, "���� ������ ���� ������ � ������ �".$value."�", "red", $writeToFile);
        $error_cnt++;
        continue;
      } elseif ($good_price <= 0) {
        writeToLogFile($log_file, "���� ������ ���� ������ ���� � ������ �".$value."�", "red", $writeToFile);
        $error_cnt++;
        continue;
      }

      //���������� �������� + ������ ������ � ��������� ���������� ���������� � ���
      if(CModule::IncludeModule("iblock")) {
        $resElement = CIBlockElement::GetList(
          array(),
          array(
            "IBLOCK_ID" => "1",
            "PROPERTY_col_model_code" => $good_number
          )
        );
        if($objElement = $resElement->GetNextElement()) {
          $arElement = $objElement->GetFields();
          $arElement["PROPERTIES"] = $objElement->GetProperties();
          //echo "<pre>"; print_r($arElement); echo "</pre>";
          //* 
          $update_element = new CIBlockElement;

          $PROP = array();
          foreach($arElement["PROPERTIES"] as $arProperty) {
            $PROP[$arProperty["ID"]] = $arProperty["VALUE"];
          }

          $PROP[13] = $good_price;
          
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
          
          echo "<pre>"; print_r($arFieldsElement); print_r($arElement);echo "</pre>";
          
          $update_element_id = $update_element->Update($arElement["ID"], $arFieldsElement);
          print_r($update_element_id);
          if($update_element_id) {
          //if($update_element_id = $update_element->Update($arElement["ID"], $arFieldsElement)) {
            writeToLogFile($log_file, "������� � ��������� �".$good_number."� ���������, ID ������� �� ����� �".$arElement["ID"]."�. ���� �".$good_price."� ���������/�������� � ���� ������ ����.", "green", $writeToFile);
            $success_cnt++;
          } else {
            writeToLogFile($log_file, "����������� ������ ��� ���������� ������� � ��������� �".$good_number."�, ���������� ���������� � ������������.", "red", $writeToFile);
            $error_cnt++;
          }
        } else {
          writeToLogFile($log_file, "������� � ��������� �".$good_number."� �� �������, ���� ��� ����� �������� �� ���������.", "red", $writeToFile);
          $error_cnt++;
        }
      } else {
        writeToLogFile($log_file, "����������� ������: �� ������� ���������� ������ �������������� ������! ���������� ��������� � ����������� ������� � ���������� ���������� � ������������.", "red", $writeToFile);
      }
    }

    writeToLogFile($log_file, "<strong>���������� ���������:</strong> ����� ��������� ������� (".$all_cnt."), �� ��� ������� (".$success_cnt."), � ������� (".$error_cnt.")", "black", $writeToFile);

    //����� ���������� ���������� �����, ��������������� ���� prices.csv
    if (rename($file_path, $rename_file_path)) {
      writeToLogFile($log_file, "���� ".$file_name." ������� ������������ � ".$rename_file_name.".", "green", $writeToFile);
    }
    else {
      writeToLogFile($log_file, "������ ��� �������������� ����� ".$file_name.". ���������� � ������������.", "red", $writeToFile);
    }
  } else {
    writeToLogFile($log_file, "���� ".$file_name." �� ����������. ���������� ���������.", "red", $writeToFile);
  }

  //����������� ����� ����
  writeToLogFile($log_file, "<strong>���������� ����������.</strong>", "black", $writeToFile);

  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>