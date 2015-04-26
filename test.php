<?php
require("connexion_database.php");
$dateDuJour=date('Y-m-d');
$idPanier=5;$montant_panier=2000;
$req31=mysql_query("SELECT * from bilan as b INNER JOIN mensuelle as m on b.id_bilan=m.id_bilan where b.date_deb_bilan<='$dateDuJour' and b.DATE_FIN_BILAN>='$dateDuJour'");
if ($req31==FALSE){
					 die(mysql_error());
				}
$row = mysql_fetch_row($req31);
	if($row[0]==0){

	$dateDebut2=date('Y-m').'-01';
	$dateFin2=date('Y-m').'-30';
	echo $dateFin2;

		// Génération d'une nouvelle bilan mensuelle
		$req33=mysql_query("INSERT INTO bilan(montant_total,date_deb_bilan,DATE_FIN_BILAN,quantite_panier) VALUES ('$montant_panier','$dateDebut2','$dateFin2',1)");
		$req34=mysql_query("SELECT MAX(id_bilan) FROM bilan");
		$last_id_bilan=mysql_result($req34,0); 
		$req35=mysql_query("INSERT INTO mensuelle (id_bilan) VALUES ('$last_id_bilan')");
		$req336=mysql_query("INSERT INTO historiser(idPanier,id_bilan) VALUES ('$idPanier','$last_id_bilan')");		


	}
	else // Mise à jour du bilan
	{	echo "fsdfs";

		$req36=mysql_query("SELECT MAX(b.id_bilan) FROM bilan as b INNER JOIN mensuelle as j on b.id_bilan=j.id_bilan");
		$last_id_bilan=mysql_result($req36,0);
		$req37=mysql_query("SELECT quantite_panier FROM bilan as b INNER JOIN mensuelle as j on b.id_bilan=j.id_bilan where b.id_bilan='$last_id_bilan'");
		$quantiteM=mysql_result($req37,0)+1;
		$req38=mysql_query("SELECT montant_total FROM bilan as b INNER JOIN mensuelle as m on b.id_bilan=m.id_bilan where b.id_bilan='$last_id_bilan'");
		$montantM=mysql_result($req38,0)+$montant_panier;
		$req39=mysql_query("UPDATE bilan SET quantite_panier=$quantiteM,montant_total=$montantM where id_bilan='$last_id_bilan'");
		$req30=mysql_query("INSERT INTO historiser(idPanier,id_bilan) VALUES ('$idPanier','$last_id_bilan')	");
	}


?>