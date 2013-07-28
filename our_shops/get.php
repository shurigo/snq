<?
  require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
  if(!isset($_GET['nid'])) die();
  if(!CModule::IncludeModule('iblock')) die();
  $remainder = CIBlockElement::GetList(
	  array(),
		array(
			'IBLOCK_ID' => IntVal(getIblockIdByName('collection', 'remainder')),
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
	$our_shops_iblock_id = getIblockIdByName('our_shops', 'our_shops');
?>
  <p>Наличие в магазинах</p>
  <table>
	<?foreach($rem as $kais_id => $quantity):?>
	<?
			$shops = CIBlockElement::GetList(
				array(),
				array(
					'IBLOCK_ID' => IntVal($our_shops_iblock_id),
					'PROPERTY_col_kais_id' => $kais_id
				)
			);
			if($e = $shops->GetNextElement()):?>
				<?if($fields = $e->GetFields()):?>
					<tr>
						<td><?=$fields['NAME']?></td>
            <td><?=$quantity?></td>
					</tr>
					<?$props = $e->GetProperties();?>
				<?endif?>
		<?endif?>
	<?endforeach?>
  </table>
