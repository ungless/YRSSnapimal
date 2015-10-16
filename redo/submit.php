<?php
include 'db.php';

if ( isset($_POST['name']) 
  && isset($_POST['description'])
  && isset($_POST['image'])) { echo 'WellDone bruh'; }
  var_dump( $_FILES );
print_r( $_FILES );
$uploads_dir = 'C:/xampp/htdocs/YRSSnapimal/image_uploads';
$error = $_FILES["image"]["error"];
if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
}
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
   

