<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" media="all" href="../styles/menu.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../styles/main.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../styles/galerie.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../styles/carousel.css" />
		<script type="text/javascript" language="javascript" src="../js/jquery-1.10.0.js"></script>
		<script type="text/javascript" language="javascript" src="../js/jquery.carouFredSel-6.2.1.js"></script>
		<script type="text/javascript" language="javascript" src="../js/carousel.js"></script>
		<title>Christelle Guillemine</title>
	</head>
	<body>
		<div id="menu">
			<ul>
				<li>Christelle<br />Guillemine</li>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="galerie.php">Galerie</a></li>
				<li><a href="expo.php">Exposition/Vernissage</a></li>
				<li><a href="livre_or.php">Livre d'Or</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>	
			<br class="clearer" />
		</div>
		<hr />
		<div id="main" style="position : relative">
			<span class="mainTitle">Galerie : Name 1</span>
			<img id="image_hover" src="" style="display : none"/>
			<div class="image_carousel" style="position : absolute; bottom : 0px;">
				<div id="carousel">
					<img src="../peintures/vignettes/1-ECLAIRCIE.jpg" alt="éclaircie" width="140" height="140" />
					<img src="../peintures/vignettes/2-ARCHITECTURE.jpg" alt="beachtree" width="140" height="140" />
					<img src="../peintures/vignettes/3-NOUVEAU SOUFFLE.jpg" alt="cupcackes" width="140" height="140" />
					<img src="../peintures/vignettes/4-ECHANGES.jpg" alt="hangmat" width="140" height="140" />
					<img src="../peintures/vignettes/5-ECHANGES.jpg" alt="new york" width="140" height="140" />
					<img src="../peintures/vignettes/6-FENETRE DE VIE.jpg" alt="laundry" width="140" height="140" />
					<img src="../peintures/vignettes/7-ARCHITECTURE.jpg" alt="mom son" width="140" height="140" />
					<img src="../peintures/vignettes/8-NOUVEAU SOUFFLE.jpg" alt="picknick" width="140" height="140" />
					<img src="../peintures/vignettes/9-FLUIDITE.jpg" alt="shoes" width="140" height="140" />
					<img src="../peintures/vignettes/10-NOUVEAU MONDE.jpg" alt="paris" width="140" height="140" />
				</div>
				<div class="clearfix"></div>
				<a class="prev" id="carousel_prev" href="#"><span>prev</span></a>
				<a class="next" id="carousel_next" href="#"><span>next</span></a>
				<div class="pagination" id="carousel_page"></div>
			</div>
		</div>
		<br class="clearer" />
	</body>
</html>