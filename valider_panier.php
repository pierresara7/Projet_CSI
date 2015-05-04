<?php
include("connexion_database.php");
session_start();
	$idpanier=$_SESSION['idPanier'];
$reqq=mysql_query("UPDATE panier Set statut_panier='Valide' Where idpanier=$idpanier") or die(mysql_error());
$reqq2=mysql_query("SELECT montant_ttc FROM panier Where idpanier=$idpanier") or die(mysql_error());
$montant_panier=mysql_result($reqq2,0);
include("generer_bilan.php");
header ('Location: afficherHorraire2.php' );	


?>