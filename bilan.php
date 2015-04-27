<?php
require_once("connexion_database.php");
$req=mysql_query("Select * from bilan as b INNER join journaliere as j on b.id_bilan=j.id_bilan");
if ($req==TRUE) {
          echo"<table class='span8'>
            <th align='center'>Date</th>
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
 $req2=mysql_query("Select (*) from bilan as b INNER join hebdomadaire as j on b.id_bilan=j.id_bilan");
if ($req2) {
          echo"<table class='span8'>
            <th align='center'>Date</th>
            <th align='center'>Montant Total</th>
            <th align='center'>Quantité</th>
          
            </tr>";
          while($l= mysql_fetch_array($req)){
          echo"<tr>
              <td align='center'>".$l['date_deb_bilan']."</td>
              <td align='center'>".$l['montant_total']."</td>
              <td align='center'>".$l['quantite_panier']."</td>
    
            </tr>
            </table>";}
        }
         else
    {
    					 die(mysql_error());
	
    }
            $req3=mysql_query("Select (*) from bilan as b INNER join mensuelle as j on b.id_bilan=j.id_bilan");
if ($req3) {
          echo"<table class='span8'>
            <th align='center'>Date</th>
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
?>