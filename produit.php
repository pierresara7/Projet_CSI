
<?php require_once ("header.php") ?>
	<div class='container'>	
		<div class='row'>
			<div class='span6'><h3>Liste de Nos Médicaments</h3></div>
			<div class='span3'>
	
				<a href='ajout-produit.php' class='btn btn-default pull-right' >
					<i class='icon-plus'></i>

					Nouveau Medicament
				</a>
			</div>
		</div>
		<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
			<div class="alert alert-success"><?php echo $_GET['message'] ?></div>		
		<?php endif ?>

		<?php
    		require_once ("connexion_database.php");
			$req="select * from produit as p INNER JOIN avoir as a on p.id_prod=a.id_prod INNER JOIN prix as pr on a.id_prix=pr.id_prix  ";
			$exe=mysql_query($req);
 
			echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Nom</th>
				<th align='center'>Nombre</th>
				<th align='center'>Prix Unitaire</th>
				<th align='center' colspan='2'>Faire</th>
				</tr>";
 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($exe)){
				echo"<tr>
					<td align='center'>".$l[1]."</td>
					<td align='center'>".$l[2]."</td>
					<td align='center'>".$l[3]."</td>
					<td align='center'><a href=\"modification-produit.php?id=".$l['refprod']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"suppression-produit.php?id=".$l['refprod']."\" onclick=\"return(confirm('<b>Etes-vous sûr de vouloir supprimer ce produit?</b>'));\" ><img src=\"b_drop.png\"></a></td> 

				</tr>";
    		}
			echo"</table>";
		?>
	</div>
<?php require_once ("footer.php") ?> 