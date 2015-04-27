
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Formulaire</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="style.css"/>
	 	<script type="text/javascript" src="form_inscription.js">

	 	</script>

  </head>
	
  <body>
  			  <div class="panel2">

<?php 
session_start();
// inclure la page html de connexion
if (isset($_SESSION['login'])) {
require("form_connexion.html");
}
else{
	echo $_SESSION['login'] ;
}

 ?>

<form action="inscription.php" method="POST" onSubmit="return verifForm()">
			<span class="label">Login</span>
			<input type="text" name="login" size="20" onblur="verifLogin(this)"/>
			<br/>
			<span class="label">Mot de passe</span>
			<input type="password" name="mdp" onblur="verifMdp(this)"/>
			<br/>
			<span class="label">Confirmation</span>
			<input type="password" name="mdp2" onblur="confirmationMdp(mdp,this)"/>
			<br/>
			<span class="label">Adresse email</span>
			<input type="text" name="email" onblur="verifMail(this)"/>
		  <br>
		  
		    <input type="image" class="img_connexion"src="image/inscription.jpg" value="submit" align="middle"/>
		  </div>

			
		</form>

	</body>
	</html>