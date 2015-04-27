
<?php require_once ("header.php") ?>
	<div class='container'>	
		<div class='row'>
			<div class='span6'><h3>Liste des Produits</h3></div>
			<div class='span3'>
	
				<a href='ajout-produit.php' class='btn btn-default pull-right' >
					<i class='icon-plus'></i>

					Nouveau Produits
				</a>
			</div>
		</div>
		<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
			<div class="alert alert-success"><?php echo $_GET['message'] ?></div>		
		<?php endif ?>

		<?php
    		require_once ("connexion_database.php");
			$req="select p.id_prod,nom_prod,prix from produit as p INNER JOIN avoir as a on p.id_prod=a.id_prod INNER JOIN prix_produit as pr on a.id_prix=pr.id_prix  ";
			$exe=mysql_query($req);
 
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
				echo"<tr>
					<td align='center'>".$l['nom_prod']."</td>
					<td align='center'>".$l['prix']."</td>
					<td align='center'><a href=\"modification-produit.php?id=".$l['id_prod']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"modification-produit.php?id=".$l['id_prod']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"suppression-produit.php?id=".$l['id_prod']."\" onclick=\"return(confirm('<b>Etes-vous sûr de vouloir supprimer ce produit?</b>'));\" ><img src=\"b_drop.png\"></a></td> 

				</tr>";
    		}
			echo"</table>";
		?>
	</div>
<?php require_once ("footer.php") ?> 