
<?php require_once ("header.php");?>
<div id="contact">
<form method="post" action="#">
    <h2 align="center"> Nouveau Offre Reductionnel </h2>
    <pre>

        Date debut Offre:          <input name="datedebof" type="text" style="height:30px" />   

        Date Fin Offre  :      	   <input name="datefinOff" type="text" style="height:30px" />  

        Pourcentage de reduction   <input name="email" type="email" style="height:30px" />  
		
    <input type="submit" name="go" value="Valider" class="btn btn-success">       <input type="submit" name="end" value="Annuler" class="btn btn-danger" onclick="msg()">
    </pre>
</form>
</div>
<?php require_once ("footer.php");?>