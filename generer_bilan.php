<?php
require("connexion_database.php");
$dateDuJour=date('Y-m-d');
$idPanier=5;$montant_panier=2000;
$req=mysql_query("SELECT * from bilan as b INNER JOIN journaliere as m on b.id_bilan=m.id_bilan where b.date_deb_bilan='$dateDuJour'");
if ($req==FALSE){
					 die(mysql_error());
				}
$row = mysql_fetch_row($req);
	if($row[0]==0){
		$req3=mysql_query("INSERT INTO bilan(montant_total,date_deb_bilan,date_fin_bilan,quantite_panier) VALUES ('$montant_panier','$dateDuJour','$dateDuJour',1)");
		$req4=mysql_query("SELECT MAX(id_bilan) FROM bilan");
		$last_id_bilan=mysql_result($req4,0); 
		$req5=mysql_query("INSERT INTO journaliere (id_bilan) VALUES ('$last_id_bilan')");
		$req6=mysql_query("INSERT INTO historiser(idPanier,id_bilan) VALUES ('$idPanier','$last_id_bilan')");		


	}
	else
	{$req6=mysql_query("SELECT MAX(j.id_bilan) FROM bilan as b INNER JOIN journaliere as j on b.id_bilan=j.id_bilan");
		$last_id_bilan=mysql_result($req6,0);
		$req7=mysql_query("SELECT quantite_panier FROM bilan as b INNER JOIN journaliere as j on b.id_bilan=j.id_bilan where b.id_bilan='$last_id_bilan'");
		$quantite=mysql_result($req7,0)+1;
		$req8=mysql_query("SELECT montant_total FROM bilan as b INNER JOIN journaliere as j on b.id_bilan=j.id_bilan where b.id_bilan='$last_id_bilan'");
		$montant=mysql_result($req8,0)+$montant_panier;
		$req9=mysql_query("UPDATE bilan SET quantite_panier=$quantite,montant_total=$montant where id_bilan='$last_id_bilan'");
		$req10=mysql_query("INSERT INTO historiser(idPanier,id_bilan) VALUES ('$idPanier','$last_id_bilan')	");
	}
	//generation ou mise à jour du bilan hebdomadaire
$req21=mysql_query("SELECT * from bilan as b INNER JOIN hebdomadaire as m on b.id_bilan=m.id_bilan where (b.DATE_DEB_BILAN<='$dateDuJour') and (b.DATE_FIN_BILAN>='$dateDuJour')");
if ($req21==FALSE){
					 die(mysql_error());
				}
$row = mysql_fetch_row($req21);
	if($row[0]==0){

		// recherche du 1er et du dernier jour de la semaine en fonction de la date du jour
$t_auj = strtotime($dateDuJour);
$p_auj = date('N', $t_auj);
if($p_auj == 1){
  $deb = $t_auj;
  $fin = strtotime($dateDuJour.' + 6 day');
}
else if($p_auj == 7){
  $deb = strtotime($dateDuJour.' - 6 day');
  $fin = $t_auj;
}
else{
  $deb = strtotime($dateDuJour.' - '.(6-(7-$p_auj)).' day');
  $fin = strtotime($dateDuJour.' + '.(7-$p_auj).' day');
}

$dateDebut=strftime('%Y-%m-%d', $deb).'<br />';
$dateFin=strftime('%Y-%m-%d', $fin).'<br />';

		// Génération d'une nouvelle bilan
		$req23=mysql_query("INSERT INTO bilan(montant_total,date_deb_bilan,date_fin_bilan,quantite_panier) VALUES ('$montant_panier','$dateDebut','$dateFin',1)");
		$req24=mysql_query("SELECT MAX(id_bilan) FROM bilan");
		$last_id_bilan=mysql_result($req24,0); 
		$req25=mysql_query("INSERT INTO hebdomadaire (id_bilan) VALUES ('$last_id_bilan')");
		$req26=mysql_query("INSERT INTO historiser(idPanier,id_bilan) VALUES ('$idPanier','$last_id_bilan')");		


	}
	else // Mise à jour du bilan hebdo
	{$req26=mysql_query("SELECT MAX(b.id_bilan) FROM bilan as b INNER JOIN hebdomadaire as h on b.id_bilan=h.id_bilan");
		$last_id_bilan=mysql_result($req26,0);
		$req27=mysql_query("SELECT quantite_panier FROM bilan as b INNER JOIN hebdomadaire as j on b.id_bilan=j.id_bilan where b.id_bilan='$last_id_bilan'");
		$quantiteH=mysql_result($req27,0)+1;
		$req28=mysql_query("SELECT montant_total FROM bilan as b INNER JOIN hebdomadaire as j on b.id_bilan=j.id_bilan where b.id_bilan='$last_id_bilan'");
		$montantH=mysql_result($req28,0)+$montant_panier;
		$req29=mysql_query("UPDATE bilan SET quantite_panier=$quantiteH,montant_total=$montantH where id_bilan='$last_id_bilan'");
		$req20=mysql_query("INSERT INTO historiser(idPanier,id_bilan) VALUES ('$idPanier','$last_id_bilan')	");
	}
	//generation ou mise à jour du bilan mensuelle
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