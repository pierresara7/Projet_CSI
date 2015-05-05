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

				<?php
						session_start();

				if (isset($_SESSION['login'])){
					echo $_SESSION['login'];
					if($_SESSION['login']=='admin'){
						?>
								    <input type="image" class="img_deconnexion"src="image/deconnexion.jpg" value="submit" align="middle"/>

							<div class="navbar-inner">
				<ul class="nav pull-right">
					<li><a href="client.php">Nos Clients</a></li>
					<li><a href="bilan.php" >Bilan</a></li>
					<li><a href="offre.php" >Nos Offres</a></li>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="produit.php">Nos Produits</a></li>
						<?php
					}
					else
					{ ?>
						<div class="navbar-inner">
				<ul class="nav pull-right">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="produit.php">Nos Produits</a></li>
					<li><a href="form_validation_panier.php" >Valider Panier</a><li>
<?php
					}


				}else {

				 require_once ("form_connexion.php");
				
				}
				
				?>
				

			</ul>
			</div>
		</div>
	</div>
	<div class="container">

		