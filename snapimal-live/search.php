<?php
include 'db.php';

$sql = "SELECT * from $tbl_name WHERE name LIKE '%" . mysql_real_escape_string($_GET['search']) . "%'";


$result = mysql_query($sql);

var_dump($result);
print_r($result);

if (!$result) {
    echo "Something went wrong! :(";
    print mysql_error();
    }

    echo '<ul style="width: 100%; padding: 0; margin: 0;">';

    while ($row = mysql_fetch_assoc($result)) {
        echo $row['name'] . ' ';
      }
?>
