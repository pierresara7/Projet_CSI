<?php
require_once ("header.php");
require_once ("connexion_database.php");


	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$cryptedPw = md5($mdp);
	$email=$_POST['email'];



$req=mysql_query("INSERT INTO Client (nom_Client, prenom_Client, email , sexe, tel, login)
 VALUES('$nom_Client', '$prenom_Client','$email', '$sexe', '$nom_Client', '$login')");
$req4=mysql_query("SELECT MAX(id_Client) FROM Client");
$id_Client=mysql_result($req4,0);
$req1=mysql_query("INSERT INTO authentificationclient (login,id_Client, mdp) 
	VALUES('$login', '$id_Client', '$cryptedPw')");
$req2=mysql_query("INSERT INTO adresse (num_rue, nom_voie, cp , ville) 
	VALUES('$id_adresse', '$num_rue', '$nom_voie','$cp', '$sexe', '$ville')");
$req5=mysql_query("SELECT MAX(id_Client) FROM Client");
$id_adresse=mysql_result($req5,0);
$req3=mysql_query("INSERT INTO avoir1 (id_Client, id_adresse) VALUES('$id_Client', '$id_adresse')");

header ("Location: $_SERVER[HTTP_REFERER]" );	
require_once ("footer.php");


?>