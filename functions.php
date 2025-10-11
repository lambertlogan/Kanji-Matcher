<?php
	function storeMessage($comment){
		$new_message = [
			"comment" => $comment,
			"recieved-on" => date("l d M Y h:i:s")
		];
		
		if(filesize("comments.json") == 0){
			$new_message["id"] = 0;
			$data = array($new_message);
		}
		else{
			$old_data = json_decode(file_get_contents("comments.json"), true);
			if ($old_data == null) {
				$old_data = [];
			}
			
			$id = end($old_data);
			$new_message["id"] = $id["id"] +1;
			
			array_push($old_data, $new_message);
			$data = $old_data;
		}
		$encoded_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		if(!file_put_contents("comments.json", $encoded_data, LOCK_EX)){
			return "Error";
		}
		else{
			return "success";
		}
	} 

?>