<?php 
	include 'nav.php';
	include 'db.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create a group - Snapimal</title>
	<link rel="stylesheet" href="style.css">
	<style>
	.search input {
		margin: 0 auto;

	}
	.search input:focus {
		font-size: 30px;
		width: 80%;
		text-align: center;
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
          while ($row = mysql_fetch_assoc($result)) {
            echo '<a href="?name=' . $row["Name"] . '">' . $row["Name"] . '</a></br>';
          } 
          if ($_GET['name'] = $row["Name"]) { 
          		$current_name = $row["Name"];
          	?>
          	<h1><?php echo $current_name; ?></h1>

         <?php }else {
         		echo 'What is up with these GET variables man.';
         	} ?>
	</section>
</body>
</html>