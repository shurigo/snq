<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult["ERROR_MESSAGE"])): 
?>
<div class="vote-note-box vote-note-error">
	<div class="vote-note-box-text"><?=ShowError($arResult["ERROR_MESSAGE"])?></div>
</div>
<?
endif;

if (!empty($arResult["OK_MESSAGE"])): 
?>
<div class="vote-note-box vote-note-note">
	<div class="vote-note-box-text"><?=ShowNote($arResult["OK_MESSAGE"])?></div>
</div>
<?
endif;

if (empty($arResult["VOTE"]) || empty($arResult["QUESTIONS"]) ):
	return true;
endif;

?>

<ol class="vote-items-list vote-question-list voting-result-box">

<?
$iCount = 0;
foreach ($arResult["QUESTIONS"] as $arQuestion):
	$iCount++;

?>
	<li class="vote-item-vote <?=($iCount == 1 ? "vote-item-vote-first " : "")?><?
				?><?=($iCount == count($arResult["QUESTIONS"]) ? "vote-item-vote-last " : "")?><?
				?><?=($iCount%2 == 1 ? "vote-item-vote-odd " : "vote-item-vote-even ")?><?
				?>">
		<div class="vote-item-header">

<?
	if ($arQuestion["IMAGE"] !== false):
?>
			<div class="vote-item-image"><img src="<?=$arQuestion["IMAGE"]["SRC"]?>" width="30" height="30" /></div>
<?
	endif;

?>
			<div class="vote-item-title vote-item-question"><?=$arQuestion["QUESTION"]?></div>
			<div class="vote-clear-float"></div>
		</div>
<?
	if ($arQuestion["DIAGRAM_TYPE"] == "circle"):
?>
			<table class="vote-answer-table">
				<tr>
					<td width="160"><img width="150" height="150" src="<?=$componentPath?>/draw_chart.php?qid=<?=$arQuestion["ID"]?>&dm=150" /></td>
					<td>
						<?foreach ($arQuestion["ANSWERS"] as $arAnswer):?>
							<table class="vote-bar-table">
								<tr>
									<td><div class="vote-bar-square" style="background-color:#<?=$arAnswer["COLOR"]?>"></div></td>
									<td><?=$arAnswer["COUNTER"]?> (<?=$arAnswer["PERCENT"]?>%)</td>
									<td><?=$arAnswer["MESSAGE"]?></td>
								</tr>
							</table>
						<?endforeach?>
					</td>
				</tr>
			</table>

<?
	else://histogram
?>

			<table width="100%" class="vote-answer-table">
			<?foreach ($arQuestion["ANSWERS"] as $arAnswer):?>
				<tr>
					<td width="30%"><?=$arAnswer["MESSAGE"]?></td>
					<td width="70%">
						<table class="vote-bar-table">
							<tr>
								<td style="width:<?=($arAnswer["BAR_PERCENT"])?>%;background-color:#<?=$arAnswer["COLOR"]?>"></td>
								<td style="width:<?=(100-$arAnswer["BAR_PERCENT"])?>%;" class="answer-counter"><nobr><?=$arAnswer["COUNTER"]?> (<?=$arAnswer["PERCENT"]?>%)</nobr></td>
							</tr>
						</table>
					</td>
				</tr>
			<?endforeach?>
			</table>

<?
	endif;
?>
	</li>
<?
endforeach;

?>
</ol>