<?php
require_once __DIR__ . "/../db/db.php";

	function storeMessage($comment){
		global $conn;

		$sequel = "INSERT INTO comments (COMMENT) VALUES (?)";

		//prepare prevents injection apparently
		$stmt = $conn->prepare($sequel);

		if ($stmt->execute([$comment])) {
			return "Success";
		}
		else{
			return "Error";
		}

	} 

?>