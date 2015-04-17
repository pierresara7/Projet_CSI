
<?php require_once ("header.php") ?>
  <div class='container'> 
    <div class='row'>
      <div class='span6' align='center'><h3></h3></div>
      <div class='span3'>
        <a href='commande-fournisseur.php' class='btn btn-default pull-right'>
          <i class='icon-plus'></i>
          Retourner
        </a>
      </div>
    </div>
    <?php
        require_once ("connexion.php");
        $req=mysql_query("SELECT datecom,libprd,qteliv,prixcom,montant_paye from ligne_bon c,bon_commande d,produit p where c.idbc=d.idbc and c.refprod=p.refprod");
        if ($req) {
          echo"<table class='span8'>
            <th align='center'>Dates</th>
            <th align='center'>Produits</th>
            <th align='center'>Quantit&eacute;</th>
            <th align='center'>Prix</th>
            <th align='center'>Montant Pay&eacute;</th>
            </tr>";
          while($l= mysql_fetch_array($req)){
          echo"<tr>
              <td align='center'>".$l['datecom']."</td>
              <td align='center'>".$l['libprd']."</td>
              <td align='center'>".$l['qteliv']."</td>
              <td align='center'>".$l['prixcom']."</td>
              <td align='center'>".$l['montant_paye']."</td>
    
            </tr>";
          }
        }
        else{
          echo mysql_error();
        }
      
      echo"</table>";
    ?>
  </div>
<?php require_once ("footer.php") ?> 