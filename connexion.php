<?php
require_once ("header.php");

require_once ("footer.php");
require_once ("connexion_database.php");

	//requete permettant de rechercher l'utilisateur
$req=mysql_query("SELECT COUNT(*) > 0 FROM AuthentificationClient WHERE login='".$login."' AND mdp='".$cryptedPw."'");
$row = mysql_fetch_row($req);
	if($row[0]==0){
		
	header('Location: index.php?verif=0');
	
	}
	else{
		session_start();
		$_SESSION['login'] = $login;
		$req2=mysql_query("SELECT id_Client from Client where login='".$login."'");
		$_SESSION['id_Client']=mysql_result($req2,0);
		header ('Location: index.php' );	
		exit();
	}

	?>