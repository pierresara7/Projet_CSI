<?php
$idCat=$_GET['id'];
$req = "select p.id_prod,nom_prod,prix 
from produit as 
p INNER JOIN avoir as 
a on p.id_prod=a.id_prod 
INNER JOIN prix_produit as 
pr on a.id_prix=pr.id_prix where id_catprod = '$idCat'";
$exe=mysql_query($req);
?>