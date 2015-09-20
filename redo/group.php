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
</body>
</html>