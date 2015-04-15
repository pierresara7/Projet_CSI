
<?php require_once ("header.php");?>
<div id="contact">
<form method="post" action="#">
    <h2 align="center"> DEMANDE DE RENSEIGNEMENT </h2>
    <pre>

        Information 1     <input name="nom" type="text" style="height:30px" placeholder="Votre NOM"/>   <input name="prenom" type="text" style="height:30px" placeholder="Votre PRENOM"/>


        Information 2     <input name="adresse" type="text" style="height:30px" placeholder="Votre ADRESSE"/>   <input type="text" name="telephone" style="height:30px" placeholder="Votre NUMERO"/>


        Identification    <input name="email" type="email" style="height:30px" placeholder="Votre MAIL"/>   <input name="objet" type="text" style="height:30px" placeholder="Objet de votre requete"/>


        Message           <textarea name="message" rows="4" cols="900"> Enregistrer votre message!!!</textarea>
						
    <input type="submit" name="go" value="Valider" class="btn btn-success">    <input type="submit" name="sav" value="Valider et Enregistrer" class="btn btn-info">    <input type="submit" name="end" value="Annuler" class="btn btn-danger" onclick="msg()">
    </pre>
</form>
</div>
<?php require_once ("footer.php");?>