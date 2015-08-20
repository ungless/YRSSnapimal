$(document).ready(function() {
	
// Create map

var map = L.map('map').setView([0, 0], 1);


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

//EDGE Zones heatmap styles

var one = {
	"fillColor": "#ff1300",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var two = {
	"fillColor": "#ff6800",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var three = {
	"fillColor": "#ffcc00",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var four = {
	"fillColor": "#25cd1d",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var five = {
	"fillColor": "#26d987",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var six = {
	"fillColor": "#00c0ff",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var seven = {
	"fillColor": "#0e65a8",
    "color": "black",
    "weight": 0,
	"fillOpacity": 1
};

var none = {
	"fillColor": "transparent",
    "color": "black",
    "weight": 0,
	"fillOpacity": 0
};

var countrieslayer = L.geoJson(countries);

for (i=0; i <= 3000; i++)
{
if (countrieslayer._layers[i]){
var country = countrieslayer._layers[i];
map.addLayer(country);
country.setStyle(red);
}
}

var mammalszones = L.geoJson(mammals);
var amphibianszones = L.geoJson(amphibians);


// Add and colour EDGE Zones (amphibians)

for (var polygon in amphibianszones._layers) {
map.addLayer(amphibianszones._layers[polygon]);
amphibianszones._layers[polygon].setStyle(none);
for (var inner in amphibianszones._layers[polygon]._layers){
if(inner && amphibianszones._layers[polygon].feature.id){
if(amphibianszones._layers[polygon].feature.id >= 150){
amphibianszones._layers[polygon].setStyle(one);
}
else if(amphibianszones._layers[polygon].feature.id >= 140){
amphibianszones._layers[polygon].setStyle(two);
}
else if(amphibianszones._layers[polygon].feature.id >= 120){
amphibianszones._layers[polygon].setStyle(three);
}
else if(amphibianszones._layers[polygon].feature.id >= 100){
amphibianszones._layers[polygon].setStyle(four);
}
else if(amphibianszones._layers[polygon].feature.id >= 80){
amphibianszones._layers[polygon].setStyle(five);
}
else if(amphibianszones._layers[polygon].feature.id >= 60){
amphibianszones._layers[polygon].setStyle(six);
}
else if(amphibianszones._layers[polygon].feature.id >= 40){
amphibianszones._layers[polygon].setStyle(seven);
}
}
}
} 



// Add and colour EDGE Zones (mammals)

for (var polygon in mammalszones._layers) {
map.addLayer(mammalszones._layers[polygon]);
mammalszones._layers[polygon].setStyle(none);
for (var inner in mammalszones._layers[polygon]._layers){
if(inner && mammalszones._layers[polygon].feature.id){
if(mammalszones._layers[polygon].feature.id >= 150){
mammalszones._layers[polygon].setStyle(one);
}
else if(mammalszones._layers[polygon].feature.id >= 140){
mammalszones._layers[polygon].setStyle(two);
}
else if(mammalszones._layers[polygon].feature.id >= 120){
mammalszones._layers[polygon].setStyle(three);
}
else if(mammalszones._layers[polygon].feature.id >= 100){
mammalszones._layers[polygon].setStyle(four);
}
else if(mammalszones._layers[polygon].feature.id >= 80){
mammalszones._layers[polygon].setStyle(five);
}
else if(mammalszones._layers[polygon].feature.id >= 60){
mammalszones._layers[polygon].setStyle(six);
}
else if(mammalszones._layers[polygon].feature.id >= 40){
mammalszones._layers[polygon].setStyle(seven);
}
}
}
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
