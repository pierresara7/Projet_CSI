<?php
    require ("connexion.php");
      //récupération des valeurs des champs:
    $rec1=$_POST['nom'] ;
    $rec2=$_POST['pnom'] ;
    $rec3=$_POST['adr'] ;
    $rec4=$_POST['tel'] ;
       //récupération du numero :
    $id= $_POST['num'] ;
      //création de la requête SQL:
    $sql = "UPDATE client SET nomcli='$rec1', pnomcli='$rec2', adrcli='$rec3', telcli='$rec4' WHERE idcli='$id' " ;
      //exécution de la requête SQL:
    $exe=mysql_query($sql);
     //affichage des résultats, pour savoir si la modification a marchée:
    if($exe){
        echo("La modification a été correctement effectuée") ;
        header("location:client.php");
    }
    else{
        echo("La modification a echouee") ;
        echo("<br>");
        echo mysql_error();
    }
?>