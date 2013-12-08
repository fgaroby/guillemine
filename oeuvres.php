<?php
error_reporting( E_ALL );
require_once( dirname( __FILE__ ) . '/library/thumbs.inc.php' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/menu.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/main.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/oeuvre.css" />
<title>Christelle Guillemine</title>
</head>
<body>
	<?php
		$current = 'oeuvre';
		require_once( dirname( __FILE__ ) . '/menu.php' );
	?>
	<hr />
	<div id="main">
		<span class="mainTitle">Œuvres</span> <br />
		<div id="oeuvres">
<?php
			require_once( dirname(__FILE__ ) . '/conf/config.inc.php');
			try
			{
				$selectOeuvres = "	SELECT	o.id AS id_oeuvre,
											o.nom AS nom_oeuvre,
											o.largeur,
											o.longueur,
											p.id AS id_peinture
									FROM	peintures p
									LEFT JOIN oeuvres o
										ON	o.id = p.id_galerie
										AND	type = 2
									GROUP BY	o.id
									ORDER by	nom_oeuvre ASC";
				$select = $cnx->query( $selectOeuvres );
				$select->setFetchMode( PDO::FETCH_OBJ );
	
				$i = 0;
				while ($oeuvre = $select->fetch() )
				{
					if( !isThumbExists( $oeuvre->id_peinture, 'peintures' ) )
						createThumb( $oeuvre->id_peinture, 'peintures' );
					
					echo '<span class="theme">
							<a href="oeuvre.php?id_oeuvre=' . $oeuvre->id_oeuvre . '"><img src="./peintures/vignettes/' . $oeuvre->id_peinture . '.jpg" /></a>
							<span class="titre">' . $oeuvre->nom_oeuvre . '</span>
						</span>';
					if( ++$i % 3 == 0 )
						echo '<br />';
				}
			}
			catch( PDOException $e )
			{
				echo 'Connexion échouée : ' . $e->getMessage();
			}
?>
		</div>
	</div>
	<br class="clearer" />
</body>
</html>