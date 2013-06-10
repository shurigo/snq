<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

set_time_limit(21600); // 6 часов
$writeToFile = 1;
include_once("func/func.php");
//Проверка существования файла prices.csv
$file_dir = "../";
$file_name = "prices";
$file_postfix = ".csv";
$file_path = $file_dir . $file_name . $file_postfix;
$rename_file_name = $file_name."_".date("Y_m_d_Hi").$file_postfix;
$rename_file_path = $file_dir.$rename_file_name;
$success_cnt = 0;
$error_cnt = 0;
$all_cnt = 0;

writeToLogFile($file_name.".html", "<strong>Начало обновления.</strong>", "black", $writeToFile);
if (file_exists($file_path))
{
	writeToLogFile($file_name.".html", "Файл ".$file_name.$file_postfix." существует. Приступаем к проверке данных в файле.", "green", $writeToFile);
	//Создание массива данных из файла
	$file = file($file_path);
	$file_array = array();
	foreach($file as $value)
	{
		$all_cnt++;
		//Проверка данных массива + обновление файла лога ошибок данной проверки
		$work_array = explode(";", $value);
		$good_number = trim($work_array[0]);
		if (strlen($good_number) == 0)
		{
			writeToLogFile($file_name.".html", "Не указан артикул в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		
		$good_price = str_replace(' ', '', trim($work_array[1]));
		if (!is_numeric($good_price))
		{
			writeToLogFile($file_name.".html", "Цена должна быть числом в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		elseif ($good_price <= 0)
		{
			writeToLogFile($file_name.".html", "Цена должна быть больше нуля в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		
		//Обновление каталога + запись ошибок и успешного завершения обновления в лог
		if (CModule::IncludeModule("iblock"))
		{
			$resElement = CIBlockElement::GetList(
					array(),
					array(
						"IBLOCK_ID" => "1",
						"PROPERTY_col_model_code" => $good_number
					)
				);
			if ($objElement = $resElement->GetNextElement())
			{
				$arElement = $objElement->GetFields();
				$arElement["PROPERTIES"] = $objElement->GetProperties();
				//echo "<pre>"; print_r($arElement); echo "</pre>";
				//* 
				$update_element = new CIBlockElement;

				$PROP = array();
				foreach($arElement["PROPERTIES"] as $arProperty)
				{
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
				
				//echo "<pre>"; print_r($arFieldsElement); echo "</pre>";
				
				//*
				if($update_element_id = $update_element->Update($arElement["ID"], $arFieldsElement))
				{
					writeToLogFile($file_name.".html", "Позиция с артикулом «".$good_number."» обновлена, ID позиции на сайте «".$arElement["ID"]."». Цена «".$good_price."» добавлена/изменена в поле «Новая цена».", "green", $writeToFile);
					$success_cnt++;
				}
				else
				{
					writeToLogFile($file_name.".html", "Неизвестная ошибка при обновлении позиции с артикулом «".$good_number."», пожалуйста обратитесь к разработчику.", "red", $writeToFile);
					$error_cnt++;
				}
				//*/
				//die;
			}
			else
			{
				writeToLogFile($file_name.".html", "Позиция с артикулом «".$good_number."» не найдена, цена для этого артикула не обновлена.", "red", $writeToFile);
				$error_cnt++;
			}
		}
		else
		{
			writeToLogFile($file_name.".html", "Критическая ошибка: не удалось подключить модуль информационных блоков! Обновление завершено с критической ошибкой — пожалуйста обратитесь к разработчику.", "red", $writeToFile);
		}
		//echo $good_number . " — " . $good_price."<br>";
	}
	
	writeToLogFile($file_name.".html", "<strong>Обновление завершено:</strong> всего обновлено позиций (".$all_cnt."), из них успешно (".$success_cnt."), с ошибкой (".$error_cnt.")", "black", $writeToFile);
	
	//После завершения обновления файла, переименовываем файл prices.csv
	if (rename($file_path, $rename_file_path))
	{
		writeToLogFile($file_name.".html", "Файл ".$file_name.$file_postfix." успешно переименован в ".$rename_file_name.".", "green", $writeToFile);
	}
	else
	{
		writeToLogFile($file_name.".html", "Ошибка при переименовании файла ".$file_name.$file_postfix.". Обратитесь к разработчику.", "red", $writeToFile);
	}
	//die;
}
else
{
	writeToLogFile($file_name.".html", "Файл ".$file_name.$file_postfix." не существует. Обновление завершено.", "red", $writeToFile);
}

//Финализация файла лога
writeToLogFile($file_name.".html", "<strong>Завершение обновления.</strong>", "black", $writeToFile);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>