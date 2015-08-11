<?php
// includes the database settings
include ('db.php');
// Make sure the project name and description exists.
if ( isset($_POST['name']) && isset($_POST['description'])) {
// Tests if image and location are called in document
if ( !isset($_POST['image'] )){$_POST['image'] = "" ;}
if ( !isset($_POST['location'] )){$_POST['location'] = "" ;}
var_dump( $_FILES );
print_r( $_FILES );
$uploads_dir = 'C:/xampp/htdocs/YRSSnapimal/image_uploads';
$error = $_FILES["image"]["error"];
if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
}
// Building query
    $sql = "INSERT INTO $tbl_name (name, description, lon, lat, image, cat) VALUES('"
    . $_POST['name']  . "','"
    . $_POST['description'] . "', '"
    . $_POST['lon'] . "', '"
    . $_POST['lat'] . "', '"
    . $name  . "', '"
    . $_POST['cat'] .
    "')";
    if (!mysql_query($sql)) {
      echo "Something went wrong! :(";
    }
    if ($_POST['name', 'description'] == '')
    {
      echo 'You must have a name!';
    }
     print mysql_error();
}
    // header('Location: http://max.dev/YRSSnapimal/index.php');
    print 'image: <img src="image_uploads/'. $name . '"height="100px" width="100px"></br>';
    ?>
