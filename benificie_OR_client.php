<?php
include("connexion_database.php");
include("header.php");
$req="select id_client,login,nom_client,prenom_client,email from client where a_reduction=0";
			$exe=mysql_query($req) or die(mysql_error());
 
			echo"<table class='span8'>
				<tr bgcolor='#CCCCCC'>
				<th align='center'>Login</th>
				<th align='center'>Nom</th>
				<th align='center'>Prenom</th>
				<th align='center'>email</th>
				<th align='Selectionner'>Selectionner</th>

				</tr>";

 // use bgcolor ds les tr
    		//affichage des données:
    		while($l= mysql_fetch_array($exe)){
				echo"<tr>
					<td align='center'>".$l[1]."</td>
					<td align='center'>".$l[2]."</td>
					<td align='center'>".$l[3]."</td>
					<td align='center'>".$l[4]."</td>
					";?>
					<td> 
					<form action="" method="Post">
					<input name="id_client" type="hidden" value=<?php echo $l[0]; ?> >	
					<input type="submit" value="Valider" class="btn btn-danger">
					</form>
					</td>
					<?php echo "
					</tr>";
    		}
			echo"</table>";
			if(isset($_POST['id_client'])){ 
	$id_client=$_POST['id_client'];
	$idOR=$_GET['idOR'];
$req8=mysql_query("UPDATE client set a_reduction=1 Where id_client='$id_client'") or die(mysql_error());
$req5=mysql_query("INSERT INTO estproposer1 values ('$id_client','$idOR')");

}
?>