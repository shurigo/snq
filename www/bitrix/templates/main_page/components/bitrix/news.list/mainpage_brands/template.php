<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (count($arResult["ITEMS"]) > 0)
{
?>
<div id="brand_container">
    <div id="carousel">
    	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
        //echo "<pre>"; print_r($arItem); echo "</pre>";
        if (strlen($arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["VALUE"]) > 0)
        {
            ?><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["FILE_VALUE"]["SRC"]?>" width="<?=$arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["FILE_VALUE"]["WIDTH"]?>" height="<?=$arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["FILE_VALUE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a><?
        }
        ?>
        <?endforeach;?>
    </div>
    <a href="#" id="ui-carousel-next"><span>Предыдущие бренды</span></a>
    <a href="#" id="ui-carousel-prev"><span>Следующие бренды</span></a>
</div>
<script type="text/javascript">
	jQuery(function($) {
		$( "#carousel" ).rcarousel( {
			width:130, 
			height:130, 
			margin:10,
			visible:6,
			step:6,
			auto: {
				enabled: true,
				interval: 5000,
				direction: "next"
			}
		} );
	});
	$( "#ui-carousel-next" )
		.add( "#ui-carousel-prev" )
		.hover(
			function() {
				$( this ).css( "opacity", 0.7 );
			},
			function() {
				$( this ).css( "opacity", 1.0 );
			}
		);
</script>
<div style="border-top:1px solid #cccfd3; height:1px; margin:10px 0 0 0;"></div>
<?
}
?>