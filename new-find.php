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
foreach ($_FILES["image"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["image"]["tmp_name"][$key];
        $name = $_FILES["image"]["name"][$key];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}
// Building query
    $sql="INSERT INTO $tbl_name (name, description, image, location) VALUES('" . $_POST['name']  . "','" . $_POST['description']  . "','" . $_POST['image']  . "','" . $_POST['location']  . "')";

     mysql_query($sql);

     print mysql_error();
    }

?>

<html>

    <?php
    print  $_POST['name'];
    print $_FILES['image'];
    print '<div><span style="color: #a89898; ">Description &#187; </span><span style="color: #0093ff; font-weight: bold;">' . $_POST['description'] . '</span></div>';
    print '<div><span style="color: #a89898; ">Owners &#187; </span><span style="color: #0093ff; font-weight: bold;">' . $_POST['location'] . '</div>';
    print '<div><span style="color: #a89898; ">Language &#187; </span><span style="color: #0093ff; font-weight: bold;">' . $_POST['image'] . '</div>';
    print '</div></center>';

    ?>
    </body>
    </font>
</html>
