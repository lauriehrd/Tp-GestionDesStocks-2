<?php

// fonctions debug
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include "utility.php";

$exec;
$db = connectDB("localhost","biz_stock","root","laurie");

$products = getProducts();
debug($db);



function getProducts(){
    global $db;
    global $exec;

    $sql = "SELECT * FROM produits";
    $exec = $db->query($sql);
    return $exec->fetchAll(PDO::FETCH_OBJ);
}

if(isset($_POST["create_product"])){
	createProduct();
}

if(isset($_GET["id"])){
	$products = getProducts($_GET["id"]);
}


if(isset($_POST["delete_products"])){	

debug($_POST);

		foreach ($_POST["delete_product_id"] as $key => $id) {
			debug($key);
			debug($id);

			$sql="DELETE FROM produits WHERE id = :id";
			$statement= $db->prepare($sql);
			$statement->bindParam(":id", $id, PDO :: PARAM_INT);
			$res=$statement->execute();
		}

		header('location:http://localhost/exo-coorection/TP_GestionsDesStocks2/index.php');

}

function createProduct(){
	global $db;

		$sql ="INSERT INTO produits (nom, prix, description)
			   VALUES(:nom, :prix, :description)";

	$statement = $db->prepare($sql);
	$statement->bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
	$statement->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
	$statement->bindParam(":prix", $_POST["prix"], PDO::PARAM_INT);
	$res=$statement->execute();
	$msg_crud=($res===true)? "insertion ok" : "soucis à l'insertion";
	header("Location:index.php");
}



?>