<?php
include 'db.php';

if ( isset($_POST['name']) 
  && isset($_POST['description'])
  && isset($_POST['image'])) {}

$sql = "INSERT INTO $tbl_name (name, 
  description, 
  lon, 
  lat, 
  image, 
  cat) VALUES('"
    . $_POST['name']  . "','"
    . $_POST['description'] . "', '"
    . $_POST['sex-of-animal'] . "', '"
    . $_POST['lat'] . "', '"
    . $_POST['lon'] . "','"
    . $_POST['cat'] . "', '"
    . $_POST['group'] .
    "')";

$result = mysql_query($select_from_db);
if (!$result) {
  echo "Something went wrong! :(
   Please contact the system admininstrator. 
    Oh wait. That's me.";
  print mysql_error();
}
   

