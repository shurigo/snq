function setCity(city_id, city_name) {
  $.ajax({
    data: {
      city: city_name,
      id: city_id
    },
    url: "/ipgeo/setcity.php",
    success: function(obj) {
      location.reload();
    }
  });
}
