<?php
include("connexion_database.php");
	$idpanier=$_POST['idpanier'];
$reqq=mysql_query("UPDATE panier Set statut_panier='Valide' Where idpanier=$idpanier");
$reqq2=mysql_query("SELECT montant_ttc FROM panier Where idpanier=$idpanier");
$montant_panier=mysql_result($reqq2,0);
include("generer_bilan.php");
?>