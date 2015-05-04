
<?php 
include("header.php");
 ?>

<form action="inscription.php" method="POST" >
    <h2 align="center"> Inscription Client </h2>

         Login 			: <input name="login" type="text" style="height:30px" placeholder="Votre Login"/>        	    Nom : <input name="nom" type="text" style="height:30px" placeholder="Votre NOM"/><br>

	   Prenom 		: <input name="prenom" type="text" style="height:30px" placeholder="Votre Prenom"/>       	<br>
	   
	   Tel    		: <input type="text" name="tel" style="height:30px" placeholder="Votre Telephone"/> 	   EMAIL	: <input name="email" type="email" style="height:30px" placeholder="Votre MAIL"/> <br>

	   Sexe 		: <input name="sexe" type="text" style="height:30px" placeholder="Votre Sexe"/>         Mot de Passe : <input type ="password" name="mdp" onblur="verifMdp(this)"/><br>
	   	   num_rue  		: <input type="text" name="num_rue" style="height:30px" placeholder="numero de rue"/> 	   nom_voie	: <input name="nom_voie" type="text" style="height:30px" placeholder="nom de la rue"/> <br>
	   CP   		: <input type="text" name="CP" style="height:30px" placeholder="Code postal"/> 	   ville	: <input name="ville" type="text" style="height:30px" placeholder="Votre ville"/> <br>


				  <input type="image" class="img_connexion"src="image/inscription.jpg" value="Valider et Enregistrer" align="middle"> 
				  </form>
    
	<?php 
include("footer.php");
 ?>

	</html>
