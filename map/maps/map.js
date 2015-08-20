$(document).ready(function() {
	
// Create map

var map = L.map('edge_map').setView([0, 0], 1);

// Styles

var red = {
	"fillColor": "red",
    "color": "black",
    "weight": 1,
	"fillOpacity": 0.5
};

var orange = {
	"fillColor": "orange",
    "color": "black",
    "weight": 1,
	"fillOpacity": 1
};

var blue = {
	"fillColor": "blue",
    "color": "black",
    "weight": 1,
	"fillOpacity": 1
};

var countrieslayer = L.geoJson(countries);

for (i=0; i <= 600; i++)
{
if (countrieslayer._layers[i]){
var country = countrieslayer._layers[i];
map.addLayer(country);
country.setStyle(red);
}
}

var zoneslayer = L.geoJson(zones);

for (var polygon in zoneslayer._layers) {
map.addLayer(zoneslayer._layers[polygon]);
zoneslayer._layers[polygon].setStyle(blue);
} 

// Populate country dropdown


for (i=0; i <= 600; i++)
{
if (countrieslayer._layers[i]){
var country = countrieslayer._layers[i];
$("#countries").append("<option value='"+ country.feature.properties.name + "'>" + country.feature.properties.name + "</option>");
}
}

$("#countries").change(function(){

for (i=0; i <= 600; i++){

if (countrieslayer._layers[i]){
var country = countrieslayer._layers[i];
country.setStyle(red);
if (country.feature.properties.name == $("#countries").val()){

country.setStyle(blue);

}
}
}
});


// Popups on country click


var group_nav = "<a class='tabs' href='#' onclick='hidetabs(\"mammals\");'>Mammals</a><a class='tabs' href='#' onclick='hidetabs(\"amphibians\");'>Amphibians</a><a class='tabs' href='#' onclick='hidetabs(\"coral\");'>Corals</a>"

countrieslayer.on("mouseover", function (e) {
	popup = [];
	var selectedcountry = e.layer.feature.properties.name;
	var selectedlayer = e.layer;
	for (i=0; i <= species.length; i++){
	if(species[i]){
	var countriesforspecies = species[i].countries;
	if(countriesforspecies.indexOf(selectedcountry) != -1)
	{
	popup.push("<li class='" + species[i].edge_group + "'>" + "<b>Scientific name:</b> " + species[i].scientific_name + "<br /> <b>EDGE Rank:</b> " + species[i].edge_rank + "<br /><b>Common names:</b> " + species[i].common_names + "</li>");
	}	
	}
	}
	if(popup.length > 0){
	selectedlayer.bindPopup(group_nav + "<h2>EDGE species in " + selectedcountry + "</h2><ul>" + popup.join('') + "</ul>");
	}
	else{
	selectedlayer.bindPopup("No EDGE species here.");
	}
});


// Search

$("#searchfield").keyup(function(){
	
for (i=0; i <= 600; i++){
if (countrieslayer._layers[i]){
var country = countrieslayer._layers[i];
country.setStyle(red);
}
}

$("#searchresult").html("");

var searchvalue = $("#searchfield").val();

var searchresult = [];
var highlightcountries = [];

if (searchvalue.length >= 1){

for (i=0; i <= species.length; i++){

if(species[i]){

if(species[i].common_names.toLowerCase().indexOf(searchvalue.toLowerCase()) >= 0){
	
if (species[i].countries.length > 1){

searchresult.push("<span class='" + species[i].edge_rank + "'><b>The " + species[i].common_names + "</b> can be found in " + species[i].countries + ". It has an EDGE rank of " + species[i].edge_rank + "<br /></span>");
highlightcountries.push(species[i].countries);
}
}
}
}
$("#searchresult").html("<i>" + searchresult.length + " results </i><br /><br />" + searchresult.join(" "));
highlightcountries = highlightcountries.join(" ");

for (i=0; i <= 600; i++)
{
if (countrieslayer._layers[i]){
var country = countrieslayer._layers[i];

if (highlightcountries.indexOf(country.feature.properties.name) > -1){
country.setStyle(blue);

}
}
}
}

});

});

//Filters

function hidetabs(tabname){

  $("li").css("display", "none");
  $("li."+tabname+"").css("display", "block");

};
