<?
  require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
  require($_SERVER['DOCUMENT_ROOT'] . '/ipgeo/geohelper.php');
  if(!isset($_GET['nid'])) die();
	if(!isset($_GET['city_name'])) die();
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
	$city_name = iconv('utf-8', 'cp1251', $_GET['city_name']);
	$section_id = get_city_by_name($city_name);
?>
	<?if(count($rem) > 0):?>
    <?$items_found = false;?>
		<table width="100%">
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
              <td style="font-weight: bold;" width="80%">�������</td>
              <td width="20%"></td>
            </tr>
          <?endif?>
					<tr>
						<td><a href="/our_shops/#<?=$fields['ID'];?>"><?=$fields['NAME']?></a></td>
						<td><?=($quantity>0)?("� �������"):("�����������")?></td>
					</tr>
					<?$props = $e->GetProperties();?>
				<?endif?>
			<?endif?>
		<?endforeach?>
		</table>
	 <?if(!$items_found):?>
		 <p style="font-color:red;">� ��������� ������ ������ ������� ������� ���. �������� ������ ������ ��� �����.</p>
   <?endif?>
  <?endif?>
<br>
