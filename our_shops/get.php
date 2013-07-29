<?
  require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
  if(!isset($_GET['nid'])) die();
  if(!CModule::IncludeModule('iblock')) die();
  $remainder = CIBlockElement::GetList(
	  array(),
		array(
			'IBLOCK_ID' => IntVal(getIblockIdByName('remainder')),
			'PROPERTY_col_nomenclature_id' => $_GET['nid']
	  )
	);
	$rem = array();
	while($e = $remainder->GetNextElement()) {
		$props = $e->GetProperties();
		if(!$props) continue;
		$shop_id = $props['col_shop_id']['VALUE'];
		$quantity = $props['col_quantity']['VALUE'];
		$rem[$shop_id] = $quantity;
	}
	$our_shops_iblock_id = getIblockIdByName('our_shops');
	$sections = CIBlockSection::GetList(
		array(),
		array('IBLOCK_ID' => IntVal($our_shops_iblock_id), 'NAME' => $_SESSION['city_name']),
		false,
		array('ID', 'IBLOCK_ID', 'NAME')
	);
	if(!$sections) die();
	$section_id = $sections->GetNext()['ID'];
?>
	<?if(count($rem) > 0):?>
    <?$items_found = false;?>
		<p>Наличие в магазинах:</p>
		<table>
		<?foreach($rem as $kais_id => $quantity):?>
		  <?$shops = CIBlockElement::GetList(
				array(),
				array(
					'IBLOCK_ID' => IntVal($our_shops_iblock_id),
					'PROPERTY_col_kais_id' => $kais_id,
					'SECTION_ID' => $section_id
				)
			);
			if($e = $shops->GetNextElement()):?>
				<?if($fields = $e->GetFields()):?>
					<?if(!$items_found):?>
						<?$items_found = true;?>
						<tr>
              <td>Магазин</td>
              <td>Количество</td>
            </tr>
          <?endif?>
					<tr>
						<td><?=$fields['NAME']?></td>
						<td><?=$quantity?></td>
					</tr>
					<?$props = $e->GetProperties();?>
				<?endif?>
			<?endif?>
		<?endforeach?>
		</table>
	 <?if(!$items_found):?>
		 <p>В магазинах вашего города данного размера нет.</p>
     <p> Выбирите другой размер или город.</p>
   <?endif?>
  <?endif?>
