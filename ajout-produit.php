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
				$req2="insert into prix_produit(prix) values('$prix')";
				$req3="SELECT MAX(id_prod) from Produit";
				$req4="SELECT MAX(id_prix) from prix_produit";

				$exe=mysql_query($req);
				$exe2=mysql_query($req2);
				$exe3=mysql_query($req3);
				$exe4=mysql_query($req4);
    			$idmax1=mysql_result($exe3,0); 
    			$idmax2=mysql_result($exe4,0); 

				$req5="insert into avoir(id_prod,id_prix) values ('$idmax1','$idmax2')";

				$exe5=mysql_query($req5);

				header("location:produit.php");
				echo $exe4;
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