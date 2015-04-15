
	<?php
		require ("connexion.php");
		if(isset($_POST['go'])){
			extract($_POST);
			$req="insert into commande_client values('','$client','$datecom','$dateliv')";
			$exe=mysql_query($req);
			header("location:ligne_client.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Commande Client</h3></div>
		</div>
		<form role="form" action="#" method="post">
		    <pre class="span8">

		Client          <select name="client"><?php require ("connexion.php");
			 				   $req="select idcli,nomcli,pnomcli from client order by idcli desc";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['idcli'].">".$l['nomcli']." ".$l['pnomcli']."</option>";
			 				   }
			            	   ?></select>

		Date Commande   <input type="date" name="datecom" style="height:30px">

		Date Livraison  <input type="date" name="dateliv" style="height:30px">

		          <input type="submit" name="go" value="Ajouter" class="btn btn-success">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>