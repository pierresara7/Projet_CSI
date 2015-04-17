<?php
		if(isset($_POST['go'])){
			require_once ("connexion.php");
			extract($_POST);
			$req="insert into client values('','$nom','$pnom','$adr','$tel')";
			$exe=mysql_query($req);
			header("location:commande-client.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Nouveau Client</h3></div>
		</div>
		<form role="form" action="#" method="post">
		    <pre class="span8">

			Nom        <input type="text" name="nom" placeholder="Nom du Client">

			Prenom     <input type="text" name="pnom" placeholder="Prenom du Client">

			Adresse    <input type="text" name="adr" placeholder="Adresse du Client">

			Téléphone  <input type="text" name="tel" placeholder="Telephone du Client">

			           <input type="submit" name="go" value="Ajouter" class="btn btn-success">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>