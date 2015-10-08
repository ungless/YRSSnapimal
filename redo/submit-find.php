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
  <form action="submit.php" class="submit">
      <label for="name">name</label>
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

    <label for="image">Image</label>
        <input type="file" name="image" 
        allowed=".gif, .jpg, .png, .jpeg"/>
    
    <input type="submit" value="Submit animal"> 
  </form>
</body>
</html>