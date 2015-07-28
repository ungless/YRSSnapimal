$('.search-ico').click(function(e) {
    e.preventDefault();
    $(".search-bar").show();
    $(".search-bar").animate({
      width: "50%",
      margin: "0 auto"
    }, 1000 )
});

var map = L.map('map').setView([100.505, -0.09], 13);

L.tileLayer('https://a.tiles.mapbox.com/v4/snapimal.cf275738/page.html?access_token=pk.eyJ1Ijoic25hcGltYWwiLCJhIjoiZTRkMzQzYTFiZDExYTQ5NmI2NmU3NWMxNzgwYjNkMjAifQ.NadXwz8X4dxNl8DmEYXh4g#4/51.50/-0.13', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'snapimal.cf275738',
    accessToken: 'pk.eyJ1Ijoic25hcGltYWwiLCJhIjoiZTRkMzQzYTFiZDExYTQ5NmI2NmU3NWMxNzgwYjNkMjAifQ.NadXwz8X4dxNl8DmEYXh4g'
}).addTo(map);
var circle = L.circle([51.508, -0.11], 500, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(map);
