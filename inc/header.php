<?
	$r = session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');
?>
  <script type="text/javascript">
    $(document).ready(function() {
			$("#city-select").change(function() {
				$.ajax({
				  data: {
						city: $("#city-select option:selected").text(),
						id: $("#city-select option:selected").val()
					},
					url: "/ipgeo/setcity.php",
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

			<?  $geo = new geohelper(); if(empty($_SESSION['city_id'])) { $_SESSION['city_id'] = $geo->get_my_city(); } ?>
      <div class="city"><select id="city-select" class="customSelect"><? $geo->print_city_option_html();  ?></select></div>
      <div class="phone">8(800) 777-8-999</div>
      <!-- end .phone-->
	  <nav class="menu1"><a href="/our_shops/" rel="nofollow">Магазины</a> <span>|</span> <a href="/about/contacts/" rel="nofollow">Контакты</a> <span>|</span> <a href="/about/about_fur/">Интересное о мехе</a></nav>
      <!-- end .menu1-->
    </header>
    <!-- end .header-->
