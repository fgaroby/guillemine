$(document).ready(function() {
	$("#carousel").carouFredSel({
		circular : true,
		infinite : true,
		auto : false,
		prev : {
			button : "#carousel_prev",
			key : "left"
		},
		next : {
			button : "#carousel_next",
			key : "right"
		}
	});

	$('#carousel img').click( function() {
		var id_photo = $( this ).attr( 'src' ).substring( $( this ).attr( 'src' ).lastIndexOf( '/' ) + 1, $( this ).attr( 'src' ).lastIndexOf( '.') );
		$.get( 'infoPhoto.php',
		{
			id_photo : id_photo 
		},
		function( xml )
		{
			$( xml ).find( 'photo' ).each(function( i, photo )
			{
				var img = document.createElement( 'img' );
				$( img ).attr( 'src', $( photo ).attr( 'src' ) ).load( function()
				{
					$( '#nom').hide();
					$( '#image_hover img' ).fadeOut( 'slow', function()
					{
						setTimeout( function()
						{
							$( '#image_hover img' ).attr( 'src', $( img ).attr( 'src' ) ).fadeIn( 'slow', function()
							{
								$( '#nom').text( $( photo ).attr( 'nom' ) ).show();
							} );
						});
					} );
				} );
			});
			$( '#image_hover' ).show();		
		} );
	});
	
	$( '#carousel img:first' ).click();
});
