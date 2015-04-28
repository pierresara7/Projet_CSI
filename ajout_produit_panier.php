<?php
$idProd=$_POST['id_prod'];
$quantite=$_POST['quantite'];
$idPanier=$_POST['idPanier'];
$total=$_POST['prix']*$quantite;
$dateDuJour=date('Y-m-d');
$id_client=$_SESSION['id_client'];
$req=mysql_query("SELECT montant_ttc FROM panier where idPanier='$idPanier' and statut_panier='En cours'");
$montant_ttc=mysql_result($req,0)+total;
	if($req)
	{
	$req2=mysql_query("INSERT INTO avoir4 (idPanier,id_prod,quantite_prod) VALUES('$idPanier','id_prod','$quantite')");
	$req3=mysql_query("UPDATE panier SET montant_ttc='$montant_ttc'");
	}
	else
	{
	$req4=mysql_query("INSERT INTO panier (id_client,montant_ttc,statut_panier,date_commande) VALUES ('$id_client','total','en cours','$dateDuJour')");
	$req5=mysql_query("INSERT INTO avoir4 (idPanier,id_prod,quantite_prod) VALUES('$idPanier','$id_prod','$quantite')");
<<<<<<< HEAD

} 

=======
	}
>>>>>>> origin/master
?>