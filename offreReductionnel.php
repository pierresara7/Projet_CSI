
<?php require_once ("header.php");?>
<div id="contact">
<form method="post" action="">
    <h2 align="center"> Nouveau Offre Reductionnel </h2>
    <pre>

        Date debut Offre:          <input name="datedeb" type="date" style="height:30px" />   

        Date Fin Offre  :      	   <input name="datefin" type="date" style="height:30px" />  

        Pourcentage de reduction   <input name="pourcentage" type="text" style="height:30px" />  
		
    <input type="submit" name="go" value="Valider" class="btn btn-success">       <input type="submit" name="end" value="Annuler" class="btn btn-danger" onclick="msg()">
    </pre>
</form>
</div>
<?php

include("connexion_database.php");

if((isset($_POST['datefin'])) && (isset($_POST['pourcentage'])) && (isset($_POST['datedeb']))) {
	$datefin=$_POST['datefin'];
		$datedeb=$_POST['datedeb'];
			$pourcentage=$_POST['pourcentage'];


	$req=mysql_query("INSERT INTO offre_reductionnelle (pourcentageOR,datedebut_reduc,datefin_reduc) values('$pourcentage','$datedeb','$datefin')");

}
 require_once ("footer.php");?>