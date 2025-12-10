<?php
	include_once "awards.php"; 	
	$id = $_GET["id"];
	$line = getAward($id);
	
	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		$year = $_POST["year"];
		$name = $_POST["name"];
		$description = $_POST["description"];
		
		editAward($id, $year, $name, $description);
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Awards</title>
</head>
	<body>
		<h1>Edit Awards</h1>
		<h3>ID Number Is :<?php echo($id );?></h3>
		<form method="post">
			<p>
				<label>Year:</label><br>
				<?php echo"<input type='text' name='year' value='" . $line[0] . "'>"?>
			</p>
			<p>
				<label>Title:</label><br>
				<?php echo"<input type='text' name='name' value='" . $line[1] . "'>"?>
			</p>
			<p>
				<label>Description:</label><br>
				<?php echo"<input type='text' name='description' value='" . $line[2] . "'>"?>
			</p>
			<p>
				<button type="submit">Save Edits</button>
			</p>
		</form>
		<br>
		<a href="index.php">Back to Awards List</a>
	</body>
	
</html>