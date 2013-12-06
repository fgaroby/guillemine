<?php error_reporting( E_ALL ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/menu.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/main.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/galerie.css" />
<title>Christelle Guillemine</title>
</head>
<body>
	<?php
		$current = 'exposition';
		require_once( dirname( __FILE__ ) . '/menu.php' );
	?>
	<hr />
	<div id="main">
		<span class="mainTitle">Expositions</span> <br />
		<div id="expositions">
<?php
			require_once( dirname(__FILE__ ) . '/conf/config.inc.php');
			try
			{
				$selectExpositions = "	SELECT	e.id AS id_exposition,
									e.nom AS nom_exposition,
									e.debut,
									e.fin,
									p.id AS id_peinture,
									p.nom AS nom_peinture
							FROM
							(
								SELECT	e.id,
										e.nom,
										e.debut,
										(
											SELECT	CASE
													WHEN e1.fin IS NOT NULL THEN e1.fin
													ELSE e1.debut
												END AS fin
											FROM	expositions e1
											WHERE	e1.id = e.id
										) as fin,
										(
											SELECT	p.id
											FROM	photos p
											WHERE	p.id_exposition = e.id
											ORDER BY RAND()
											LIMIT 1
										) AS p_random
								FROM	expositions e
							) e
							LEFT JOIN peintures p
								ON p.id = e.p_random
							ORDER BY	e.fin DESC,
										e.debut DESC";
	$select = $cnx->query( $selectExpositions );
				$select->setFetchMode( PDO::FETCH_OBJ );
	
				$i = 0;
				while ($exposition = $select->fetch() )
				{
					echo '<span class="theme">
							<a href="exposition.php?id_exposition=' . $exposition->id_exposition . '"><img src="./photos/vignettes/' . $exposition->id_peinture . '.jpg" /></a>
							<span class="titre">' . $exposition->nom_exposition . '</span>
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