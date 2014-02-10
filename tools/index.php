<?
// Upload additional pictures for catalog items.
// The script takes the file with item articul, and 2 names of images separated by ";".
// All imagies have to be uploaded to the server in specified derictory before run the script

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/modules/phpmailer/class.phpmailer.php");

$APPLICATION->SetTitle("«агрузить дополнительные картинки");

$csv_file="add_img.csv";
$file = fopen($csv_file, 'r');

$i=0;

while (($line = fgetcsv($file, 1000, ";")) !== FALSE) {
//read data from the file
$XML_ID =$line[0];
$PIC1   =$line[1];
$PIC2   =$line[2];

//get element id
$arSelect = Array("ID");
$arFilter = Array("XML_ID"=>$XML_ID);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
//print_r();
while ($ob = $res->GetNextElement()) {$arFields = $ob->GetFields();
$ELEMENT_ID=($arFields['ID']);

echo $ELEMENT_ID."<br>";

//upload image 1
$arFile = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/upload/ss2014/looks/".$PIC1);
//link new ima to the element
CIBlockElement::SetPropertyValueCode($ELEMENT_ID, "add_pic_1", $arFile);

//upload image 2
$arFile = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/upload/ss2014/looks/".$PIC2);
//link new ima to the element
CIBlockElement::SetPropertyValueCode($ELEMENT_ID, "add_pic_2", $arFile);
}

$i++;

}
fclose($file);

echo "processed rows:".$i;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>