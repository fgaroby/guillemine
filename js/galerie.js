$(document).ready(function ()
{
	$( '#input_annee' ).on( 'input', function ()
	{
		val = $( this ).val();
		if(  Math.floor( val ) != val || !$.isNumeric( val ) )
		{
			$( this ).val( val.substr( 0, val.length - 1 ) );
		}
	} );
	
	$( 'input' ).change( function()
	{
		if( $( '#input_galerie' ).val().length > 0 && $( '#input_annee' ).val().length > 0 )
			$( '.OKButton' ).removeAttr( 'disabled' );
		else
			$( '.OKButton' ).attr( 'disabled', 'disabled' );
	} );
	
	$( '.OKButton' ).click( function()
	{
		$.get( 'ajoutGalerie.php',
		{
			nom		: $( '#input_galerie' ).val(),
			annee	: $( '#input_annee' ).val()
		} ).done( function( data )
		{
			if( data  == 'OK' )
				alert( 'Ajout effectué !' );
			else
				alert( 'Une erreur est survenue lors de l\'ajout !' );
		} );
	} );
} );
 
function afficheGalerie()
{
	$( '#ajoutGalerie' ).show();
	$( '.imgAdd' ).hide();
	$( '.imgRemove' ).show();
}

function masqueGalerie()
{
	$( '#ajoutGalerie' ).hide();
	$( '.imgRemove' ).hide();
	$( '.imgAdd' ).show();
}
