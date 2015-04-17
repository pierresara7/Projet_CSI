
<?php require_once ("header.php") ?>
	<div class='container'>	
		<div class='row'>
			<div class='span6' align='center'><h3>Liste de Nos Clients</h3></div>
			<div class='span3'>
				<a href='ajout-client.php' class='btn btn-default pull-right'>
					<i class='icon-plus'></i>
					Nouveau Client
				</a>
			</div>
		</div>
			<?php if($_GET && $_GET['message']):
			 //test si la variable GET est définie ?>
					<div class="span9 alert alert-success"><?php echo $_GET['message'] ?></div>		
			<?php endif ?>

		<?php
    		require_once ("connexion.php");
			$req="select * from client";
			$exe=mysql_query($req);
 
			echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Nom</th>
				<th align='center'>Prenom</th>
				<th align='center'>Adresse</th>
				<th align='center'>Téléphone</th>
				<th align='center' colspan='2'>Faire</th>
				</tr>";
 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($exe)){
				echo"<tr>
					<td align='center'>".$l[1]."</td>
					<td align='center'>".$l[2]."</td>
					<td align='center'>".$l[3]."</td>
					<td align='center'>".$l[4]."</td>
					<td align='center'><a href=\"modification-client.php?id=".$l['idcli']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"suppression-client.php?id=".$l['idcli']."\" onclick=\"return(confirm('<b>Etes-vous sûr de vouloir supprimer ce client?</b>'));\" ><img src=\"b_drop.png\"></a></td> 

				</tr>";
    		}
			echo"</table>";
		?>
	</div>
<?php require_once ("footer.php") ?> 