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
		var id_peinture = $( this ).attr( 'src' ).substring( $( this ).attr( 'src' ).lastIndexOf( '/' ) + 1, $( this ).attr( 'src' ).lastIndexOf( '.') );
		$.get( 'infoPeinture.php',
		{
			id_peinture : id_peinture 
		},
		function( xml )
		{
			$( xml ).find( 'peinture' ).each(function( i, peinture )
			{
				var img = document.createElement( 'img' );
				$( img ).attr( 'src', $( peinture ).attr( 'src' ) ).load( function()
				{
					$( '#nom_toile').hide();
					$( '#dimensions').hide();
					$( '#annee_toile').hide();
					$( '#technique').hide();
					$( '#image_hover img' ).fadeOut( 'slow', function()
					{
						setTimeout( function()
						{
							$( '#image_hover img' ).attr( 'src', $( img ).attr( 'src' ) ).fadeIn( 'slow', function()
							{
								$( '#nom_toile').text( $( peinture ).attr( 'nom' ) ).show();
								$( '#dimensions').text( '(' + $( peinture ).attr( 'largeur' ) + 'cm. * ' + $( peinture ).attr( 'hauteur' ) + 'cm.)' ).show();
								$( '#annee_toile').text( $( peinture ).attr( 'annee' ) ).show();
								$( '#technique').text( $( peinture ).attr( 'technique' ) ).show();
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
