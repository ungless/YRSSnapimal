<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>EDGE Map</title>

<style>

html {width:100%; height:100%;}

.map_wrapper { float:left; width:960px; }

#map {width:960px; height:500px;}

.show_hide_checkbox_wrapper { float:left; width:960px; margin-top:15px; margin-bottom:30px; background:url(check_back.png) repeat-x; border-radius:15px; border:1px solid #eaeaea; }

#mam_checkbox_wrapper {	float:left; border:5px solid #b83131; border-radius:10px; padding: 18px 15px 39px 66px; background:url(mammal_icon.png) no-repeat 10px 2px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:15px; color:#333; margin:10px;  }
#amp_checkbox_wrapper { float:left; border:5px solid #669633; border-radius:10px; padding: 18px 15px 39px 66px; background:url(amphibian_icon.png) no-repeat 10px 2px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:15px; color:#333; margin:10px;  }
#coral_checkbox_wrapper { float:left; border:5px solid #75589c; border-radius:10px; padding: 18px 15px 39px 66px; background:url(coral_reef_icon.png) no-repeat 10px 2px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; letter-spacing:-1px; font-size:15px; color:#333; margin:10px;  }

#mam_checkbox { width:10px; height:10px; 	}
#amp_checkbox { 	}
#coral_checkbox {		}

</style>

 

<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />

</head>

<body>


<div class="map_wrapper">

<div id="map"></div>

</div>

<?php

function database_connect()
{
  //$connection = mysql_connect ("localhost", "edgeofex_prod", "Zaglossus1");
  $connection = mysql_connect ("localhost", "edgeprd2_db", "Zaglossus1");
  if (!$connection)
  {
    die('Could not connect: ' . mysql_error());
  }

  //mysql_select_db("edgeofex_piaget2", $connection);
  mysql_select_db("edgeprd2_kagan", $connection);
  mysql_query("SET CHARACTER SET \"utf8\"");
  mysql_query("SET NAMES \"utf8\"");

  return $connection;
}

?>

<script>

function startup() { for(i=0; i<=markers.length; i++){
map.addLayer(markers[i]); 
}}

var map = L.map('map').setView([0, 0], 2);

 

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

var mamIcon = new LeafIcon({iconUrl: 'mammal_icon.png'}),
    coralIcon = new LeafIcon({iconUrl: 'coral_reef_icon.png'}),
    ampIcon = new LeafIcon({iconUrl: 'amphibian_icon.png'}); 
	noIcon = new LeafIcon({iconUrl: ''}); 
	
<!-- No Icon in there to cater for the one extra entry -->	
	

var markers = [

<!-- Start the database connection -->

<?php

$con = database_connect();

$query = "SELECT MEMBER.*, MEMBER_MEMBER_TYPE.Member_Type_ID FROM MEMBER LEFT JOIN MEMBER_MEMBER_TYPE ON MEMBER.Member_ID = MEMBER_MEMBER_TYPE.Member_ID WHERE Member_Type_ID = 4 AND MEMBER.Status = 'Publish'";

$queryresult = mysql_query($query);

if (!$queryresult) die ("Database access failed: " . mysql_error());
$result = mysql_num_rows($queryresult);

for ($j = 0 ; $j < $result ; ++$j)

{

$result = mysql_fetch_row($queryresult);

$get_fellow_id = $result[0];
$get_firstname = $result[5];

?><?php
	  
$subquery1 = "SELECT MEMBER_TEXT.Member_ID, Text_Type, STATUS, Text FROM MEMBER_TEXT WHERE Text_Type = 'Geolocation_Lat' AND Member_ID = '$get_fellow_id' ";	
$subresult1 = mysql_query($subquery1);
if (!$subresult1) die ("Database access failed: " . mysql_error());
	
$subrow1 = mysql_fetch_row($subresult1);

$get_fellow_lat = $subrow1[3];

?><?php
	  
$subquery2 = "SELECT MEMBER_TEXT.Member_ID, Text_Type, STATUS, Text FROM MEMBER_TEXT WHERE Text_Type = 'Geolocation_Long' AND Member_ID = '$get_fellow_id' ";	
$subresult2 = mysql_query($subquery2);
if (!$subresult2) die ("Database access failed: " . mysql_error());
	
$subrow2 = mysql_fetch_row($subresult2);

$get_fellow_long = $subrow2[3];
	
?><?php
	  
$subquery3 = "SELECT MEMBER_IMAGE.Member_ID, STATUS , Image_Type, Image FROM MEMBER_IMAGE WHERE Image_Type = 'Main' AND STATUS = 'Publish'
AND Member_ID = '$get_fellow_id' ";
$subresult3 = mysql_query($subquery3);
if (!$subresult3) die ("Database access failed: " . mysql_error());
	
$subrow3 = mysql_fetch_row($subresult3);

$get_fellow_image = $subrow3[3];
	
?><?php
	  
$subquery4 = "SELECT SPECIES.Species_ID, EDGE_Group, Common_name, Scientific_name, EDGE_Rank, GE_Score, Short_summary, Relevance_Description
FROM SPECIES INNER JOIN MEMBER_SPECIES USING ( Species_ID ) WHERE Member_ID = '$get_fellow_id' AND MEMBER_SPECIES.Status = 'Publish' AND SPECIES.Status = 'Publish'";
$subresult4 = mysql_query($subquery4);
if (!$subresult4) die ("Database access failed: " . mysql_error());
	
$subrow4 = mysql_fetch_row($subresult4);

$get_fellow_edge_group = $subrow4[1];
	
?>			

L.marker([<?php if (IsSet ($get_fellow_lat) === true ) { echo $get_fellow_lat; } else { echo "0.0"; } ?>, <?php if (IsSet ($get_fellow_long) === true ) { echo $get_fellow_long; } else { echo "0.0"; } ?>],{ icon: <?php if ($get_fellow_edge_group == 'Mammals') { echo "mamIcon"; } elseif ($get_fellow_edge_group == 'Amphibians') { echo "ampIcon"; } elseif ($get_fellow_edge_group == 'Coral reef') { echo "coralIcon"; }else { echo "noIcon"; } ?>, 'title':"<?php echo $get_fellow_edge_group; ?>", 'tags':["<?php echo $get_fellow_edge_group; ?>"]}).bindPopup("<h3>This is <?php echo $get_firstname; ?> - ID <?php echo $get_fellow_id; ?></h3><p>Test - <img src=http://www.edgeofexistence.org/<?php echo $get_fellow_image; ?>/></p>"),
 
<?php } ?>

]

startup()

</script>

<!-- Fire the first sub query to fetch the Geo Lat now we know the fellow IDs -->

<!-- Fire the second sub query to fetch the Geo Long now we know the fellow IDs -->

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


END OF THE MAP

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




<script>
function remove()
{
for (i = 0; i <= markers.length; i++){
if (markers[i]){
map.addLayer(markers[i])}}
}
</script>



</body>
</html>