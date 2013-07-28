function getShops(nom_id) {
  "use strict";
  $.ajax({
		type: "GET",
    data: {
      nid: nom_id
    },
    url: "/our_shops/get.php",
    success: function(obj) {
			$("#availability").html(obj);
    }
  });
}
