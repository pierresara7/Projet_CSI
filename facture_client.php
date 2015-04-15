<?php require_once ("header.php");?>

<div class="container">
  <div class="row">
    <div class="span7">
      <h4> RESEAU PHARMACEUTIQUE</h4>
      Tél:221 77 988 30 09
      </div>
      <div class="span3">Le: <?php echo$today = date("j/ n/ Y");   ?></div>
  </div>

 <br>
 <div class='row'>
  <div class="span5"><h5>Client: 
    <?php include('connexion.php');
       $id= $_GET['id'];
       $req= mysql_query("SELECT idcli FROM commande_client WHERE idcom=".$id);
       $id_client= mysql_fetch_assoc($req);
       if ($id_client) {}
       else{echo mysql_error();}
     $c = $id_client['idcli'];
       $req2= mysql_query("SELECT nomcli, pnomcli, telcli FROM client WHERE idcli='".$c."'") or die ("mysql_error()");
       $client=mysql_fetch_array($req2);
       echo ($client['pnomcli']); echo(' ');
       echo ($client['nomcli']); echo(' '); echo ($client['telcli']);
       ?></h5></div>

 </div>
 

 <table class='table table-bordered span5'>
  <tr>
  
 NB: Au bout de 30 jours, tout tapis ou autre non retiré sera considéré comme perdu et l'entreprise dégage toute responsabilité.