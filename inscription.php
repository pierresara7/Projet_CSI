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

$req=mysql_query("INSERT INTO users (username, email, password) VALUES('".$login."', '".$email."', '".$cryptedPw."')");
header ("Location: $_SERVER[HTTP_REFERER]" );	


?>