<?php 
require_once( dirname(__FILE__) . '/library/phpThumb/ThumbLib.inc.php' );

$dest = './photos/';
$destVignettes = $dest . 'vignettes/';
if( $dh = opendir( $dest ) )
{
	while( ( $fichier = readdir( $dh ) ) !== false )
	{
		if( is_file( $dest . $fichier ) )
		{
			try
			{
				$options = array(	'resizeUp'		=> true,
							'jpegQuality'	=> 80 );
				$thumb = PhpThumbFactory::create( $dest . $fichier );
				$thumb->resize( 200 );
				$thumb->save( $destVignettes . $fichier );
			}
			catch( Exception $e )
			{
				print_r( $e );
			}
		}
	}
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
	<input type="file" name="peinture" />
	<input type="submit" name="Valider" />
</form>
