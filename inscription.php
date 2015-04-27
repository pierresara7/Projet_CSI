<?php
require_once ("header.php");
require_once ("footer.php");
require_once ("connexion_database.php");


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

$req=mysql_query("INSERT INTO Client (id_Client, nom_Client, prenom_Client, email , sexe, tel, login) VALUES('".$id_Client."', '".$nom_Client."', '".$prenom_Client."','".$email."', '".$sexe."', '".$nom_Client."', '".$login."')");
$req1=mysql_query("INSERT INTO authentificationclient (login,id_Client, mdp) VALUES('".$login."', '".$id_Client."', '".$cryptedPw."')");
$req2=mysql_query("INSERT INTO adresse (id_adresse, num_rue, nom_voie, cp , ville) VALUES('".$id_adresse."', '".$num_rue."', '".$nom_voie."','".$cp."', '".$sexe."', '".$ville."')");
$req3=mysql_query("INSERT INTO avoir1 (id_Client, id_adresse) VALUES('".$id_Client."', '".$id_adresse."')");

header ("Location: $_SERVER[HTTP_REFERER]" );	


?>