$('.search-ico').click(function(e) {
    e.preventDefault();
    $(".search-bar").show();
    $(".search-bar").animate({
      margin: "0px auto"
    }, 5000 );
});
