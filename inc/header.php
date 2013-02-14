<? include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');?>
  <script type="text/javascript">
    $(document).ready(function() {
			$("#city-select").change(function() {
				$.ajax({
				  data: { 
						city: $("#city-select option:selected").text(),
						id: $("#city-select option:selected").val()
					},
					url: "<?=$_SERVER['DOCUMENT_ROOT'].'/ipgeo/setcity.php'?>",
					success: function(obj) {
						location.reload();
					}
				});
      });
    });
    </script>
	<header class="header">
      <div class="logo"><a href="/"><img src="/images/logo.png" width="200" height="57" alt="Снежная Королева"></a></div>
			<!-- end .logo-->
			<? session_start(); $geo = new geohelper(); $geo->get_my_city(); echo($_SESSION['city']);?>
      <div class="city"><select id="city-select" class="customSelect"><? $geo->print_city_option_html(); ?></select></div>
      <div class="phone">8(800) 777-8-999</div>
      <!-- end .phone-->
	  <nav class="menu1"><a href="/our_shops/" rel="nofollow">Магазины</a> <span>|</span> <a href="/about/contacts/" rel="nofollow">Контакты</a> <span>|</span> <a href="/about/about_fur/">Интересное о мехе</a></nav>
      <!-- end .menu1-->
    </header>
    <!-- end .header-->
