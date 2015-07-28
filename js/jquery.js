$('.search-ico').click(function(e) {
    e.preventDefault();
    $(".search-bar").show();
    $(".search-bar").animate({
      width: "50%",
      margin: "0 auto"
    }, 1000 )
});
