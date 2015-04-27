<?php
require_once("connexion_database.php");
require_once("header.php");
$req=mysql_query("Select b.date_deb_bilan,quantite_panier,montant_total from bilan as b INNER join journaliere as j on b.id_bilan=j.id_bilan");
if ($req==TRUE) {
          echo"<table class='span8'>
          <tr>
            <th align='center'>Date journaliere</th>
            <th align='center'>Montant Total</th>
            <th align='center'>Quantité</th>
          
            </tr>";
          while($l= mysql_fetch_array($req)){
          echo"<tr>
              <td align='center'>".$l['date_deb_bilan']."</td>
              <td align='center'>".$l['montant_total']."</td>
              <td align='center'>".$l['quantite_panier']."</td>
    
            </tr>
            </table>";
        }
    }
    else
    {
    					 die(mysql_error());
	
    }
 $req2=mysql_query("Select date_deb_bilan,montant_total,quantite_panier from bilan as b INNER join hebdomadaire as h on b.id_bilan=h.id_bilan");
if ($req2) {
          echo"<table class='span8'> <tr>
          <th align='center'>Date hebdomadaire</th>
            <th align='center'>Montant Total</th>
            <th align='center'>Quantité</th>
          
            </tr>";
          while($ll= mysql_fetch_array($req2)){
          echo"<tr>
              <td align='center'>".$ll['date_deb_bilan']."</td>
              <td align='center'>".$ll['montant_total']."</td>
              <td align='center'>".$ll['quantite_panier']."</td>
    
            </tr>
            </table>";}
        }
         else
    {
    					 die(mysql_error());
	
    }
            $req3=mysql_query("Select date_deb_bilan,montant_total,quantite_panier from bilan as b INNER join mensuelle as m on b.id_bilan=m.id_bilan");
if ($req3) {
          echo"<table class='span8'> <tr>
            <th align='center'>Date mensuelle</th>
            <th align='center'>Montant Total</th>
            <th align='center'>Quantité</th>
          
            </tr>";
          while($l3= mysql_fetch_array($req3)){
          echo"<tr>
              <td align='center'>".$l3['date_deb_bilan']."</td>
              <td align='center'>".$l3['montant_total']."</td>
              <td align='center'>".$l3['quantite_panier']."</td>
    
            </tr>
            </table>";
        }
    }
     else
    {
    					 die(mysql_error());
	
    }
?>