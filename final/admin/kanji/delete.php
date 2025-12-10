<?php
	include_once "awards.php";
	
	$id = $_GET["id"];
	$awards = getAwards();
	
	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		if ($_POST["confirm"] == "yes"){
			deleteAward($id);
			header("Location: index.php");
			exit();
		}
		else{
			header("Location: index.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
	</head>
	<body>
		<h1>Delete Award</h1>
		<p>Are you sure you want to delete this award?</p>
		<p>
			<b>
				<?php echo "Year: " . $awards[$id][0] . "<br>"?>
				<?php echo "Title: " . $awards[$id][1] . "<br>"?>
				<?php echo "Description: " . $awards[$id][2] ?>
			</b>
		</p>
		<form method="post">
			<button type="submit" name="confirm" value="yes">Yes, Delete</button>
			<button type="submit" name="confirm" value="no">Cancel</button>
		</form>
	</body>
</html>
