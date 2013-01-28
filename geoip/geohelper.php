<?php
  include 'geo.php';

	function getMyCity() {
		$geo = new Geo();
	  return $geo->get_value('city');				
  }
?>
