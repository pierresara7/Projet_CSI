<?php
include("connexion_database.php");
	$idpanier=$_POST['idpanier'];
	$dateDuJour=
$reqq=mysql_query("UPDATE panier Set statut_panier='Valide' Where idpanier=$idpanier");
$reqq2=mysql_query("SELECT montant_ttc FROM panier Where idpanier=$idpanier");

?>