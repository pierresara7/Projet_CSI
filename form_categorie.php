<?php 
include("header.php");
 ?>

<form action="form_categorie.php" method="POST" >
    <h2 align="center"> Categorie Produit </h2>      	   
					Intitule Categorie : <input name="intitule_cat" type="text" style="height:30px" placeholder="Categorie Produit"/><br>
								<input type="submit" name="cat" value="Valider"> 
				  </form>
<?php
if(isset($_POST['cat']))
{
 include("connexion_database.php");
 extract($_POST);
 $q="insert into categorieproduit(intitule_cat) values('$intitule_cat')";
 $x=mysql_query($q);
 if($x)
 echo "Insertion reussie!!!";
 else
 echo "Erreur!!!";

}
?>
    
	<?php 
include("footer.php");
 ?>
