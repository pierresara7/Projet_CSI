<?php
include("connexion_database.php");
$req="select * from categorieproduit";
$exe=mysql_query($req);
echo"<table border='2'>
 <tr class='tr1'>
 <td>Identifiant Categorie</td>
  <td>Intitule Categorie </td>
  </tr>";
  while($l=mysql_fetch_array($exe))
  {
  echo"<tr class='tr2'>
  <td>".$l[0]."</td>
   <td><a href=\"afficher_produit.php?id=".$l[0]."\">".$l[1]."</a></td>
	 </tr>";
	 
  }
  echo"</table>";
  ?>
 