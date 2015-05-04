<?php
include('connexion_database.php');
$req=mysql_query("CALL changement_prix(2,1)") or die(mysql_error());
//$req2=mysql_result($req,0) or die(mysql_error());
//echo $req2;
//SET @p1='5'; CALL `last_prix`(@p0, @p1); SELECT @p0 AS `last_id_prix`;
