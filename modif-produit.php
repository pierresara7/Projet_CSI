<?php
    require ("connexion.php");
      //récupération des valeurs des champs:
    $rec1=$_POST['design'] ;
    $rec2=$_POST['qte'] ;
    $rec3=$_POST['prix'] ;
       //récupération du numero :
    $id= $_POST['num'] ;
      //création de la requête SQL:
    $sql = "UPDATE produit SET libprd='$rec1', qtestock='$rec2', prix='$rec3' WHERE refprod='$id' " ;
      //exécution de la requête SQL:
    $exe=mysql_query($sql);
     //affichage des résultats, pour savoir si la modification a marchée:
    if($exe){
        echo("La modification a été correctement effectuée") ;
        header("location:produit.php");
    }
    else{
        echo("La modification a echouee") ;
        echo("<br>");
        echo mysql_error();
    }
?>