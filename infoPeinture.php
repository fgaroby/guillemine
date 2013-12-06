<?php
header( 'Content-Type:text/xml' );
$xml = '<root>';
require_once( dirname(__FILE__ ) . '/conf/config.inc.php');

if( !isset( $_GET['id_peinture'] ) )
	$xml .= '<error>Aucun id fourni !</error>';
else
{
	$selectInfos = "SELECT	id,
							nom,
							largeur,
							hauteur,
							annee,
							technique,
							commentaire
					FROM	peintures
					WHERE	id = {$_GET['id_peinture']}";
	$select = $cnx->query( $selectInfos );
	$select->setFetchMode(PDO::FETCH_OBJ);
	
	while ($peinture = $select->fetch() )
	{
		$xml .= '<peinture	id="' . $peinture->id . '"
							src="./peintures/' . $peinture->id . '.jpg"
							nom="' . $peinture->nom . '"
							largeur="' . $peinture->largeur . '"
							hauteur="' . $peinture->hauteur . '"
							annee="' . $peinture->annee . '"
							technique="' . $peinture->technique . '"
							commentaire="' . $peinture->commentaire . '"
							 />';
	}
}
echo $xml . '</root>';