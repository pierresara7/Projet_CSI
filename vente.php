<script type="text/javascript">
	function calcul () {
		with (document.forms.ligne_client){
			if (produit.value == "" || qtecom.value == "") {
				qtecom.value = "";
				montant_com.value = "";
			} else if(qtecom.value > qtevendue.value) {
				alert("La quantité commandée par le client doit etre <= à la quantité en stock");
				qtecom.value = "";
			} else{
				montant_com.value = qtecom.value*prixproduit.value;
			};
		}
	}
	function affich(champ){
		with (document.forms.ligne_client){
			expr_reg = /^\d*$/ ;
      		if ( expr_reg.test(champ.value) ) {
      			montant_com.value = qtecom.value*prixproduit.value;
      		} else {
	    	    alert ("Veuillez entrer un nombre entier !") ;
	    	    document.forms.ligne_client.elements[champ.name].value = "" ;
	    	}
		}
	}
</script>
<?php
ini_set('display_errors', 1);
try{
	$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bd = new PDO('mysql:host=127.0.0.1;dbname=bdd2','root','',$options);

}catch(PDOException $e){
	die('Erreur: '.$e->getMessage());
}

$req = $bd->query('SELECT refprod,libprd FROM produit');
$produits = $req->fetchAll(PDO::FETCH_OBJ);
?>
<?php
	if(isset($_POST['go'])){
		require ("connexion.php");
		extract($_POST);
			$req="UPDATE produit SET qtestock=(qtestock-'$qtevendue') WHERE refprod='$produit'";
		$exe=mysql_query($req);
		header("location:vente.php?message=Quantite en Stock Mis a Jour");
	}
	elseif (isset($_POST['end'])) {
		header("location:accueil.php?message=Vente enregistree avec succes");
	}
?>
<?php require_once ("header.php");?>
	<div class="container">
		<div class="row">

			<div class="span5" align="center"><h3>Achat</h3></div>

			<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
				<div class="span3 alert alert-success"><?php echo $_GET['message'] ?></div>		
			<?php endif ?>

		</div>
		<form role="form" method="post" name="ligne_client" action="#">
		    <pre class="span8">


		Produit     	       <select id="produit" name="produit" onchange="calcul()"><option></option><?php require ("connexion_database.php");
			 				   $req="select refprod,libprd from produit";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['refprod'].">".$l['libprd']."</option>";
			 				   }
			            	   ?></select>

		Quantite Stock         <input type="text" id="qteliv" name="qtevendue" style="height:30px" placeholder="Quantite en stock">

		Quantite voulue        <input type="text" name="qtecom" style="height:30px" placeholder="Quantite Commandee par le client" onchange="calcul()" onclick="calcul()">

		Prix unitaire	       <input type="text" id="prix" name="prixproduit" style="height:30px" placeholder="Prix unitaire">

		Montant                <input type="text" name="montant_com" style="height:30px" placeholder="Cliquer ici" onclick="affich(this)" onblur="calcul()">

			    <input type="submit" name="go" value="Encore" class="btn btn-success">       <input type="submit" name="end" value="Terminer" class="btn btn-success">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>