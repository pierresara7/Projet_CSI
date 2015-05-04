<?php
include("connexion_database.php");
include("header.php");
//$req3=mysql_query("CALL last_prix(5)") or die(mysql_error());
//$last_prix=mysql_result($req3,0) or die(mysql_error());
$req=mysql_query("SELECT p.id_prod,nom_prod,prix,a.id_prod FROM produit as p
	INNER JOIN avoir as a on p.id_prod=a.id_prod 
	INNER JOIN prix_produit as pr on a.id_prix=pr.id_prix 
	Where a_reduction=0
	
	");
	if($req){
		echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Nom</th>
				<th align='center'>Prix</th>

				<th align='center'>Offre reductionnnelle</th>
				<th align='center'>Offre promotionnelle</th>

				</tr>";
				
 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($req)){
				echo"<tr>
					<td align='center'>".$l['nom_prod']."</td>
					<td align='center'>".$l['prix']."</td>

					";?>
					<td>
					<form method="POST" action="beneficie_OR.php">
					<select name="liste">
<?php
$sql='SELECT id_OffreReduc,pourcentageOR from Offre_reductionnelle';
$list = mysql_query($sql);
while ($data = mysql_fetch_array($list))
     {echo'<option value="'.$data['id_OffreReduc'].'">'.$data['pourcentageOR'].'</option>';}
?>
</select>
<input type="submit" value="Valider" class="btn btn-danger">
</form>
					</td>
					<td>
					<form method="POST" action="beneficie_OP.php">
					<input name="id_prod" type="hidden"value=<?php echo $l['id_prod']?>> 

					<select name="liste">
<?php
$sql2='SELECT idOP,pourcentageOP from Offre_promotionnelle';
$list2 = mysql_query($sql2);
while ($data2 = mysql_fetch_array($list2))
     {echo'<option value="'.$data2['idOP'].'">'.$data2['pourcentageOP'].' %</option>';}
?>
</select>
<input type="submit" name="ok" value="ok" class="btn btn-danger">
</form>
					</td>
					<?php
					echo "

				</tr>";
    		}
			echo"</table>";
		
	}
	else
	{
					 die(mysql_error());
	}

		
?>