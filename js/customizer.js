/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
            
                wp.customize( 'header_background_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( 'header.site-header' ).css( {
                                                                                            'background-color': '#757575'
                                                                        } );
                                                    } else {
                                                                        $( 'header.site-header' ).css( {
                                                                                            'background-color': to
                                                                         } );
                                                    }
                                } );
                } );
                
                wp.customize( 'footer_background_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( 'footer.site-footer' ).css( {
                                                                                            'background-color': '#B8B8B8'
                                                                        } );
                                                    } else {
                                                                        $( 'footer.site-footer' ).css( {
                                                                                            'background-color': to
                                                                         } );
                                                    }
                                } );
                } );
                
                wp.customize( 'main_background_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( '.content-area' ).css( {
                                                                                            'background-color': '#D3D3D3'
                                                                        } );
                                                    } else {
                                                                        $( '.content-area' ).css( {
                                                                                            'background-color': to
                                                                         } );
                                                    }
                                } );
                } );
                
                wp.customize( 'sidebar_background_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( 'aside.widget-area' ).css( {
                                                                                            'background-color': '#D3D3D3'
                                                                        } );
                                                    } else {
                                                                        $( 'aside.widget-area' ).css( {
                                                                                            'background-color': to
                                                                         } );
                                                    }
                                } );
                } );
                
                wp.customize( 'link_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( 'a' ).css( {
                                                                                            'color': '#6A6A76'
                                                                        } );
                                                    } else {
                                                                        $( 'a' ).css( {
                                                                                            'color': to
                                                                         } );
                                                    }
                                } );
                } );
                
                wp.customize( 'link_visited_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( 'a:visited' ).css( {
                                                                                            'color': '#7e7e8c'
                                                                        } );
                                                    } else {
                                                                        $( '.content-area' ).css( {
                                                                                            'color': to
                                                                         } );
                                                    }
                                } );
                } );
                
                wp.customize( 'link_hover_color', function( value ) {
                                value.bind( function( to ) {
                                                    if ( 'blank' == to ) {
                                                                       $( 'a:hover' ).css( {
                                                                                            'color': '#4a4e5c'
                                                                        } );
                                                    } else {
                                                                        $( 'a:hover' ).css( {
                                                                                            'color': to
                                                                         } );
                                                    }
                                } );
                } );
} )( jQuery );
