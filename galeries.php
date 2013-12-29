<?php
session_start();
$_SESSION['authentified'] = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/menu.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/main.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/form.css" />
<link rel="stylesheet" type="text/css" media="all" href="./styles/galerie.css" />
<script type="text/javascript" language="javascript" src="./js/jquery-1.10.0.js"></script>
<script type="text/javascript" language="javascript" src="./js/galerie.js"></script>
<title>Christelle Guillemine - Galeries/Thématiques</title>
</head>
<body>
	<?php
		$current = 'galerie';
		require_once( dirname( __FILE__ ) . '/menu.php' );
	?>
	<hr />
	<div id="main">
		<span class="mainTitle">Galeries/Thématiques <span style="font-size : 13px">(cliquez pour ouvrir)</span></span>
		<img class="imgAdd" src="./images/add-16.png" title="Afficher le formulaire d'ajout d'une galerie" alt="Afficher le formulaire d'ajout d'une galerie" onclick="afficheGalerie();" />
		<img class="imgRemove" src="./images/remove-16.png" title="Masquer le formulaire d'ajout d'une galerie" alt="Masquer le formulaire d'ajout d'une galerie" onclick="masqueGalerie();" />
		<br />
		<div id="ajoutGalerie">
			<label for="input_galerie">Nom&nbsp;: </label>
			<input type="text" name="input_galerie" id="input_galerie" size="20" />
			<br />
			<label for="input_annee">Année&nbsp;:</label>
			<input type="text" name="input_annee" id="input_annee" size="2" maxlength="4" />
			<br />
			<button class="OKButton" disabled="disabled" name="Valider">Valider</button>
		</div>
		<div id="galeries">
<?php
			require_once( dirname(__FILE__ ) . '/conf/config.inc.php');
			try
			{
				$selectGaleries = "	SELECT	g.id AS id_galerie,
											g.nom AS nom_galerie,
											g.annee AS annee_galerie,
											p.id AS id_peinture,
											p.nom AS nom_peinture
									FROM	galeries g
									LEFT JOIN peintures p
										ON	g.id = p.id_galerie
										AND	type = 1
									GROUP BY	g.id
									ORDER by	annee_galerie DESC";
				echo '<!-- ' . $selectGaleries . '-->';
				$select = $cnx->query( $selectGaleries );
				$select->setFetchMode(PDO::FETCH_OBJ);
	
				$i = 0;
				while ($galerie = $select->fetch() )
				{
					if( $_SESSION['authentified'] === true && $galerie->id_peinture === null )
					{
						echo '<span class="theme">
								<a href="galerie.php?id_galerie=' . $galerie->id_galerie . '"><img class="imgAdd" src="./images/add-64.png" title="Cliquer pour ajouter une peinture à cette galerie" /></a>
								<span class="titre">' . $galerie->nom_galerie . ( !empty( $galerie->annee_galerie ) ? ' <span class="annee">(' . $galerie->annee_galerie . ')</span>' : '' ) . '</span>
							</span>';
					}
					echo '<span class="theme">
							<a href="galerie.php?id_galerie=' . $galerie->id_galerie . '"><img src="./peintures/vignettes/' . $galerie->id_peinture . '.jpg" /></a>
							<span class="titre">' . $galerie->nom_galerie . ( !empty( $galerie->annee_galerie ) ? ' <span class="annee">(' . $galerie->annee_galerie . ')</span>' : '' ) . '</span>
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
