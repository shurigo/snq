<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  require_once("func/func.php");

  set_time_limit(21600); // 6 часов
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
  writeToLogFile($log_file, "<strong>Начало обновления.</strong>", "black", $writeToFile);
  if (file_exists($file_path)) {
    writeToLogFile($log_file, "Файл ".$file_name." существует. Приступаем к проверке данных в файле.", "green", $writeToFile);
    //Создание массива данных из файла
    $file = file($file_path);
    $file_array = array();
    foreach($file as $value) {
      $all_cnt++;
      //Проверка данных массива + обновление файла лога ошибок данной проверки
      $work_array = explode(";", $value);
      $good_number = trim($work_array[0]);
      if(strlen($good_number) == 0) {
        writeToLogFile($log_file, "Не указан артикул в строке «".$value."»", "red", $writeToFile);
        $error_cnt++;
        continue;
      }
      $good_price = str_replace(' ', '', trim($work_array[1]));
      if(!is_numeric($good_price)) {
        writeToLogFile($log_file, "Цена должна быть числом в строке «".$value."»", "red", $writeToFile);
        $error_cnt++;
        continue;
      } elseif ($good_price <= 0) {
        writeToLogFile($log_file, "Цена должна быть больше нуля в строке «".$value."»", "red", $writeToFile);
        $error_cnt++;
        continue;
      }

      //Обновление каталога + запись ошибок и успешного завершения обновления в лог
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
            writeToLogFile($log_file, "Позиция с артикулом «".$good_number."» обновлена, ID позиции на сайте «".$arElement["ID"]."». Цена «".$good_price."» добавлена/изменена в поле «Новая цена».", "green", $writeToFile);
            $success_cnt++;
          } else {
            writeToLogFile($log_file, "Неизвестная ошибка при обновлении позиции с артикулом «".$good_number."», пожалуйста обратитесь к разработчику.", "red", $writeToFile);
            $error_cnt++;
          }
        } else {
          writeToLogFile($log_file, "Позиция с артикулом «".$good_number."» не найдена, цена для этого артикула не обновлена.", "red", $writeToFile);
          $error_cnt++;
        }
      } else {
        writeToLogFile($log_file, "Критическая ошибка: не удалось подключить модуль информационных блоков! Обновление завершено с критической ошибкой — пожалуйста обратитесь к разработчику.", "red", $writeToFile);
      }
    }

    writeToLogFile($log_file, "<strong>Обновление завершено:</strong> всего обновлено позиций (".$all_cnt."), из них успешно (".$success_cnt."), с ошибкой (".$error_cnt.")", "black", $writeToFile);

    //После завершения обновления файла, переименовываем файл prices.csv
    if (rename($file_path, $rename_file_path)) {
      writeToLogFile($log_file, "Файл ".$file_name." успешно переименован в ".$rename_file_name.".", "green", $writeToFile);
    }
    else {
      writeToLogFile($log_file, "Ошибка при переименовании файла ".$file_name.". Обратитесь к разработчику.", "red", $writeToFile);
    }
  } else {
    writeToLogFile($log_file, "Файл ".$file_name." не существует. Обновление завершено.", "red", $writeToFile);
  }

  //Финализация файла лога
  writeToLogFile($log_file, "<strong>Завершение обновления.</strong>", "black", $writeToFile);

  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>