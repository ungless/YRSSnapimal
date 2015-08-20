<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>EDGE Map</title>

<style>

html {width:100%; height:100%;}

#map {width:500px; height:500px;}

</style>

 

<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />

</head>

<body>




<div id="map"></div>

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

 

var map = L.map('map').setView([0, 0], 1);

 

L.tileLayer('http://a.tiles.mapbox.com/v3/zsl.map-j9ykp4sl/{z}/{x}/{y}.png', {

    attribution: 'Map hosted by <a href="http://mapbox.com">MapBox</a>',

    maxZoom: 18

}).addTo(map);

 

var markers = [


<?php

$con = database_connect();

$query = "SELECT * FROM MEMBER_TEXT WHERE Member_ID = '186' ";

$queryresult = mysql_query($query);
if (!$queryresult) die ("Database access failed: " . mysql_error());
$result = mysql_num_rows($queryresult);

for ($j = 0 ; $j < $result ; ++$j)

{

$result = mysql_fetch_row($queryresult);

$style = $j;

?>

L.marker([<?php echo $result['Geolocation_Lat']; ?>,<?php echo $result['Geolocation_Long']; ?>], {'title':"Amp", 'tags':["<?php echo $result['Geolocation_Long'];
?>","<?php echo $result['Geolocation_Long'];
?>","<?php echo $result['Geolocation_Long'];
?>","<?php echo $result['Geolocation_Long'];
?>"]}).bindPopup("<h3>Test</h3><p>Test</p>"),

 
<?php } ?>

]

</script>
TEST2

</body>
</html>