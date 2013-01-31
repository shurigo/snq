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

if (empty($arResult["VOTE"])):
	return true;	
endif;

?>
<div class="voting-result-box">
	<ol class="vote-items-list voting-list-box">
		<li class="vote-item-vote vote-item-vote-first vote-item-vote-last vote-item-vote-odd <?
					?><?=($arVote["LAMP"]=="green" ? "vote-item-vote-active " : "")?><?
					?><?=($arVote["LAMP"]=="red" ? "vote-item-vote-disable " : "")?><?
					?>">
		<div class="vote-item-header">
<?
	if (strlen($arResult["VOTE"]["TITLE"]) > 0):
?>
			<span class="vote-item-title"><?=$arResult["VOTE"]["TITLE"];?></span>
<?
		if ($arResult["VOTE"]["LAMP"]=="green"):
/*?>
			<span class="vote-item-lamp vote-item-lamp-green">[ <span class="active"><?=GetMessage("VOTE_IS_ACTIVE_SMALL")?></span> ]</span>
<?*/
		elseif ($arResult["VOTE"]["LAMP"]=="red"):
?>
			<span class="vote-item-lamp vote-item-lamp-red">[ <span class="disable"><?=GetMessage("VOTE_IS_NOT_ACTIVE_SMALL")?></span> ]</span>
<?
		endif;
	endif;
?>
			<div class="vote-clear-float"></div>
		</div>
		
<?
	if ($arResult["VOTE"]["DATE_START"] || ($arResult["VOTE"]["DATE_END"] && $arResult["VOTE"]["DATE_END"] != "31.12.2030 23:59:59")):
?>
		<div class="vote-item-date">
<?
		if ($arResult["VOTE"]["DATE_START"]):
?>
			<span class="vote-item-date-start"><?=$arResult["VOTE"]["DATE_START"]?></span>
<?

		endif;
		if ($arResult["VOTE"]["DATE_END"] && $arResult["VOTE"]["DATE_END"]!="31.12.2030 23:59:59"):
			if ($arResult["VOTE"]["DATE_START"]):
?>
			<span class="vote-item-date-sep"> - </span>
<?
			endif;
?>
			<span class="vote-item-date-end"><?=$arResult["VOTE"]["DATE_END"]?></span>
<?
		endif;
?>
		</div> 
<?
	endif;
?>
		<div class="vote-item-counter"><span><?=GetMessage("VOTE_VOTES")?>:</span> <?=$arResult["VOTE"]["COUNTER"]?></div>

<?
	if (strlen($arResult["VOTE"]["TITLE"]) <= 0):
		if ($arResult["VOTE"]["LAMP"]=="green"):
?>
		<div class="vote-item-lamp vote-item-lamp-green"><span class="active"><?=GetMessage("VOTE_IS_ACTIVE")?></span></div>
<?
		elseif ($arResult["VOTE"]["LAMP"]=="red"):
?>
		<div class="vote-item-lamp vote-item-lamp-red"><span class="disable"><?=GetMessage("VOTE_IS_NOT_ACTIVE")?></span></div>
<?
		endif;
	endif;
	
	if ($arResult["VOTE"]["IMAGE"] !== false || !empty($arResult["VOTE"]["DESCRIPTION"])):
?>
		<div class="vote-item-footer">
<?
		if ($arResult["VOTE"]["IMAGE"] !== false):
?>
			<div class="vote-item-image">
				<img src="<?=$arResult["VOTE"]["IMAGE"]["SRC"]?>" width="<?=$arResult["VOTE"]["IMAGE"]["WIDTH"]?>" height="<?=$arResult["VOTE"]["IMAGE"]["HEIGHT"]?>" border="0" />
			</div>
<?
		endif;
	
		if (!empty($arResult["VOTE"]["DESCRIPTION"])):
?>
			<div class="vote-item-description"><?=$arResult["VOTE"]["DESCRIPTION"];?></div>
<?
		endif
?>
			<div class="vote-clear-float"></div>
		</div>
<?
	endif;
?>
<?
	if (!empty($arResult["QUESTIONS"])):
?>
		<ol class="vote-items-list vote-question-list">
<?
		$iCount = 0;
		foreach ($arResult["QUESTIONS"] as $arQuestion):
			$iCount++;
?>
			<li class="vote-question-item <?=($iCount == 1 ? "vote-item-vote-first " : "")?><?
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

			<?if ($arQuestion["DIAGRAM_TYPE"] == "circle"):?>

				<table width="100%">
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

			<?else://histogram?>

				<table class="vote-answer-table">
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

			<?endif?>
			</li>
		<?endforeach?>
		</ol>
	<?endif?>
		</li>
	</ol>
</div>
