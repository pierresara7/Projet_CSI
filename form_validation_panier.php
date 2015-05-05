
  <?php
  require_once ("header.php");
  require("connexion_database.php");
  $idPanier=$_SESSION['idPanier'];
  $req=mysql_query("SELECT nom_prod,date_commande,quantite_prod,Prix,pa.idpanier,montant_ttc FROM produit as p
    INNER JOIN avoir as a on p.id_prod=a.id_prod 
    INNER JOIN Prix_produit as pr on a.id_prix=pr.id_prix
    INNER JOIN avoir4 as a4 on a4.id_prod=p.id_prod
   INNER JOIN  panier as pa on pa.idpanier=a4.idpanier 
  	Where pa.idpanier='$idPanier'");
  
  if ($req) {
          echo"<table class='span8'>
            <th align='center'>Date</th>
            <th align='center'>Produits</th>
            <th align='center'>Quantité</th>
            <th align='center'>Prix Unitaire</th>
            <th align='center'>Total</th>
            </tr>";
          while($l= mysql_fetch_array($req)){
            $montant_ttc=$l['montant_ttc'];
          	$Total=$l['quantite_prod']*$l['Prix'];
          echo"<tr>
              <td align='center'>".$l['date_commande']."</td>
              <td align='center'>".$l['nom_prod']."</td>
              <td align='center'>".$l['quantite_prod']."</td>
              <td align='center'>".$l['Prix']."</td>
              <td align='center'>".$Total."</td>
    
            </tr>
            ";}
            if(isset($montant_ttc)){
            ?>
            <tr><td> Total</td><td> <?php echo $montant_ttc;?></td></tr>
            <?php
          }
          ?>
            </table>
           <a href="valider_panier.php">Valider Votre Panier</a>

            <?php
          }
        
         else{
           die(mysql_error());
        }
  ?>
