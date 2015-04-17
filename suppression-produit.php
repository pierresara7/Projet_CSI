<?php
    require_once ("connexion.php");
    $del  = $_GET['id'] ;
      //requête SQL:
    $sql = "DELETE 
            FROM produit
	          WHERE refprod = ".$del;
    echo $sql ;	    
       //exécution de la requête:
    $exe = mysql_query($sql) ;
      //affichage des résultats, pour savoir si la suppression a marchée:
    if($exe){
        echo("La suppression à été correctement effectuée") ;
        header("location:produit.php");
    }
    else{
    echo("La suppression à échouée") ;
    }
?>