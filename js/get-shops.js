function getShops(nom_id, city) {
  "use strict";
  $.ajax({
		type: "GET",
    data: {
      nid: nom_id,
		  city_name: city
    },
    url: "/our_shops/get.php",
    success: function(obj) {
			$("#availability").html(obj);
    }
  });
}
