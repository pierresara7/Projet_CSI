<?php
include("connexion_database.php");
include("header.php");
$req=mysql_query("SELECT id_Prod,nom_Prod FROM produit where a_reduction=FALSE");
	if($req){
		echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Nom</th>
				<th align='center'>Offre reductionnnelle</th>
				<th align='center'>Offre promotionnelle</th>

				<th align='center' colspan='2'>Faire</th>
				</tr>";
				
 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($req)){
				echo"<tr>
					<td align='center'>".$l['nom_prod']."</td>
					";?><td>
					<select name="liste">
<?php
$sql='SELECT id_OffreReduc,pourcentageOR from Offre_reductionnelle';
$list = mysql_query($sql);
while ($data = mysql_fetch_array($list))
     {echo'<option value="'.$data['id_OffreReduc'].'">'.$data['pourcentageOR'].'</option>';}
?>
</select>
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