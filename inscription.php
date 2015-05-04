<?php
require_once ("connexion_database.php");
	$login=$_POST['login'];
		$prenom_client=$_POST['prenom'];
	$tel=$_POST['tel'];
	$sexe=$_POST['sexe'];
	$nom_client=$_POST['nom'];
	$nom_voie=$_POST['nom_voie'];
	$login=$_POST['login'];
		$num_rue=$_POST['num_rue'];
	$CP=$_POST['CP'];
	$ville=$_POST['ville'];


	$mdp=$_POST['mdp'];
	$cryptedPw = md5($mdp);
	$email=$_POST['email'];
$req=mysql_query("INSERT INTO client (nom_Client, prenom_Client, email , sexe, login,tel)
 VALUES('$nom_client', '$prenom_client','$email', '$sexe', '$login','$tel')");
$req4=mysql_query("SELECT MAX(id_client) FROM client");
$id_client=mysql_result($req4,0);
$req1=mysql_query("INSERT INTO authentificationclient (login,id_client, mdp) 
	VALUES('$login', '$id_client', '$cryptedPw')");
$req2=mysql_query("INSERT INTO adresse (nom_voie,num_rue,CP,ville) VALUES('$nom_voie','$num_rue','$CP','$ville')");
//$req5=mysql_query("SELECT MAX(id_adresse) FROM adresse");
//$id_adresse=mysql_result($req5,0);
//$req3=mysql_query("INSERT INTO avoir1 (id_Client, id_adresse) VALUES('$id_Client', '$id_adresse')");

header ("Location: $_SERVER[HTTP_REFERER]" );	


?>