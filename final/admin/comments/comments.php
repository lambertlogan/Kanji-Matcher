<?php
	require_once __DIR__ . "/../../lib/db/db.php";
	function getComments(){
		global $conn;

		$sequel = "SELECT * FROM comments ORDER BY ID DESC";
		$stmt = $conn->prepare($sequel);
		$stmt->execute();
		//because it's an associative array
		return $stmt->fetchAll(PDO::FETCH_ASSOC); 
	}
	function saveComment($comment){
		global $conn;
		$sequel = "INSERT INTO comments (COMMENT) VALUES (?)";
		$stmt = $conn->prepare($sequel);
		if ($stmt->execute([$comment])) {
			return "Success";
		}
		else{
			return "Error";
		}
	}

	function editComment($id, $comment){
		global $conn;

		$sequel = "UPDATE comments SET comment = ? WHERE id = ?";
		$stmt = $conn->prepare($sequel);
		return $stmt->execute([$comment, $id]);
	}

	function deleteComment($id){
		global $conn;

		$sequel = "DELETE FROM comments WHERE ID = ?";
		$stmt = $conn->prepare($sequel);
		return $stmt->execute([$id]);
	}
?>
