<?php
if( !isset( $_GET['id_exposition'] ) )
	header('Location: expositions.php');

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
	<script type="text/javascript" language="javascript" src="./js/carousel-expo.js"></script>
<title>Christelle Guillemine</title>
</head>
<body>
	<?php
		$current = 'exposition';
		require_once( dirname( __FILE__ ) . '/menu.php' );
	?>
	<hr />
	<div id="main" style="position : relative; height : 700px;">
<?php
			$selectGalerie = "	SELECT	e.id,
										e.nom
								FROM	expositions e
								WHERE	e.id = {$_GET['id_exposition']}";
			$select = $cnx->query( $selectGalerie );
			$select->setFetchMode(PDO::FETCH_OBJ);
			$exposition = $select->fetch();
				
?>
		<span class="mainTitle"><a href="expositions.php">Exposition</a> &rarr; <?php echo $exposition->nom; ?></span>
		<div id="image_hover" style="display : none">
			<img src="" style="display : none" />
			<br />
			<span id="nom"></span>
		</div>
		<div class="clearer">&nbsp;</div>
		<div class="image_carousel">
			<div id="carousel">
<?php
			$selectPhotos = "SELECT	p.id,
						p.nom,
						p.id_exposition
					FROM	photos p
					WHERE	p.id_exposition = {$_GET['id_exposition']}
					ORDER BY	p.nom ASC,
							p.id ASC";
			$select = $cnx->query( $selectPhotos );
			$select->setFetchMode(PDO::FETCH_OBJ);

			while ($photo = $select->fetch() )
			{
				echo '<img src="./photos/vignettes/' . $photo->id . '.jpg" alt="' . $photo->nom . '" height="140" />';
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
