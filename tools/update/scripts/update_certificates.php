<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

set_time_limit(21600); // 6 часов
$writeToFile = 1;
include_once("func/func.php");
//Проверка существования файла discounts.csv
$file_dir = "../";
$file_name = "certificates";
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
		$certificate_number = str_replace(' ', '', trim($work_array[0]));
		if (strlen($certificate_number) == 0)
		{
			writeToLogFile($file_name.".html", "Не указан номер сертификата в строке «".$value."»", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		
		//Обновление инфоблока сертификатов шуб + запись ошибок и успешного завершения обновления в лог
		if (CModule::IncludeModule("iblock"))
		{
			$element_object = new CIBlockElement;
			
			$arFieldsElement = Array(
			  "MODIFIED_BY" => 1, 
			  "IBLOCK_SECTION_ID" => false, 
			  "IBLOCK_ID" => 11,
			  "NAME" => $certificate_number,
			  "ACTIVE" => "Y",
			);
			
			//echo "<pre>"; print_r($arFieldsElement); echo "</pre>";
			$resElement = CIBlockElement::GetList(
										array(),
										array(
											"IBLOCK_ID" => "11",
											"NAME" => $certificate_number
										)
									);
			if ($arElement = $resElement->GetNext())
			{
				writeToLogFile($file_name.".html", "Позиция с номером сертификата «".$certificate_number."» уже существует, обновление не требуется, ID позиции на сайте «".$arElement["ID"]."».", "green", $writeToFile);
				$success_cnt++;
			}
			else
			{
				if($element_object_id = $element_object->Add($arFieldsElement))
				{
					writeToLogFile($file_name.".html", "Позиция с номером сертификата «".$certificate_number."» добавлена, ID позиции на сайте «".$element_object_id."».", "green", $writeToFile);
					$success_cnt++;
				}
				else
				{
					writeToLogFile($file_name.".html", "Неизвестная ошибка при добавлении позиции с номером сертификата «".$certificate_number."», пожалуйста обратитесь к разработчику.", "red", $writeToFile);
					$error_cnt++;
				}
			}
		}
		else
		{
			writeToLogFile($file_name.".html", "Критическая ошибка: не удалось подключить модуль информационных блоков! Обновление завершено с критической ошибкой — пожалуйста обратитесь к разработчику.", "red", $writeToFile);
		}
		//echo $certificate_number . " — " . $discount."<br>";
	}
	
	writeToLogFile($file_name.".html", "<strong>Обновление завершено:</strong> всего добавлено/обновлено позиций (".$all_cnt."), из них успешно (".$success_cnt."), с ошибкой (".$error_cnt.")", "black", $writeToFile);
	
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