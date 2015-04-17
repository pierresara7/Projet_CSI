<?php require_once ("header.php");?>
    <?php
        require ("connexion.php");
        $val=$_GET['id'] ;
        $req="SELECT * FROM produit WHERE refprod =".$val;
        $exe=mysql_query($req);
          //affichage des données:
        if($l=mysql_fetch_array($exe)){
    ?>
    <div class=container>
        <div class="row">
            <div class="span6"><h1>Modification Produit</h1></div>
            <div class="span3"><a href="ajout-produit.php" class="btn btn-success pull-right">
                <i class='icon-plus'></i>
                  Nouveau Produit
            </a></div>
        </div>
        <form name="insertion" action="modif-produit.php" method="POST" class="span8">
            <input type="hidden" name="num" value="<?php echo $_GET['id'] ;?>">
            <pre>

                <b>Nom du Produit</b>        <input type="text" name="design" value="<?php echo $l[1] ;?>">
                <b>Quantitee en Magasin</b>  <input type="text" name="qte" value="<?php echo $l[2] ;?>">
                <b>Prix Unitaire</b>         <input type="text" name="prix" value="<?php echo $l[3] ;?>">
                               <input type="submit" value="Terminer" class="btn btn-success">
            </pre>
        </form>
      <?php
        }//fin if
      ?>
  </div>
<?php require_once ("footer.php") ?> 