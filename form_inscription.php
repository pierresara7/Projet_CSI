
<?php 
session_start();
if (isset($_SESSION['login'])) {
require("form_connexion.php");
}
else{
	echo $_SESSION['login'] ;
}

 ?>

<form action="inscription.php" method="POST" onSubmit="return verifForm()">
<div id="contact">
<form method="post" action="#">
    <h2 align="center"> Inscription Client </h2>
    <pre>

         Login 			: <input name="login" type="text" style="height:30px" placeholder="Votre Login"/>        	    Nom : <input name="nom" type="text" style="height:30px" placeholder="Votre NOM"/>

	   Prenom 		: <input name="prenom" type="text" style="height:30px" placeholder="Votre Prenom"/>       	Adresse	: <input type="text" name="adressse" style="height:30px" placeholder="Votre Adresse"/>
	   
	   Tel    		: <input type="text" name="tel" style="height:30px" placeholder="Votre Telephone"/> 	   EMAIL	: <input name="email" type="email" style="height:30px" placeholder="Votre MAIL"/> 

	   Sexe 		: <input name="sexe" type="text" style="height:30px" placeholder="Votre Sexe"/>         Mot de Passe : <input type ="password" name="mdp" onblur="verifMdp(this)"/>

				  <input type="image" class="img_connexion"src="image/inscription.jpg" value="Valider et Enregistrer" align="middle"> 
    </pre>
	</body>
	</html>