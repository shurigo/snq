<?
$arUrlRewrite = array(
    array(
        "CONDITION" =>   "#^/about/fashion_blog/#",
        "RULE"  =>   "",
        "ID"    =>   "bitrix:news",
        "PATH"  =>   "/about/fashion_blog/index.php",
    ),
    array(
        "CONDITION" =>   "#^/about/about_fur/#",
        "RULE"  =>   "",
        "ID"    =>   "bitrix:news",
        "PATH"  =>   "/about/about_fur/index.php",
    ),
    array(
        "CONDITION" =>   "#^/about/vacancies/#",
        "RULE"  =>   "",
        "ID"    =>   "bitrix:iblock.element.add.list",
        "PATH"  =>   "/about/vacancies/shops.php",
    ),
    array(
        "CONDITION" =>   "#^/actions/#",
        "RULE"  =>   "",
        "ID"    =>   "bitrix:news",
        "PATH"  =>   "/actions/index.php",
    ),
    array(
        "CONDITION" =>   "#^/collection/#",
        "RULE"  =>   "",
        "ID"    =>   "custom:catalog",
        "PATH"  =>   "/collection/index.php",
    ),
  array(
    //"CONDITION" => "#^/(user|captcha)/([a-zA-Z]+)/?#",
    "CONDITION" => "#^/(\w+)/(\w+)/?#",
    "RULE" => "$1/$2",
    "PATH" => "/kohana/index.php"
    ),
);

?>
