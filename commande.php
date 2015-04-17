<?php require_once 'header.php';?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Commandes Clients</h3></div>
		</div>
		<?php
			require_once 'connexion.php';
			$req1=mysql_query("SELECT c.idcli,d.idcom,nomcli,pnomcli,datecom,dateliv from client c,commande_client d where c.idcli=d.idcli");
			echo "<table class='span8'>
			<tr>
			<th align='center'>Clients</th>
			<th align='center'>Dates Com</th>
			<th align='center'>Dates Liv</th>
			<th align='center'>Mont Com</th>
			<th align='center'>Mont Pay&eacute;</th>
			<th align='center'>Dette</th>
			<th align='center' colspan='2'>Faire</th>
			</tr>";
			while ($l=mysql_fetch_array($req1)) {
				$val = $l['idcom'];
				$req2=mysql_query("SELECT lig.idcom,SUM(montant_com) as montant_commande,SUM(montant_paye) as montant_paye from commande_client com,ligne_client lig where com.idcom=lig.idcom and lig.idcom=".$val);
				if ($rec=mysql_fetch_array($req2)) {
				echo"<tr>
					<td align='center'><a href=\"detail_commande.php?id=".$l['idcli']."\">".$l['nomcli']." ".$l['pnomcli']."</td></a>
					<td align='center'>".$l['datecom']."</td>
					<td align='center'>".$l['dateliv']."</td>
					<td align='center'>".$rec['montant_commande']."</td>
					<td align='center'>".$rec['montant_paye']."</td>
					<td align='center'>".($rec['montant_commande']-$rec['montant_paye'])."</td>		
					<td align='center'><a href=\"modification-com2.php?id=".$l['idcom']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"suppression-com1.php?id=".$l['idcom']."\" onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer ce client?'));\" ><img src=\"b_drop.png\"></a></td> ";
				}
				else{
					echo mysql_error();
				}
			}
			echo"</table>";
		?>
	</div>
	<br/>
	<hr class="span9" class="danger"/>
	<div align="right"><a class="btn btn-info" href="commande-fournisseur.php">Voir les commandes de l'entreprise</a></div>
<?php require_once 'footer.php';?>