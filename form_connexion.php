
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>   
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="style.css"/>
	<script type="text/javascript" >
	//fonction permettant de verifier le nombre de caractere dans le login et le mot de passe
	function verifConnexion()  {
         if(document.form_connexion.login.value =="")  {
   alert("Veuillez entrer votre nom!");
   document.form_connexion.login.focus();
   return false;
  }
  if(document.form_connexion.mdp.value =="")  {
   alert("Veuillez entrer votre mot de passe!");
   document.form_connexion.mdp.focus();
   return false;
  }
  return true;
  }
     </script> 
  </head>
	
  <body>
	  <div class="panel"id="img_connexion">
	   <form action="connexion.php" method="POST" name="form_connexion" onSubmit="return verifConnexion()">
		  <p>
		    <span class="label">Login</span>
			<input type="text" name="login"/>
			<br/>
			<span class="label">Mot de passe</span>
			<input type="password" name="mdp"/>
		  </p>
		  
		  <p>
		    <input type="image" class="img_connexion"src="image/connexion.jpg" value="submit" align="middle"/>
			
		  </p>
		</form>
	  </div>
	</body>
	</html>