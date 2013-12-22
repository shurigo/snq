<?
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');
?>
	<script type="text/javascript">
    $(function() {
     $('.nyroModal').nyroModal();
    });
	</script>

	<header class="header">
      <div class="logo"><a href="/"><img src="/images/logo.png" width="400" height="57" alt="Снежная Королева"></a></div>
			<!-- end .logo-->
<?
  if(empty($_SESSION['city_id']) || empty($_SESSION['city_name'])) { get_my_city(); }
?>
      <div class="city"><select id="city-select" class="customSelect"><? print_city_option_html();?></select></div>
            <div class="phone">тел.&nbsp;<a href="tel:8(800) 777-8-999">8(800) 777-8-999</a></div>
      <!-- end .phone-->

<div class="search">
<form action="/collection/" method="get" accept-charset="utf-8">
					<fieldset>
						<input type="text" name="q" value="" />
						<input type="submit" value="Найти" />
					</fieldset>
</form>
</div>


	  <nav class="menu1">
	  <a href="/our_shops/" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'our_shops'); return false;">Магазины</a>
	  <span>|</span> <a href="/about/contacts/" rel="nofollow">Контакты</a>
	  <span>|</span> <a href="/about/about_fur/">Меха от А до Я</a>
	  <span>|</span>
	  </nav>

      <!-- end .menu1-->
    </header>
    <!-- end .header-->
