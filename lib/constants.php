<?php
    include '../connexion.php';
    $produit = $_POST['produit'];
    extract($_POST);
    $test=mysql_query("SELECT qtestock FROM produit WHERE refprod=$produit");
    if(mysql_num_rows($test)){
      echo '1';
    }else {
      echo '0';
    }
?>
