<?php
    require_once ("connexion.php");
    $del  = $_GET['id'] ;
    // 1ere etape:recuperation de toutes les idcom en rapport avec le client $del
    $commande = mysql_query("SELECT idcom from commande_client where idcli=".$del);
    $rec_idcom = "";
    while ($exe_com = mysql_fetch_assoc($commande)) {
        if (""  == $rec_idcom) {
            $rec_idcom .= $exe_com['idcom'];
        }
        else{
            $rec_idcom .= ",".$exe_com['idcom'];
        }
    }
    // 2eme etape:recuperation de toutes les idlign_com en rapport avec $rec_idcom
    $rec_idligne_com = "";
    if ("" != $rec_idcom) {
        $ligne_com = mysql_query("SELECT idligne_com from ligne_client where idcom in ($rec_idcom)");
        while ($exe_ligne_com = mysql_fetch_assoc($ligne_com)) {
            if ("" == $rec_idligne_com) {
                $rec_idligne_com .= $exe_ligne_com['idligne_com'];
            }
            else{
                $rec_idligne_com .= ",".$exe_ligne_com['idligne_com'];
            }
        }
    }
    // 3eme etape:suppression de toutes les idlign_com recuperees
    if ("" != $rec_idligne_com) {
        $del_ligne_com = mysql_query("DELETE from ligne_client where idligne_com in ($rec_idligne_com)");
        if ($del_ligne_com) {
            $ligne_com_delete = mysql_affected_rows();
            echo $ligne_com_delete. " Produits Commandes supprimees";
        }
        else{
            echo mysql_error();
        }
    }
    // 4eme etape:suppression de toutes les id_com recuperees
    if ("" != $rec_idcom) {
        $del_idcom = mysql_query("DELETE from commande_client where idcom in ($rec_idcom)");
        if ($del_idcom) {
            $com_delete = mysql_affected_rows();
            echo $com_delete. " commandes_supprimees";
        }
        else{
            echo mysql_error();
        }
    }
    // 5eme etape:suppression du client
    $del_cli = mysql_query("DELETE FROM client WHERE idcli = ".$del);
    if($del_cli){
        header("location:client.php?message=Client supprimé avec succés!!!.");
    }
    else{
        header("Location: client.php?message=impossible de supprimer ce client revoir les requetes.");
    }
?>