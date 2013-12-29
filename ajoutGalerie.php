<?php
require_once( dirname(__FILE__ ) . '/conf/config.inc.php');

$nom = $_GET['nom'];
$annee = $_GET['annee'];

$insert = "	INSERT INTO	galeries
			(			nom,
						annee )
			VALUES (	:nom,
						:annee )";
$stmt = $cnx->prepare( $insert );
$stmt->bindParam( ':nom', $nom, PDO::PARAM_STR, 100 );
$stmt->bindParam( ':annee', $annee, PDO::PARAM_INT );
echo ( $stmt->execute() == true ? 'OK' : 'KO' );