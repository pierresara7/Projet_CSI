
	<?php
		if(isset($_POST['go'])){
			require ("connexion.php");
			extract($_POST);
			$req="INSERT into ligne_bon values('','$bon','$produit','$qtecom','$qteliv','$prixcom','$montant')";
			$exe=mysql_query($req);
			header("location:ligne_bon.php?");
		}
		elseif (isset($_POST['end'])) {
			header("location:Commande.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Produits Commandes</h3></div>
		</div>
		<form role="form" action="#" method="post">
		    <pre class="span8">

		Fournisseur            <select name="bon"><?php require ("connexion.php");
			 				   $req="select idcom,a.idfour,nomfour,pnomfour from fournisseur a,bon_commande b where a.idfour=b.idfour order by idfour desc";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['idfour'].">".$l['nomfour']." ".$l['pnomfour']."</option>";
			 				   }
			            	   ?></select>

		Produit     	       <select name="produit"><option></option><?php require ("connexion.php");
			 				   $req="select refprod,libprd from produit";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['refprod'].">".$l['libprd']."</option>";
			 				   }
			            	   ?></select>

		Quantite Commandee     <input type="text" name="qtecom" style="height:30px">

		Quantite Livree        <input type="text" name="qteliv" style="height:30px">

		Prix unitaire	       <input type="text" name="prixcom" style="height:30px">

		Montant Commande       <input type="text" name="montant" style="height:30px" value="<?php extract($_POST);echo "($qteliv*$prixcom)";?>">

			    <input type="submit" name="go" value="Ajouter" class="btn btn-info">       <input type="submit" name="end" value="Terminer" class="btn btn-info">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>