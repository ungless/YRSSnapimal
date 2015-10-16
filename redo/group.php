<?php 
	include 'nav.php';
	include 'db.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_GET["name"]; ?> - Snapimal</title>
	 <script src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
	 	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
	 	<script src='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
		<link href='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />

	<style>
	.search input {
		margin: 0 auto;

	}
	.search input:focus {
		font-size: 30px;
		width: 80%;
		text-align: center;
	}
  
  #map {
  position:absolute;  
  width:80%;
  margin: 1em;
  height: 45em;
  background-color: gainsboro;
}

	</style>
</head>
<body>
	<section class="create-group">
		<form>
			<label>
			Name of group 
			<input type="text" placeholder="Name..."></label>
			<label>
			Type
			<select>
					<option>Birds</option>
					<option>Amphibians</option>
					<option>Reptiles</option>
					<option>Water animals</option>
					<option>Land Mammals</option>
					<option>Other</option>
			</select>
			</label>

			<label>
			Description
			<textarea 
			placeholder="Short description of  your group..." 
			rows="5">
			</textarea>
			</label>

			<label>
			Private
				<input type="checkbox" name="private" unchecked>
			</label>

			<input type="submit" value="Create Group">
		</form>
	</section>

	<section class="select-group">
		<?php 
        $select_from_db = "SELECT * FROM groups ORDER BY id desc";
        $result = mysql_query($select_from_db);
          if (!$result) {
            echo "Something went wrong! :( Please contact the system admininstrator. 
              Oh wait. That's me.";
            print mysql_error();
          }
          ?>
          <div class="names">
          <?php
          while ($row = mysql_fetch_assoc($result)) {
            echo '<a class="name" href="?name=' . $row["Name"] . '">' . $row["Name"] . '</a></br>';
            if ($_GET["name"] == $row["Name"] && !empty($_GET['name'])) { 
              $current_name = $row["Name"];
          	?>
          	</div>
          	<h1><?php echo $current_name; ?> </h1>
            <script>
            document.querySelector('.names').style.display = 'none';
            </script>

          	<?php }}
          	$mapSelect_from_db = "SELECT * FROM submissions";
        $mapResult = mysql_query($mapSelect_from_db);
          if (!$result) {
            echo "Something went wrong! :( Please contact the system admininstrator. 
              Oh wait. That's me.";
            print mysql_error();
          }
          	$markers = '';
                  while ($row = mysql_fetch_assoc($mapResult)) {
                    $markers = $markers
                     . 'L.marker([' . $row['lat'] . ',' . $row['lon'] . '], { icon: ' . $row['cat'] . ', "title":"'
                     . $row['name']
                     . '", "tags":"' . $row['cat'] . '"}).addTo(map)
                     .bindPopup("<h1 style=\"color: black; padding: 1em 0 ;\" align=\'center\'>'
                     . $row['name'] . '<img src=\'image_uploads/' . $row['image'] . '\' width=\'80%\'/><h3 style=\"color: black;\">'
                     . $row['description']
                     . '</h3>' . '"); 
                     ';
                   }
           ?>
           <div id="map"></div> 
          <script>
          var map = L.map('map').setView([51.505, -0.09], 13);

          L.tileLayer('https://api.tiles.mapbox.com/v4/snapimal.cf275738/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic25hcGltYWwiLCJhIjoiZTRkMzQzYTFiZDExYTQ5NmI2NmU3NWMxNzgwYjNkMjAifQ.NadXwz8X4dxNl8DmEYXh4g', {
              attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
              maxZoom: 18,
              id: 'snapimal.cf275738',
              accessToken: 'pk.eyJ1Ijoic25hcGltYWwiLCJhIjoiZTRkMzQzYTFiZDExYTQ5NmI2NmU3NWMxNzgwYjNkMjAifQ.NadXwz8X4dxNl8DmEYXh4g'
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


        var mammal = new LeafIcon({iconUrl: 'img/mammal.svg'});
            water = new LeafIcon({iconUrl: 'img/fish.svg'});
            Amphibian = new LeafIcon({iconUrl: 'img/Amphibian.svg'});
        	  Reptile = new LeafIcon({iconUrl: 'img/Reptile.svg'});
            Bird = new LeafIcon({iconUrl: 'img/bird.svg'});

           <?php echo $markers; ?>

          </script>
	</section>
</body>
</html>