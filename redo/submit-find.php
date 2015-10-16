<?php
  include 'nav.php';
  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submit a find - Snapimal</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<style>
  .search { 
    display: none;
  }
</style>
  <form action="new-animal.php" class="submit" method="post" enctype="multipart/form-data">
      <label for="name">Name</label>
      <input name="name" type="text" 
      placeholder="e.g. Golden Eagle">
    </br>
    <label for="description">Description</label>
      <textarea name="description"
      placeholder=
      "e.g. Bright feathers and a long neck, found it in a relatively big nest."></textarea>
    </br>

    <label for="group">Group</label>
      <select name="group" required>
        <?php 
        $select_from_db = "SELECT * FROM $tbl_name ORDER BY id desc";
                    $result = mysql_query($select_from_db);
                    if (!$result) {
                      echo "Something went wrong! :( Please contact the system admininstrator. 
                        Oh wait. That's me.";
                      print mysql_error();
                    }
          while ($row = mysql_fetch_assoc($result)) {
            echo '<option> ' . $row['name'] . '</option>';
          }
        ?>
      </select> 
    </br>
  <input type="file" name="image" required/>
  <label for="lat">Latitude</label>
    <input type="int" name="lat" placeholder="Latitude">

  <label for="lon">Longitude</label>
    <input type="int" name="lon" placeholder="Longitude">

    <label for="cat">Cat</label>
    <select class="" name="cat">
      <option>Bird</option>
      <option>Amphibian</option>
      <option>Reptile</option>
      <option value="water">Water animal</option>
      <option value="mammal">Land Mammal</option>
    </select>
    
    <input type="submit" value="Submit animal"> 
  </form>
</body>
</html>