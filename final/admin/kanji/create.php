<?php
	include_once "awards.php"; 	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST["year"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    
	addAward($year, $name, $description);
    $awards = getAwards();
    $newId = count($awards);

    header("Location: edit.php?id=" . $newId - 1 . "");
    exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Awards</title>
	</head>
	<body>
		<h1>Create a new award</h1>
		<form method="post">
			<p>
				<label>Year:</label><br>
				<input type="text" name="year">
			</p>
			<p>
				<label>Award Title:</label><br>
				<input type="text" name="name">
			</p>
			<p>
				<label>Description:</label><br>
				<textarea name="description" rows="5"></textarea>
			</p>
			<p>
				<button type="submit">Create Award</button>
			</p>
		</form>
		<br>
		<a href="index.php">Awards List</a>
	</body> 
<body>
