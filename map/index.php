<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" />
<![endif]-->
<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
<link rel="stylesheet" href="style.css" />
 <link href='http://api.tiles.mapbox.com/mapbox.js/v1.0.0/mapbox.css' rel='stylesheet' />
  <!--[if lte IE 8]>
    <link href='http://api.tiles.mapbox.com/mapbox.js/v1.0.0/mapbox.ie.css' rel='stylesheet' />
  <![endif]-->
  <script src='http://api.tiles.mapbox.com/mapbox.js/v1.0.0/mapbox.js'></script>
</head>
<body>
<div id="map"></div>

<script src="countries.js"></script>
<script src="zones.js"></script>
<script src="species.php"></script>
<script src="map.js"></script>
<script src="edge_zones_mammals.js"></script>
<script src="edge_zones_amphibians.js"></script>

<select id="countries">
<option>Country</option>
</select>

<input id="searchfield" placeholder="Search by common name"/><button id="search">Search</button>
<div id="searchresult"></div>

</body>
</html>