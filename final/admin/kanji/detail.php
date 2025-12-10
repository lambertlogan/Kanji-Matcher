<?php
	include_once "awards.php";
	$infos = getAwards();
	$row = getAward($_GET["id"]);	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Details</title>
	</head>
	<body>
		<h1>Contact Details</h1>

	<?php 
		
		echo "<p><b>Year:</b> " . $row[0] . "</p>";
		echo "<p><b>Title:</b> " . $row[1] . "</p>";
		echo "<p><b>Description:</b> " . $row[2] , "</p>";
	?>
		<br>
		<a href="index.php">Back to Awards List</a>
	</body>
</html>