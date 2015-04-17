<?php
ini_set('display_errors', 1);

$id = (int) $_POST['id'];

try{
	$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bd = new PDO('mysql:host=127.0.0.1;dbname=yaradua','root','',$options);

}catch(PDOException $e){
	die('Erreur: '.$e->getMessage());
}

$req = $bd->query("SELECT * FROM produit WHERE refprod = $id");
$produits = $req->fetch(PDO::FETCH_ASSOC);
echo json_encode($produits);
?>