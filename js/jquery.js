$( ".search-ico" ).click(function() {
  $( ".search-bar" ).show();
  $(".search-bar").animate({
    height: "+100"
  }, 5000, function() {
  })
  });
