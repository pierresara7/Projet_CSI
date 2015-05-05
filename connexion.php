<?php
require_once ("connexion_database.php");
// recuperation de l'login
	$login=$_POST['login'];

// recuperation de du mot de passe et cryptage
	$password=$_POST['mdp'];
	$cryptedPw = md5($password);
	//requete permettant de rechercher l'utilisateur
$req=mysql_query("SELECT COUNT(*) > 0 FROM authentificationclient WHERE login='$login' AND mdp='$cryptedPw'") or die(mysql_error());
$row = mysql_fetch_row($req);
	if($row[0]==0){
		$req10=mysql_query("SELECT COUNT(*) > 0 FROM administrateur WHERE pseudo_admin='$login' AND mdp_admin='$password'") or die(mysql_error());
		$row2 = mysql_fetch_row($req10);
		if($row2[0]==0){
			echo "echoué";
				header('Location: index.php');

		}
		else {
					session_start();

					$_SESSION['login'] = $login;
					$req12=mysql_query("SELECT id_admin from administrateur where pseudo_admin='$login'") or die(mysql_error());
					$_SESSION['id_Client']=mysql_result($req12,0);
					$_SESSION['idPanier']=0;
								echo "reussi";

		}
					
	header('Location: index.php');
	
	}
	else{
		session_start();
		$_SESSION['login'] = $login;
		$req2=mysql_query("SELECT id_client from client where login='$login'");
		$_SESSION['id_Client']=mysql_result($req2,0);
		$id=$_SESSION['id_Client'];
		$req3=mysql_query("SELECT idpanier FROM panier where id_client='$id' and statut_panier='En cours'") or die(mysql_error());
			$row = mysql_fetch_row($req3);
	if($row[0]==0){
		$_SESSION['idPanier']=0;
	}
	else{
				$_SESSION['idPanier']=mysql_result($req3,0);
}
		header ('Location: index.php' );	
		exit();
	}

	?>