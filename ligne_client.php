<script type="text/javascript">
	function calcul () {
		with (document.forms.ligne_client){
			if (produit.value == "" || qtecom.value == "") {
				qtecom.value = "";
				montant_com.value = "";
			} else{
				montant_com.value = qtecom.value*prixproduit.value;
			};
			if (qtecom.value > qtevendue.value) {
				alert("La quqntité commandée par le client doit etre <= à la quantité en stock");
				qtecom.value = "";
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
	$bd = new PDO('mysql:host=127.0.0.1;dbname=pharmacie','root','',$options);

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
			$requete = mysql_query("SELECT idlign_com,idcom,refprod from ligne_client where idcom='$commande' AND refprod= '$produit'");
			$test = mysql_num_rows($requete);
			if($test == 0){
				$req="INSERT into ligne_client values('','$commande','$produit','$qtecom','$qteliv','$prixcom','$montant_com','$montant_pay')";
				$exe=mysql_query($req);
			}elseif ($rec=mysql_fetch_array($requete)) {
				$req="UPDATE ligne_client SET qtecom=(qtecom+'$qtecom'),qteliv=(qteliv+'$qteliv'),montant_com=(montant_com+'$montant_com'),montant_paye=(montant_paye+'$montant_pay') WHERE idlign_com='$rec[0]'";
				$exe=mysql_query($req);
				if(!empty($exe)){
					echo mysql_error();
				}
			}
			$req2="UPDATE produit SET qtestock=(qtestock-'$qteliv') WHERE refprod='$produit'";
			$exe2=mysql_query($req2);
			header("location:ligne_client.php?message=Quantite en Stock Mis a Jour");
		}
		elseif (isset($_POST['end'])) {
			header("location:Commande.php");
		}
	?>
<?php require_once ("header.php");?>

	<div class="container">
		<div class="row">

			<div class="span5" align="center"><h3>Produit Command&eacute;s</h3></div>

			<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
				<div class="span3 alert alert-success"><?php echo $_GET['message'] ?></div>		
			<?php endif ?>

		</div>
		<form role="form" action="#" method="post" name="ligne_client">
		    <pre class="span8">

		Commande de            <select name="commande"><?php require ("connexion.php");
			 				   $req="select idcom,a.idcli,nomcli,pnomcli from client a,commande_client b where a.idcli=b.idcli order by idcom desc";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['idcom'].">".$l['nomcli']." ".$l['pnomcli']."</option>";
			 				   }
			            	   ?></select>

		Medicament     	       <select id="produit" name="produit" onchange="calcul()"><option></option><?php require ("connexion.php");
			 				   $req="select refprod,libprd from produit";
			 				   $exe=mysql_query($req);
			 				   while($l=mysql_fetch_array($exe)){
			 				   		echo "<option value=".$l['refprod'].">".$l['libprd']."</option>";
			 				   }
			            	   ?></select>

		Quantite Stock         <input type="text" id="qteliv" name="qtevendue" style="height:30px" placeholder="Quantite en stock">

		Quantite voulue        <input type="text" name="qtecom" style="height:30px" placeholder="Quantite Commandee par le client" onchange="calcul()">

		Prix unitaire	       <input type="text" id="prix" name="prixproduit" style="height:30px" placeholder="Prix unitaire">

		Montant Commande       <input type="text" name="montant_com" style="height:30px" placeholder="Cliquer ici" onclick="affich(this)" onblur="calcul()">

		Montant Payé           <input type="text" name="montant_pay" style="height:30px" placeholder="Montant pay&eacute; par le client">

			    <input type="submit" name="go" value="Ajouter" class="btn btn-success">       <input type="submit" name="end" value="Terminer" class="btn btn-success">
		    </pre>
		</form>
	</div>

<?php require_once ("footer.php");?>