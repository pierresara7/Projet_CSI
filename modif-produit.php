<?php
    require ("connexion_database.php");
      //récupération des valeurs des champs:
    $rec1=$_POST['nom_prod'] ;
    $rec2=$_POST['qte'] ;
    $rec3=$_POST['prix'] ;
       //récupération du numero :
    $id= $_POST['num'] ;
      //création de la requête SQL:
    $sql1 = "UPDATE produit SET nom_prod='$rec1' WHERE id_prod='$id' " ;
    $sql2 = "insert into prix_produit where prix='$rec3' " ;
    $sql3 = "insert into avoir where id_prod='$rec2' WHERE nom_prod='$id' " ;
      //exécution de la requête SQL:
    $exe=mysql_query($sql1);
	
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