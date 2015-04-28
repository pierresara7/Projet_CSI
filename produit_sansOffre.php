<?php
include("connexion_database.php");
include("header.php");
$req=mysql_query("SELECT id_Prod,nom_prod FROM produit where a_reduction=0");
	if($req){
		echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Nom</th>
				<th align='center'>Offre reductionnnelle</th>
				<th align='center'>Offre promotionnelle</th>

				</tr>";
				
 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($req)){
				echo"<tr>
					<td align='center'>".$l['nom_prod']."</td>
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
<input type="submit" name="go" value="Valider" class="btn btn-danger">
					</td>
					<td>
					<form method="POST" action="beneficie_OP.php">
					<select name="liste">
<?php
$sql2='SELECT idOP,pourcentageOP from Offre_promotionnelle';
$list2 = mysql_query($sql2);
while ($data2 = mysql_fetch_array($list2))
     {echo'<option value="'.$data2['idOP'].'">'.$data2['pourcentageOP'].' %</option>';}
?>
</select>
<input type="submit" name="go" value="Valider" class="btn btn-danger">
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