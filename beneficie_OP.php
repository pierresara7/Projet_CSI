<?php
include("connexion_database.php");
$id_prod=$_POST['id_prod'];
$liste=$_POST['liste'];
$proc=mysql_query("CALL(changement_prix($id_prod,$liste))");
?>