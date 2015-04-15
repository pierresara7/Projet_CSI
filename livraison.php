
	<?php
		if(isset($_POST['go'])){
			require ("connexion.php");
			extract($_POST);
			$req2="UPDATE produit SET qtestock=(qtestock+'$qteliv'),prix='$prixliv' WHERE refprod='$produit'";
			$exe2=mysql_query($req2);
			header("location:livraison.php?message=Quantite en Stock Mis a Jour");
		}
		elseif (isset($_POST['end'])) {
			header("location:produit.php");
		}
		elseif (isset($_POST['nouvo'])) {
			header("location:ajout-produit.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">
			<div class="span5" align="center"><h3>Enr&eacute;gistrement de Produits</h3></div>
			<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
				<div class="span3 alert alert-success"><?php echo $_GET['message'] ?></div>		
			<?php endif ?>
		</div>
		<form role="form" action="#" method="post">
		    <pre class="span8">

			 Produit           <select name="produit"><option></option><?php require ("connexion.php");
			 				   $req="select refprod,libprd from produit";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['refprod'].">".$l['libprd']."</option>";
			 				   }
			            	   ?></select>

			 Quantite          <input type="text" name="qteliv" style="height:30px">

			 Prix Livraison    <input type="text" name="prixliv" style="height:30px">

		<input type="submit" name="go" value="Ajouter" class="btn btn-info">   <input type="submit" name="nouvo" value="Nouveau" class="btn btn-info">  <input type="submit" name="end" value="Terminer" class="btn btn-info">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>