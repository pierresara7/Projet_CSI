
	<?php
		if(isset($_POST['go'])){
			require ("connexion.php");
			extract($_POST);
			$req="insert into bon_commande values('','$four','$datecom','$dateliv')";
			$exe=mysql_query($req);
			header("location:ligne_client.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Commande de Medicaments </h3></div>
		</div>
		<form role="form" action="#" method="post">
		    <pre class="span8">

		Fournisseur       <select name="four"><?php require ("connexion.php");
			 				   $req="select idfour,nomfour,pnomfour from fournisseur order by idfour desc";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['idfour'].">".$l['nomfour']." ".$l['pnomfour']."</option>";
			 				   }
			            	   ?></select>

		Date Commande     <input type="date" name="datecom" style="height:30px">

		Date Livraison    <input type="date" name="dateliv" style="height:30px">

			           <input type="submit" name="go" value="Ajouter" class="btn btn-info">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>