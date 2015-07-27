$('.search-ico').click(function(e) {
    e.preventDefault();
    $(".search-bar").show();
    $('.search-bar').animate({
        right: 0
    }, 5000);
});
