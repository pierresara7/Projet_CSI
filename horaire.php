<?php
include("connexion_database.php");
session_start();

$horaire=$_POST['myChoice'];
$date=$_POST['date'];
$dateHoraire=$date ." ".$horaire;
$idPanier=$_SESSION['idPanier'];
$req=mysql_query("SELECT idhorairer,nbre_retrait FROM horaireretrait where horaire_retrait='$dateHoraire'") or die(mysql_error());
$row = mysql_fetch_row($req);
	if($row[0]==0){
		 $req2=mysql_query("INSERT INTO horaireretrait (nbre_retrait,horaire_retrait) values (1,'$dateHoraire') ") or die(mysql_error());
		 $req6=mysql_query("SELECT MAX(idhorairer) FROM horaireretrait") or die(mysql_error());
		$idH=mysql_result($req6,0);
		 $req3=mysql_query("INSERT INTO est_retirer values('$idH','$idPanier') ") or die(mysql_error());

	}
	else{
		$req5=mysql_query("SELECT idhorairer,nbre_retrait FROM horaireretrait where horaire_retrait='$dateHoraire'") or die(mysql_error());

	    		while($l= mysql_fetch_array($req5)){
    			$nbr=$l['nbre_retrait'];
    			$id=$l['idhorairer'];
    		}
    if ($nbr<10){
    	$req4=mysql_query("INSERT INTO est_retirer values('$id','$idPanier') ") or die(mysql_error());
    } else
    {
    	echo "le nombre maximun de retrait durant cette horaire est atteint";
    }
$_SESSION['idPanier']=0;
}
?>