
  <?php
  //require_once ("header.php");
  require("connexion_database.php");
  $idPanier=$_GET['idPanier'];
  $req=mysql_query("SELECT nom_prod FROM produit as p INNER JOIN avoir as a on p.id_Prod=a.id_Prod INNER JOIN Prix_produit as pr on a.id_Prix=a.id_Prix
   INNER JOIN  Panier as pa on pa.idPanier=a.idPanier 
  	Where a.idPanier='$idPanier'");
  
  if ($req) {
          echo"<table class='span8'>
            <th align='center'>Date</th>
            <th align='center'>Produits</th>
            <th align='center'>Quantité</th>
            <th align='center'>Prix Unitaire</th>
            <th align='center'>Total;</th>
            </tr>";
          while($l= mysql_fetch_array($req)){
          	$table=$l['quantite_prod']*$l['Prix'];
          echo"<tr>
              <td align='center'>".$l['date_commande']."</td>
              <td align='center'>".$l['nom_prod']."</td>
              <td align='center'>".$l['quantite_prod']."</td>
              <td align='center'>".$l['Prix']."</td>
              <td align='center'>".$Total."</td>
    
            </tr>
            </table>";?>
           <a href="valider_panier.php?idPanier="<?php $idPanier ?>">Valider Votre Panier</a>

            <?php
          }
        }
         else{
          echo mysql_error();
        }
  ?>
