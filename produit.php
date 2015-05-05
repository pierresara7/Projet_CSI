
<?php require_once ("header.php") ?>
	<div class='container'>	
		<div class='row'>
			<div class='span6'><h3>Liste de Nos Produit</h3></div>
			<div class='span3'>
	
				<a href='ajout-produit.php' class='btn btn-default pull-right' >
					<i class='icon-plus'></i>

					Nouveau Produit
				</a>
			</div>
		</div>
		<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
			<div class="alert alert-success"><?php echo $_GET['message'] ?></div>		
		<?php endif ?>

		<?php
		$id_Client=$_SESSION['id_Client'];
    		require_once ("connexion_database.php");
			$req="select p.id_prod,nom_prod,prix,prix_reduc,p.id_offrereduc from produit as p 
			INNER JOIN avoir as a on p.id_prod=a.id_prod 
			INNER JOIN prix_produit as pr on a.id_prix=pr.id_prix  ";
			$idPanier=$_SESSION['idPanier'];
			$exe=mysql_query($req);
			$req3=mysql_query("SELECT a_reduction from client where id_Client='$id_Client' ");
	while($l=mysql_fetch_array($req3))
{
 
	$a_reduction=$l['a_reduction'];}
			echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Nom</th>
				<th align='center'>Prix</th>
				<th align='center'>Ajouter Panier</th>
				<th align='center' colspan='2'>Faire</th>
				</tr>";
				if ($exe==FALSE){
					 die(mysql_error());
				}
 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($exe)){
    			if(($a_reduction==1) and ($l['id_offrereduc']!=0)){
    				$prix2=$l['prix_reduc'];
					}
					else{     				
						$prix2=$l['prix'];
					 }
				echo"<tr>
					<td align='center'>".$l['nom_prod']."</td>
					
					<td align='center'>".$prix2."</td>
					
					"; ?>
					<td>
					<form method="POST" action="ajout_produit_panier.php">
					Quantite <input name="quantite" type="text"/> 
					<input name="id_prod" type="hidden"value=<?php echo $l['id_prod']?>/> 
					<input name="idPanier" type="hidden"value=<?php echo $idPanier?>/> 
					<input name="prix" type="hidden"value=<?php echo $prix2 ?>/> 
					<input type="submit" value="Ajouter Panier" >
					</form>
					</td>
					<?php
					echo "
					<td align='center'><a href=\"modification-produit.php?id=".$l['id_prod']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"suppression-produit.php?id=".$l['id_prod']."\" onclick=\"return(confirm('<b>Etes-vous sûr de vouloir supprimer ce produit?</b>'));\" ><img src=\"b_drop.png\"></a></td> 

				</tr>";
    		}
			echo"</table>";
		?>
	</div>
<?php require_once ("footer.php") ?> 