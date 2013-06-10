<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

set_time_limit(21600); // 6 �����
$writeToFile = 1;
include_once("func/func.php");
//�������� ������������� ����� discounts.csv
$file_dir = "../";
$file_name = "certificates";
$file_postfix = ".csv";
$file_path = $file_dir . $file_name . $file_postfix;
$rename_file_name = $file_name."_".date("Y_m_d_Hi").$file_postfix;
$rename_file_path = $file_dir.$rename_file_name;
$success_cnt = 0;
$error_cnt = 0;
$all_cnt = 0;

writeToLogFile($file_name.".html", "<strong>������ ����������.</strong>", "black", $writeToFile);
if (file_exists($file_path))
{
	writeToLogFile($file_name.".html", "���� ".$file_name.$file_postfix." ����������. ���������� � �������� ������ � �����.", "green", $writeToFile);
	//�������� ������� ������ �� �����
	$file = file($file_path);
	$file_array = array();
	foreach($file as $value)
	{
		$all_cnt++;
		//�������� ������ ������� + ���������� ����� ���� ������ ������ ��������
		$work_array = explode(";", $value);
		$certificate_number = str_replace(' ', '', trim($work_array[0]));
		if (strlen($certificate_number) == 0)
		{
			writeToLogFile($file_name.".html", "�� ������ ����� ����������� � ������ �".$value."�", "red", $writeToFile);
			$error_cnt++;
			continue;
		}
		
		//���������� ��������� ������������ ��� + ������ ������ � ��������� ���������� ���������� � ���
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
				writeToLogFile($file_name.".html", "������� � ������� ����������� �".$certificate_number."� ��� ����������, ���������� �� ���������, ID ������� �� ����� �".$arElement["ID"]."�.", "green", $writeToFile);
				$success_cnt++;
			}
			else
			{
				if($element_object_id = $element_object->Add($arFieldsElement))
				{
					writeToLogFile($file_name.".html", "������� � ������� ����������� �".$certificate_number."� ���������, ID ������� �� ����� �".$element_object_id."�.", "green", $writeToFile);
					$success_cnt++;
				}
				else
				{
					writeToLogFile($file_name.".html", "����������� ������ ��� ���������� ������� � ������� ����������� �".$certificate_number."�, ���������� ���������� � ������������.", "red", $writeToFile);
					$error_cnt++;
				}
			}
		}
		else
		{
			writeToLogFile($file_name.".html", "����������� ������: �� ������� ���������� ������ �������������� ������! ���������� ��������� � ����������� ������� � ���������� ���������� � ������������.", "red", $writeToFile);
		}
		//echo $certificate_number . " � " . $discount."<br>";
	}
	
	writeToLogFile($file_name.".html", "<strong>���������� ���������:</strong> ����� ���������/��������� ������� (".$all_cnt."), �� ��� ������� (".$success_cnt."), � ������� (".$error_cnt.")", "black", $writeToFile);
	
	//����� ���������� ���������� �����, ��������������� ���� prices.csv
	if (rename($file_path, $rename_file_path))
	{
		writeToLogFile($file_name.".html", "���� ".$file_name.$file_postfix." ������� ������������ � ".$rename_file_name.".", "green", $writeToFile);
	}
	else
	{
		writeToLogFile($file_name.".html", "������ ��� �������������� ����� ".$file_name.$file_postfix.". ���������� � ������������.", "red", $writeToFile);
	}
	//die;
}
else
{
	writeToLogFile($file_name.".html", "���� ".$file_name.$file_postfix." �� ����������. ���������� ���������.", "red", $writeToFile);
}

//����������� ����� ����
writeToLogFile($file_name.".html", "<strong>���������� ����������.</strong>", "black", $writeToFile);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>