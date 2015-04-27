<?php	
	$recherche = $_POST['recherche'];
	
		if (($recherche == "")||($recherche == "%")) {
		// Si aucun mot clé n'a été saisi,le script demande à l'utilisateur de bien vouloir préciser un mot clé
			echo "Veuillez entrer un mot clé s'il vous plait !<p>";}
		else {
			// On selectionne les enregistrements contenant le mot clé dans les keywords ou le titre
			$p = new PDO("mysql:host=localhost;dbname=database", "root", "");
 			$reponse = $p -> query("SELECT * from tracks WHERE title LIKE'$recherche%'; ");
 			$donnees = $reponse->fetchAll();
			$i=0;
			echo '<table border="0">';
			foreach($donnees as $row){
				echo '<tr id="res"><td>' .$row['title'] . '</td> <td>' . '<audio src="' . $row['mp3_url'] . '"controls></audio>'. '</td><td><form action="ajoutplaylist.php" method=post><input type="hidden" name="track_id" value="'. $row['track_id'].'"/> <input type="submit" value="+"/> </form>'."</td></tr>\n";
			}
			// On recupere l'id de la musique afin de pouvoir s'en servir par la suite pour ajouter la musique a une playlist.
			echo "</table>";
 		}
?>