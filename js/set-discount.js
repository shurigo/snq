function setDiscount(discount) {
  "use strict";
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
