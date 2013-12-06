<?php
if( !isset( $_GET['id_galerie'] ) )
	header('Location: galeries.php');

require_once( dirname(__FILE__ ) . '/conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" media="all" href="./styles/main.css" />
	<link rel="stylesheet" type="text/css" media="all" href="./styles/menu.css" />
	<link rel="stylesheet" type="text/css" media="all" href="./styles/galerie.css" />
	<link rel="stylesheet" type="text/css" media="all" href="./styles/carousel.css" />
	<script type="text/javascript" language="javascript" src="./js/jquery-1.10.0.js"></script>
	<script type="text/javascript" language="javascript" src="./js/jquery.carouFredSel-6.2.1.js"></script>
	<script type="text/javascript" language="javascript" src="./js/carousel-galerie.js"></script>
<title>Christelle Guillemine</title>
</head>
<body>
	<?php
		$current = 'galerie';
		require_once( dirname( __FILE__ ) . '/menu.php' );
	?>
	<hr />
	<div id="main" style="position : relative; height : 700px;">
<?php
			$selectGalerie = "	SELECT	g.id,
										g.nom
								FROM	galeries g
								WHERE	g.id = {$_GET['id_galerie']}";
			$select = $cnx->query( $selectGalerie );
			$select->setFetchMode(PDO::FETCH_OBJ);
			$galerie = $select->fetch();
				
?>
		<span class="mainTitle"><a href="galeries.php">Galerie</a> &rarr; <?php echo $galerie->nom; ?></span>
		<div id="image_hover" style="display : none">
			<img src="" style="display : none" />
			<br />
			<span id="nom_toile"></span>
			<span id="annee_toile"></span>
			<br />
			<span id="dimensions"></span>
			<span id="technique"></span>
		</div>
		<div class="clearer">&nbsp;</div>
		<div class="image_carousel">
			<div id="carousel">
<?php
			$selectPeintures = "SELECT	p.id,
										p.nom,
										p.largeur,
										p.hauteur,
										p.annee,
										p.commentaire
								FROM	peintures p
								WHERE	p.id_galerie = {$_GET['id_galerie']}
								ORDER BY p.nom ASC";
			$select = $cnx->query( $selectPeintures );
			$select->setFetchMode(PDO::FETCH_OBJ);

			while ($peinture = $select->fetch() )
			{
				echo '<img src="./peintures/vignettes/' . $peinture->id . '.jpg" alt="' . $peinture->nom . '" height="140" />';
			}
?>
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
