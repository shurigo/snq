<?
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');
?>
	<header class="header">
      <div class="logo"><a href="/"><img src="/images/logo.png" width="400" height="57" alt="������� ��������"></a></div>
			<!-- end .logo-->
<?
  if(empty($_SESSION['city_id']) || empty($_SESSION['city_name'])) { get_my_city(); }
?>
      <div class="city"><select id="city-select" class="customSelect"><? print_city_option_html();?></select></div>
      <div class="phone">8(800) 777-8-999</div>
      <!-- end .phone-->
	  <nav class="menu1"><a href="/our_shops/" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'our_shops'); return false;">��������</a> <span>|</span> <a href="/about/contacts/" rel="nofollow">��������</a> <span>|</span> <a href="/about/about_fur/">���� �� � �� �</a></nav>
      <!-- end .menu1-->
    </header>
    <!-- end .header-->
