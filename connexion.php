<?php
	include("connexion_database.php");
// recuperation de l'login
	$login=$_POST['login'];

// recuperation de du mot de passe et cryptage
	$password=$_POST['mdp'];
	$cryptedPw = md5($password);



	//requete permettant de rechercher l'utilisateur
$req=mysql_query("SELECT COUNT(*) > 0 FROM authentificationclient WHERE LOGIN='".$login."' AND MDP='".$cryptedPw."'");
$row = mysql_fetch_row($req);
	if($row[0]==0){
		
	header('Location: accueil.php?verif=0');
	
	}
	else{
		session_start();
		$_SESSION['LOGIN'] = $login;
		header ('Location: accueil.php' );	
		exit();
	}

	?>