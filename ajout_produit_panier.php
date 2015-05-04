<?php
session_start();
require("connexion_database.php");
$idProd=$_POST['id_prod'];
$quantite=$_POST['quantite'];
if (isset($_SESSION['idPanier'])){
$idPanier3=$_SESSION['idPanier'];
}
$idPanier=$_POST['idPanier'];
$total=$_POST['prix']*$quantite;
$dateDuJour=date('Y-m-d');
$id_client=$_SESSION['id_Client'];

$req=mysql_query("SELECT montant_ttc,quantite_panier FROM panier where idPanier='$idPanier3' and statut_panier='En cours'") or die(mysql_error());
	$row = mysql_fetch_row($req);
	if($row[0]==0)
	{
		$req4=mysql_query("INSERT INTO panier (id_client,montant_ttc,date_commande,quantite_panier) VALUES ('$id_client','$total','$dateDuJour',1)");
	
	$req6=mysql_query("SELECT MAX(idPanier) FROM panier");
	$idPanier2=mysql_result($req6,0);
	$req5=mysql_query("INSERT INTO avoir4 (idPanier,id_prod,quantite_prod) VALUES('$idPanier3','$idProd','$quantite')");
	$_SESSION['idPanier']=$idPanier2;
		
	}
	else
	{
		$reqq=mysql_query("SELECT montant_ttc,quantite_panier FROM panier where idPanier='$idPanier3' and statut_panier='En cours'") or die(mysql_error());
		while($l=mysql_fetch_array($reqq))
{
 
	$montant_ttc=$l['montant_ttc']+$total;
	echo $montant_ttc;
	$quantite_prod=$l['quantite_panier']+1;
	}
	$req2=mysql_query("INSERT INTO avoir4 (idPanier,id_prod,quantite_prod) VALUES('$idPanier3','$idProd','$quantite')") or die(mysql_error());
	$req3=mysql_query("UPDATE panier SET montant_ttc='$montant_ttc',quantite_panier='$quantite_prod' where idPanier='$idPanier3'") or die(mysql_error());
	
	
} 


?>