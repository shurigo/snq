<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult["VOTE"]) || empty($arResult["QUESTIONS"])):
	return true;
endif;

/********************************************************************
				Input params
********************************************************************/
$arThemes = array();
$dir = preg_replace("'[\\\\/]+'", "/", dirname(realpath(__FILE__))."/themes/");
if (is_dir($dir) && $directory = opendir($dir)):
	while (($file = readdir($directory)) !== false)
	{
		if ($file == "." || $file == ".." || is_dir($dir.$file)):
			continue;
		endif;
		if (substr($file, -4, 4) == ".css")
			$arThemes[] = substr($file, 0, strlen($file) - 4);
	}
	closedir($directory);
endif;
$sTemplateDir = preg_replace("'[\\\\/]+'", "/", $this->__component->__template->__folder."/");

$arParams["THEME"] = trim($arParams["THEME"]);
$arParams["THEME"] = (in_array($arParams["THEME"], $arThemes) ? $arParams["THEME"] : "");
if (in_array($arParams["THEME"], $arThemes)):
	$date = @filemtime($dir.$arParams["THEME"].".css");
	$GLOBALS['APPLICATION']->SetAdditionalCSS($sTemplateDir.'themes/'.$arParams["THEME"].'.css?'.$date);
elseif (!empty($arParams["THEME"])):
	$date = @filemtime($_SERVER['DOCUMENT_ROOT'].$arParams["THEME"]."/style.css");
	if ($date):
		$GLOBALS['APPLICATION']->SetAdditionalCSS($arParams["THEME"].'/style.css?'.$date);
	endif;
endif;

/********************************************************************
				/Input params
********************************************************************/
?>
<ol class="vote-items-list vote-question-list vote-question-list-main-page">
<?

$iCount = 0;
foreach ($arResult["QUESTIONS"] as $arQuestion):
	$iCount++;
?>
	<li class="vote-question-item <?=($iCount == 1 ? "vote-item-vote-first " : "")?><?
				?><?=($iCount == count($arResult["QUESTIONS"]) ? "vote-item-vote-last " : "")?><?
				?><?=($iCount%2 == 1 ? "vote-item-vote-odd " : "vote-item-vote-even ")?><?
				?>">
		<div class="vote-item-title vote-item-question"><?=$arQuestion["QUESTION"]?></div>
		
		<ol class="vote-items-list vote-answers-list">
<?
	foreach ($arQuestion["ANSWERS"] as $arAnswer):
?>
			<li class="vote-answer-item">
<?
		if ($arParams["THEME"] == ""):
?>
				<?=$arAnswer["MESSAGE"]?> - <?=$arAnswer["COUNTER"]?> (<?=$arAnswer["PERCENT"]?>%)<br />
				<div class="graph-bar" style="width: <?=$arAnswer["BAR_PERCENT"]?>%;background-color:#<?=$arAnswer["COLOR"]?>">&nbsp;</div>
<?
		else:
?>
				<?=$arAnswer["MESSAGE"]?>
				<div class="graph">
					<nobr class="bar" style="width: <?=(round($arAnswer["BAR_PERCENT"]))?>%;">
						<span><?=$arAnswer["COUNTER"]?> (<?=$arAnswer["PERCENT"]?>%)</span>
					</nobr>
				</div>
<?
		endif;
?>
			</li>
<?
	endforeach; 
?>
		</ol>
	</li>
<?
endforeach; 
?>
</ol>