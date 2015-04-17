<script type="text/javascript">
	function message () {
		alert("Ce produit existe deja");
	}

			//$test=mysql_query("SELECT COUNT(libprd) from produit where libprd = '$design'");
			//if ($test) {
			//}
			//else{
</script>
	<?php
		if(isset($_POST['go'])){
			require_once ("connexion.php");
			print_r($_POST);
			extract($_POST);
				$req="insert into produit values('','$design','$qtestock','$prix')";
				$exe=mysql_query($req);
				header("location:produit.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h1>Nouveau Produit</h1></div>
		</div>
		<form role="form" action="#" method="post">
		    <pre class="span8">

			    Produit  <input type="text" name="design" style="height:30px" placeholder="Nom du Produit">

			    Nombre   <input type="text" name="qtestock" style="height:30px" placeholder="Quantitee">

			    Prix     <input type="text" name="prix" style="height:30px" placeholder="Prix Unitaire">

			           <input type="submit" name="go" value="Ajouter" class="btn btn-danger">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>