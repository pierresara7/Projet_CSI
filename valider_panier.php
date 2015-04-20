<?php
include("connexion_database.php");
	$idpanier=$_POST['idpanier'];
$req=mysql_query("SELECT (*) FROM panier Where idpanier=$idpanier");
$req=mysql_query("UPDATE panier Set statut_panier='Valide' Where idpanier=$idpanier")
?>