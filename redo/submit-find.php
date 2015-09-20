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
    <label>
    Name
      <input type="text" 
      placeholder="e.g. Golden Eagle" required>
    </label>

    <label>
    Description
      <textarea 
      placeholder="e.g. Bright feathers and a long neck, 
      found it in a relatively big nest."></textarea>
    </label>

    <label>
    Group
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
    </label>

    <label>
    Sex
      <label>Male <input type="radio" 
      name="sex-of-animal"></label> 
      <label>Female <input type="radio" 
      name="sex-of-animal"></label>
      <label>Not specified <input type="radio" 
      name="sex-of-animal" checked></label>
    </label>

    <label>Image
        <input type="file" name="image" 
        allowed=".gif, .jpg, .png" required/>
    </label>
    <input type="submit" value="Submit animal"> 
  </form>
</body>
</html>