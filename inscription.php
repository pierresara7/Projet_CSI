<?php
require_once("tools.php");
connexion2();
$verif=0;
if(isset($_POST['login'])){
	$login=$_POST['login'];
$verif++;

}
if(isset($_POST['mdp'])){
	$mdp=$_POST['mdp'];
	$cryptedPw = md5($mdp);
	$verif++;

}
if(isset($_POST['email'])){
	$email=$_POST['email'];
	$verif++;

}
if(isset($_POST['nom'])){
	$nom=$_POST['nom'];
	$verif++;

}
if(isset($_POST['PRENOM_CLIENT'])){
	$PRENOM_CLIENT=$_POST['PRENOM_CLIENT'];
	$verif++;

}
if(isset($_POST['SEXE'])){
	$SEXE=$_POST['SEXE'];
	$verif++;

}
if(isset($_POST['TEL'])){
	$TEL=$_POST['TEL'];
	$verif++;

}

$req=mysql_query("INSERT INTO CLIENT (LOGIN,NOM_CLIENT,PRENOM_CLIENT,EMAIL,SEXE,TEL) 
	VALUES('".$login."', '".$nom."', '".$PRENOM_CLIENT."', '".$email."', '".$TEL."')");

$req=mysql_query("INSERT INTO authentificationclient (LOGIN,MDP) 
	VALUES('".$login."', '".$cryptedPw."')");
header ("Location: $_SERVER[HTTP_REFERER]" );	


?>