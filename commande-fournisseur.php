<?php require_once 'header.php';?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Commandes de l'entreprise</h3></div>
		</div>
		<?php
			require_once 'connexion.php';
			$req1=mysql_query("SELECT c.idfour,d.idbc,nomfour,pnomfour,datecom,dateliv from fournisseur c,bon_commande d where c.idfour=d.idfour");
			echo "<table class='span8'>
			<tr>
			<th align='center'>Fournisseurs</th>
			<th align='center'>Dates Com</th>
			<th align='center'>Dates Liv</th>
			<th align='center'>Mont Com</th>
			<th align='center'>Mont Pay&eacute;</th>
			<th align='center'>Dette</th>
			<th align='center' colspan='2'>Faire</th>
			</tr>";
			while ($l=mysql_fetch_array($req1)) {
				$val = $l['idbc'];
				$req2=mysql_query("SELECT lig.idcom,SUM(montant_com) as montant_commande,SUM(montant_paye) as montant_paye from bon_commande com,ligne_bon lig where com.idcom=lig.idcom and lig.idcom=".$val);
				if ($rec=mysql_fetch_array($req2)) {
				echo"<tr>
					<td align='center'><a href=\"detail_boncom.php?id=".$l['idfour']."\">".$l['nomfour']." ".$l['pnomfour']."</td></a>
					<td align='center'>".$l['datecom']."</td>
					<td align='center'>".$l['dateliv']."</td>
					<td align='center'>".$rec['montant_commande']."</td>
					<td align='center'>".$rec['montant_paye']."</td>
					<td align='center'>".($rec['montant_commande']-$rec['montant_paye'])."</td>		
					<td align='center'><a href=\"modification-com2.php?id=".$l['idbc']."\"><img src=\"b_edit.png\"></a></td>
					<td align='center'><a href=\"suppression-com2.php?id=".$l['idbc']."\" onclick=\"return(confirm('<b>Etes-vous sûr de vouloir supprimer cette commande?</b>'));\" ><img src=\"b_drop.png\"></a></td> ";
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
	<div align="right"><a class="btn btn-success" href="commande.php">Voir les commandes des clients</a></div>
<?php require_once 'footer.php';?>