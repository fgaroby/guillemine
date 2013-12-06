<?php
header( 'Content-Type:text/xml' );
$xml = '<root>';
require_once( dirname(__FILE__ ) . '/conf/config.inc.php');

if( !isset( $_GET['id_photo'] ) )
	$xml .= '<error>Aucun id fourni !</error>';
else
{
	$selectInfos = "SELECT	id,
							nom
					FROM	photos
					WHERE	id = {$_GET['id_photo']}";
	$select = $cnx->query( $selectInfos );
	$select->setFetchMode(PDO::FETCH_OBJ);
	
	while ($photo = $select->fetch() )
	{
		$xml .= '<photo	id="' . $photo->id . '"
							src="./photos/' . $photo->id . '.jpg"
							nom="' . $photo->nom . '"
							 />';
	}
}
echo $xml . '</root>';