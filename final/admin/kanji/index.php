<?php
	include_once "awards.php";
	$infos = getAwards();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Contact</title>
	</head>
	<body>
		<h1>Contact Requests</h1>
		<button type="button"><a href='create.php?id='>Create</a></button>
		<br>
		<table border="2" cellpadding="10">
		<tr>
			<td>Year</td>
			<td>Title</td>
			<td>Description</td>
			<td>Details</td>
			<td>Delete</td>
		</tr>
		<?php
		for ($x = 1; $x < count($infos); $x++){
			$row = $infos[$x];
			echo "<tr>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "<td><a href='detail.php?id=" . $x . "'>View</a></td>";
				echo "<td><a href='delete.php?id=" . $x . "'>Delete</a></td>";
			echo "</tr>";
		}
		?>
		</table>
	</body>
</html>
