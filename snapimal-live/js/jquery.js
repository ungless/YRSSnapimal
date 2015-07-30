$('.search-ico').click(function(e) {
    e.preventDefault();
    $(".search-bar").show();
    $(".search-bar").animate({
      width: "50%",
      margin: "0 auto"
    }, 1000 )
});

var map = L.map('map').setView([0, 0], 3);



L.tileLayer('http://a.tiles.mapbox.com/v3/zsl.map-j9ykp4sl/{z}/{x}/{y}.png', {

    attribution: 'Map hosted by <a href="http://mapbox.com">MapBox</a>',

    maxZoom: 18

}).addTo(map);
