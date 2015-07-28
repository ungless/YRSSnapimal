$('.search-ico').click(function(e) {
    e.preventDefault();
    $(".search-bar").show();
    $(".search-bar").effect("bounce", { times:3 }, 300);
});
