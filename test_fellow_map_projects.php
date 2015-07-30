<?php
include ('db.php');

$select_from_db = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT 5 ";


          $result = mysql_query($select_from_db);

          if (!$result) {
            echo "Something went wrong! :(";
            print mysql_error();
          }
          $markers = '';
          while ($row = mysql_fetch_assoc($result)) {

            $markers = $markers
              . 'L.marker([' . $row['lat'] . ',' . $row['lon'] . '],{ icon: new LeafIcon({iconUrl: \'image_uploads/'
              . $row['image'] . '\'}), "title":"' . $row['name']
              . '", "tags":["Mammals"]}).bindPopup("<h1 align=\'center\'>'
              . $row['name'] . '</h1>'
              . '"),';
          }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>EDGE Map</title>

<style>

html {width:100%; height:100%;}

.map_wrapper { float:left; width:960px; }

#map {width:960px; height:650px;}

.show_hide_checkbox_wrapper { float:left; width:960px; margin-top:15px; margin-bottom:30px; background:url(check_back.png) repeat-x; border-radius:15px; border:1px solid #eaeaea; }

#mam_checkbox_wrapper {	float:left; border:5px solid #b83131; border-radius:10px; padding: 18px 15px 39px 66px; background:url(mammal_icon.png) no-repeat 10px 2px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:15px; color:#333; margin:10px;  }
#amp_checkbox_wrapper { float:left; border:5px solid #669633; border-radius:10px; padding: 18px 15px 39px 66px; background:url(amphibian_icon.png) no-repeat 10px 2px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:15px; color:#333; margin:10px;  }
#coral_checkbox_wrapper { float:left; border:5px solid #75589c; border-radius:10px; padding: 18px 15px 39px 66px; background:url(coral_reef_icon.png) no-repeat 10px 2px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:15px; color:#333; margin:10px;  }

#mam_checkbox { float: left; margin-right: 7px; margin-top: 2px; }
#amp_checkbox { float: left; margin-right: 7px; margin-top: 2px; }
#coral_checkbox { float: left; margin-right: 7px; margin-top: 2px; }

.popup_summary_box {  }

#summary_title { font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#333; border-bottom:1px solid #CCCCCC; margin-bottom:10px; margin-top:10px;	}

#summary_title a:link { font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#b51f24;  margin-bottom:10px; margin-top:10px;	}

#summary_title a:visited { font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#b51f24; margin-bottom:10px; margin-top:10px;	}

#summary_title a:hover { font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#b51f24;  margin-bottom:10px; margin-top:10px;	}

#summary_content { font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#666; margin-bottom:10px;		}

#map h3 { margin-bottom:10px; color:#000; font-size:24px; border-bottom:1px solid #CCCCCC; letter-spacing:-1px;}
.popup_wrapper img {  margin-right:10px; border:1px solid #CCCCCC;}
#map p { margin:0px;}

</style>



<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />

</head>

<body>


<div class="map_wrapper">

<div id="map"></div>

</div>

<script>

function startup() { for(i=0; i<=markers.length; i++){
map.addLayer(markers[i]);
}}

var map = L.map('map').setView([0, 0], 3);



L.tileLayer('http://a.tiles.mapbox.com/v3/zsl.map-j9ykp4sl/{z}/{x}/{y}.png', {

    attribution: 'Map hosted by <a href="http://mapbox.com">MapBox</a>',

    maxZoom: 18

}).addTo(map);

var LeafIcon = L.Icon.extend({
    options: {
    shadowUrl: '',
        iconSize:     [50, 81],
        shadowSize:   [32, 41],
        iconAnchor:   [24, 41],
        shadowAnchor: [32, 41],
        popupAnchor:  [-3, -76]
    }
});

var mamIcon = new LeafIcon({iconUrl: 'img/camera.svg'}),
    coralIcon = new LeafIcon({iconUrl: 'coral_reef_icon.png'}),
    ampIcon = new LeafIcon({iconUrl: 'amphibian_icon.png'}),
	noIcon = new LeafIcon({iconUrl: '0.png'});

<!-- No Icon in there to cater for the one extra entry -->


var markers = [
<?php echo $markers; ?>
]

startup()

</script>

<!-- Fire the first sub query to fetch the Geo Lat now we know the fellow IDs -->

<!-- Fire the second sub query to fetch the Geo lon now we know the fellow IDs -->

<!-- Fire the third sub query to fetch their image and some bling now that we know their fellow ID -->

<!-- Fire the fourth sub query to fetch their meta / species type / favourite ice cream now that we know their fellow ID -->

<!-- Let's reconstruct all of the data into a map marker -->

<!-- End getting SQL data -->

<!-- This is our code to show markers

for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Mammals")> -1){

map.addLayer(markers[i]);

}

}

-->




<div class="show_hide_checkbox_wrapper">

<div id="mam_checkbox_wrapper">
<input type="checkbox" name="mam_checkbox" id="mam_checkbox" onclick="fn_mam_checked(this.checked);"/> Hide/Show Mammal Fellows
</div>

<div id="amp_checkbox_wrapper">
<input type="checkbox" name="amp_checkbox" id="amp_checkbox" onclick="fn_amp_checked(this.checked);"/> Hide/Show Amphibian Fellows
</div>

<div id="coral_checkbox_wrapper">
<input type="checkbox" name="coral_checkbox" id="coral_checkbox" onclick="fn_coral_checked(this.checked);"/> Hide/Show Coral Reef Fellows
</div>






</div>



<script>
function fn_mam_checked(mam_checked)
{

if(mam_checked)
{
for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Mammals")> -1){

map.removeLayer(markers[i]);

}

}

}
else
{
for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Mammals")> -1){

map.addLayer(markers[i]);

}

}
}

}




function fn_amp_checked(amp_checked)
{

if(amp_checked)
{
for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Amphibians")> -1){

map.removeLayer(markers[i]);

}

}

}
else
{
for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Amphibians")> -1){

map.addLayer(markers[i]);

}

}
}

}




function fn_coral_checked(coral_checked)
{

if(coral_checked)
{
for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Coral reef")> -1){

map.removeLayer(markers[i]);

}

}

}
else
{
for(i=0; i<=markers.length; i++){

if(markers[i] && markers[i].options.tags.indexOf("Coral reef")> -1){

map.addLayer(markers[i]);

}

}
}

}
</script>


</body>
</html>
