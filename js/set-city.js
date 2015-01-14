function setCity(city_id, city_name) {
  $.ajax({
    data: {
      city: city_name,
      id: city_id
    },
    url: "/ipgeo/setcity.php",
    success: function(obj) {
			if(location.href.indexOf('/our_shops/detail') > -1) {
				location.replace('/our_shops/');
			} else {
				location.reload();
			}
    }
  });
}
