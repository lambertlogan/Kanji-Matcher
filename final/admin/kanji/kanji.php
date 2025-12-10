<?php
	function getProducts(){
		$data = json_decode(file_get_contents("../../data/Products.json"), true);
		return $data["products"];
	}
	function getProduct($id){
		$product = getProducts();
		return $product[$id];
	}
	function addProduct($name, $description, $applications){
		$data = json_decode(file_get_contents("../../data/Products.json"), true);

		$data["products"][] = [
			"name" => $name,
			"description" => $description,
			"applications" => $applications
		];
		file_put_contents("../../data/Products.json", json_encode($data));
	}

	function editProduct($id, $name, $description, $applications){
		$data = json_decode(file_get_contents("../../data/Products.json"), true);

		$data["products"][$id] = [
			"name" => $name,
			"description" => $description,
			"applications" => $applications
		];
		file_put_contents("../../data/Products.json", json_encode($data));
	}

	function deleteProduct($id){
		$data = json_decode(file_get_contents("../../data/Products.json"), true);
		array_splice($data["products"], $id, 1);
		file_put_contents("../../data/Products.json", json_encode($data));
	}
?>
