<html>
<head>
	<title> Projet de CSI</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="./image/favicon.ico" />
</head>
<body>
	<p></p>
	<div class="container">
		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav pull-right">
					<li><a href="accueil.php">Acceuil</a></li>
					<li><a href="client.php">Nos Clients</a></li>
					<li><a href="produit.php">Nos Produits</a></li>
					<li><a href="commande.php">Nos Commandes</a></li>
					<li><a href="bilan.php">Bilan</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="span3">
				<br>
				<p><a href="vente.php" class='btn btn-default btn-lg btn-block'>Acheter un Produit</a></p>
				<p><a href="bon-commande.php" class='btn btn-default btn-lg btn-block'>Passer une Commande</a></p>
				<p><a href="livraison.php" class='btn btn-default btn-lg btn-block'>Enregistrer une livraison</a></p>
				<p><a href="commande-client.php" class='btn btn-default btn-lg btn-block'>Enregistrer une Commande</a></p>
				<p><a href="facture_client.php" class='btn btn-default btn-lg btn-block'>Facture Client</a></p>
				<br>
				<p><form class="block" action="search.php" method="post">
					<input type="search" name="search" placeholder="Votre Recherche">
					<select name="choix">
						<option>Client</option>
						<option>Produit</option>
					</select>
					<input type="submit" name="go" value="Search" class='btn btn-info btn-lg btn-block'>
				</form></p>
			</div>
			<div class=" content span9">