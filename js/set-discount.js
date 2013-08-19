function setDiscount(discount) {
  "use strict";
	console.log('d='+discount.checked);
  $.ajax({
    data: {
			d: discount.checked ? 'y' : 'n'
    },
    url: "/collection/setdiscount.php",
    success: function(obj) {
//      location.reload();
    }
  });
}
