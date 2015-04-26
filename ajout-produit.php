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
			require_once ("connexion_database.php");
			print_r($_POST);
			extract($_POST);
				$req="insert into produit(nom_prod) values('$nom')";
				$req2="insert into prix_prouit(prix) values('$prix')";
				$req3="SELECT MAX id_prod from Produit"
				$req3="insert into avoir(id_prod,id_prix) values ()"

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

			    Produit  <input type="text" name="nom" style="height:30px" placeholder="Nom du Produit">

<select name="liste">
<?php
$sql='SELECT id_catprod,intitule_cat from categorieproduit';
$list = mysql_query($sql);
while ($data = mysql_fetch_array($list))
     {echo'<option value="'.$data['id_catprod'].'">'.$data['intitule_cat'].'</option>';}
?>
</select>
			    Prix     <input type="text" name="prix" style="height:30px" placeholder="Prix Unitaire">

			           <input type="submit" name="go" value="Ajouter" class="btn btn-danger">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>