 <?php
  		session_start();
  if ($_SESSION['verif_connexion']==False){ 
  		?><script> alert("utilisateur ou mot de passe incorrect")</script>;
<?php   	 $_SESSION['verif_connexion']=True;
}

  	?>