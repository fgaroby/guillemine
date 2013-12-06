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
			$( xml ).find( 'peinture' ).each(function(){
				$( '#image_hover img' )	.attr( 'src', $( this ).attr( 'src' ) )
				.attr( 'width', 500 );
				$( '#nom_toile').text( $( this ).attr( 'nom' ) );
				$( '#annee_toile').text( $( this ).attr( 'annee' ) );
				$( '#technique').text( $( this ).attr( 'technique' ) );
			});
			$( '#image_hover' ).show();		
		} );
	});
});
