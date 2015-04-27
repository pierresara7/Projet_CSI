<?php
	require_once("tools.php");
	connexion2();
// recuperation de l'login
	$login=$_POST['login'];

// recuperation de du mot de passe et cryptage
	$password=$_POST['mdp'];
	$cryptedPw = md5($password);



	//requete permettant de rechercher l'utilisateur
$req=mysql_query("SELECT COUNT(*) > 0 FROM users WHERE username='".$login."' AND password='".$cryptedPw."'");
$row = mysql_fetch_row($req);
	if($row[0]==0){
		
	header('Location: index.php?verif=0');
	
	}
	else{
		session_start();
		$_SESSION['login'] = $login;
		header ('Location: index.php' );	
		exit();
	}

	?>