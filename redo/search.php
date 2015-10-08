<?php
include 'db.php';

$sql = "SELECT * from groups";

$result = mysql_query($sql);

var_dump($result);
print_r($result);

$result = mysql_query($sql);
if (!$result) {
  echo "Something went wrong! :(
   Please contact the system admininstrator. 
    Oh wait. That's me.";
  print mysql_error();
}

$fetch_db = mysql_fetch_array($result);
echo json_encode($fetch_db);


