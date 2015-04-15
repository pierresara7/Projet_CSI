<?php require_once ("header.php");?>
    <?php
        require ("connexion.php");
        $val=$_GET['id'] ;
        $req="SELECT * FROM client WHERE idcli =".$val;
        $exe=mysql_query($req);
          //affichage des données:
        if($l=mysql_fetch_array($exe)){
    ?>
    <div class=container>
        <div class="row">
            <div class="span6" align="center"><h1>Modification Client</h1></div>
        </div>
        <form name="insertion" action="modif-client.php" method="POST" class="span8">
            <input type="hidden" name="num" value="<?php echo $_GET['id'] ;?>">
            <pre>

                <b>Nom du Client</b>        <input type="text" name="nom" value="<?php echo $l[1] ;?>">
                <b>Prenom du Client</b>     <input type="text" name="pnom" value="<?php echo $l[2] ;?>">
                <b>Adresse du client</b>    <input type="text" name="adr" value="<?php echo $l[3] ;?>">
                <b>Telephone du Client</b>  <input type="text" name="tel" value="<?php echo $l[4] ;?>">
                               <input type="submit" value="Terminer" class="btn btn-success">
            </pre>
        </form>
      <?php
        }//fin if
      ?>
  </div>
<?php require_once ("footer.php") ?> 