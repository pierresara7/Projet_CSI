<?php
include("connexion_database.php");
$idprod=$_POST['id_prod'];
$idOR=$_POST['liste'];
	
$req2=mysql_query("SELECT pourcentageOR from offre_reductionnelle where id_OffreReduc='$idOR'") or die(mysql_error());
$pourcentage=mysql_result($req2, 0);
$req3=mysql_query("select prix,p.id_prix from prix_produit as p INNER JOIN avoir as a on p.id_prix=a.id_prix INNER JOIN produit as pr on a.id_prod=pr.id_prod
where pr.id_prod='$idprod'") or die(mysql_error());
		while($l=mysql_fetch_array($req3)){
			$id=$l['id_prix'];
			$prix=$l['prix'];
		}
$nouveau=$prix-(($prix*$pourcentage)/100);
$req4=mysql_query("UPDATE prix_produit set prix_reduc='$nouveau' where id_prix='$id';") or die(mysql_error());
$req8=mysql_query("UPDATE produit set a_reduction=1,id_OffreReduc='$idOR' Where id_prod='$idprod'") or die(mysql_error());
	header ('Location: benificie_OR_client.php?idOR='.$idOR );	




?>