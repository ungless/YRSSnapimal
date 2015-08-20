<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

var mamIcon = new LeafIcon({iconUrl: 'mammal_icon.png'}),
    coralIcon = new LeafIcon({iconUrl: 'coral_reef_icon.png'}),
    ampIcon = new LeafIcon({iconUrl: 'amphibian_icon.png'}),
	noIcon = new LeafIcon({iconUrl: '0.png'}); 
	
<!-- No Icon in there to cater for the one extra entry -->	
	

var markers = [

<!-- Start the database connection -->

<?php

$con = database_connect();

$query = "SELECT PROJECT.*,PROJECT_TEXT.Project_ID, Text_Type, PROJECT_TEXT.Status, Text FROM PROJECT LEFT JOIN PROJECT_TEXT ON PROJECT.Project_ID = PROJECT_TEXT.Project_ID WHERE PROJECT_TEXT.Text_Type = 'EDGE Chronology' AND PROJECT_TEXT.Text = 'Current' AND PROJECT_TEXT.Status = 'Publish'";

$queryresult = mysql_query($query);

if (!$queryresult) die ("Database access failed: " . mysql_error());
$result = mysql_num_rows($queryresult);

for ($j = 0 ; $j < $result ; ++$j)

{

$result = mysql_fetch_row($queryresult);

$get_project_id = $result[0];
$get_projectname = $result[5];
$get_projectdesc = $result[6];
$get_projectlocation = $result[7];

$get_projectdesc = str_replace("'", '', $get_projectdesc);
$get_projectdesc = str_replace('"', '', $get_projectdesc);

$get_projectlocation = str_replace("'", '', $get_projectlocation);
$get_projectlocation = str_replace('"', '', $get_projectlocation);

?><?php
	  
$subquery1 = "SELECT PROJECT_TEXT.Project_ID, Status, Text_Type, Text FROM PROJECT_TEXT WHERE Text_Type = 'Geolocation_Lat' AND Project_ID = '$get_project_id' ";	
$subresult1 = mysql_query($subquery1);
if (!$subresult1) die ("Database access failed: " . mysql_error());
	
$subrow1 = mysql_fetch_row($subresult1);

$get_project_lat = $subrow1[3];

?><?php
	  
$subquery2 = "SELECT PROJECT_TEXT.Project_ID, Status, Text_Type, Text FROM PROJECT_TEXT WHERE Text_Type = 'Geolocation_Long' AND Project_ID = '$get_project_id' ";	
$subresult2 = mysql_query($subquery2);
if (!$subresult2) die ("Database access failed: " . mysql_error());
	
$subrow2 = mysql_fetch_row($subresult2);

$get_project_long = $subrow2[3];
	
?><?php
	  
$subquery3 = "SELECT PROJECT_IMAGE.Image_Type, PROJECT_IMAGE.Image FROM PROJECT_IMAGE WHERE Image_Type = 'Main' AND Project_ID = '$get_project_id' ";
$subresult3 = mysql_query($subquery3);
if (!$subresult3) die ("Database access failed: " . mysql_error());
	
$subrow3 = mysql_fetch_row($subresult3);

$get_project_image = $subrow3[1];
	
?>




<!-- Now fetch which member is associated with this project so we can get the species -->

<?php
	  
$subquery4 = "SELECT PROJECT_MEMBER.Project_ID, Member_ID FROM PROJECT_MEMBER WHERE Project_ID = '$get_project_id' LIMIT 1 ";
$subresult4 = mysql_query($subquery4);
if (!$subresult4) die ("Database access failed: " . mysql_error());
	
$subrow4 = mysql_fetch_row($subresult4);

$get_member = $subrow4[1];
	
?>






<?php
	  
$subquery5 = "SELECT SPECIES.Species_ID, EDGE_Group, Common_name, Scientific_name, EDGE_Rank, GE_Score, Short_summary, Relevance_Description
FROM SPECIES INNER JOIN MEMBER_SPECIES USING ( Species_ID ) WHERE Member_ID = '$get_member' AND MEMBER_SPECIES.Status = 'Publish' AND SPECIES.Status = 'Publish'";
$subresult5 = mysql_query($subquery5);
if (!$subresult5) die ("Database access failed: " . mysql_error());
	
$subrow5 = mysql_fetch_row($subresult5);

$get_fellow_species_id = $subrow5[0];
$get_fellow_edge_group = $subrow5[1];
$get_fellow_species = $subrow5[2];
$get_fellow_species_sciname = $subrow5[3];
$get_fellow_species_rank = $subrow5[4];
	
?>			

L.marker([<?php if (IsSet ($get_project_lat) === true ) { echo $get_project_long; } else { echo "0.0"; } ?>, <?php if (IsSet ($get_project_long) === true ) { echo $get_project_long; } else { echo "0.0"; } ?>],{ icon: <?php if ($get_fellow_edge_group == 'Mammals') { echo "mamIcon"; } elseif ($get_fellow_edge_group == 'Amphibians') { echo "ampIcon"; } elseif ($get_fellow_edge_group == 'Coral reef') { echo "coralIcon"; }else { echo "noIcon"; } ?>, 'title':"<?php echo $get_fellow_edge_group; ?>", 'tags':["<?php echo $get_fellow_edge_group; ?>"]}).bindPopup("<div class=popup_wrapper><h3><?php echo $get_projectname; ?>| Member ID = <?php echo $get_member ?></h3><img width=180 class=popup_image src=http://www.edgeofexistence.org<?php echo $get_project_image; ?>><div class=popup_summary_box><div id=summary_title><a href=http://www.edgeofexistence.org/community/member_info.php?id=<?php echo $get_fellow_id; ?>>View my community profile</a></div><div id=summary_content><?php echo $get_summary; ?></div></div><div class=popup_summary_box><div id=summary_title>Project locations:</div><div id=summary_content><?php echo $get_projectlocation; ?></div></div><div class=popup_summary_box><div id=summary_title>Species:</div><div id=summary_content><?php echo $get_fellow_species; ?> (<i><?php echo $get_fellow_species_sciname; ?></i>)</div></div><div class=popup_summary_box><div id=summary_title>Species EDGE Rank:</div><div id=summary_content><?php echo $get_fellow_species_rank; ?></div></div></div>"),
 
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