<?php error_reporting( E_ALL ); ?>
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
		<span class="mainTitle">Oeuvres</span> <br />
		<div id="oeuvres">
<?php
			require_once( dirname(__FILE__ ) . '/conf/config.inc.php');
			try
			{
				$selectOeuvres = "	SELECT	o.id AS id_oeuvre,
								o.nom AS nom_oeuvre,
								p.id AS id_peinture,
								p.nom AS nom_peinture
							FROM
							(
								SELECT	o.id,
									o.nom,
									(
										SELECT	p.id
										FROM	peintures p
										WHERE	p.id_galerie = o.id
										ORDER BY RAND()
										LIMIT 1
									) AS p_random
								FROM	oeuvres o
							) o
							LEFT JOIN peintures p
								ON	p.id = o.p_random
								AND	p.type = 2";
				$select = $cnx->query( $selectOeuvres );
				$select->setFetchMode( PDO::FETCH_OBJ );
	
				$i = 0;
				while ($oeuvre = $select->fetch() )
				{
					echo '<span class="theme">
							<a href="oeuvre.php?id_oeuvre=' . $oeuvre->id_oeuvre . '"><img src="./photos/vignettes/' . $oeuvre->id_peinture . '.jpg" /></a>
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