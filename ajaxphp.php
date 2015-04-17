<?php
    $produit = $_POST['produit'];
    include 'connexion.php';
    $link = mysql_query("SELECT libprd,qtestock,pu from produit where libprd LIKE %$produit%");
    $retour = "";
    while($row = mysql_fetch_assoc($link)){
        $retour .= utf8_encode($row['libprd'])." ".utf8_encode($row['pu']); 
    }
    echo $retour;
    mysql_free_result($link);
?>