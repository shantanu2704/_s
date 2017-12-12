<?php
/**
 * shantanu Theme Customizer
 *
 * @package shantanu
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shantanu_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'shantanu_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'shantanu_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'shantanu_customize_register' );

/**
* Create Logo Setting and Upload Control
*/
function shantanu_new_theme_customizer($wp_customize) {
$wp_customize->add_setting(
        'link_color', 
        array(
        'default' => '#6A6A76',
        'transport'   => 'postMessage'
        )
);

$wp_customize->add_setting(
        'link_visited_color', 
        array(
        'default' => '#7e7e8c',
        'transport'   => 'postMessage'
        )
);

$wp_customize->add_setting(
        'link_hover_color', 
        array(
        'default' => '#4a4e5c',
        'transport'   => 'postMessage'
        )
);
    
$wp_customize->add_setting(
        'header_background_color', 
        array(
        'default' => '#757575',
        'transport'   => 'postMessage'
        )
);

$wp_customize->add_setting(
        'footer_background_color', 
        array(
        'default' => '#B8B8B8',
        'transport'   => 'postMessage'
        )
);

$wp_customize->add_setting(
        'main_background_color', 
        array(
        'default' => '#D3D3D3',
        'transport'   => 'postMessage'
        )
);

$wp_customize->add_setting(
        'sidebar_background_color', 
        array(
        'default' => '#D3D3D3',
        'transport'   => 'postMessage'
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize, 
                'header-color', 
                array(
                    'label' => __( 'Header Color', 'shantanu'),
                    'section' => 'colors',
	'settings' => 'header_background_color'
                )
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize,
                'footer-color', 
                array(
                    'label' => __( 'Footer Color', 'shantanu'),
                    'section' => 'colors',
                    'settings' => 'footer_background_color'
                )
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize, 
                'main-color', 
                array(
                    'label' => __( 'Main Color', 'shantanu'),
                    'section' => 'colors',
                    'settings' => 'main_background_color',
                )
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize, 
                'sidebar-color', 
                array(
                    'label' => __( 'Sidebar Color', 'shantanu'),
                    'section' => 'colors',
                    'settings' => 'sidebar_background_color',
                )
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize, 
                'link-color', 
                array(
                    'label' => __( 'Link Color', 'shantanu'),
                    'section' => 'colors',
	'settings' => 'link_color'
                )
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize,
                'link-visited-color', 
                array(
                    'label' => __( 'Link Visited Color', 'shantanu'),
                    'section' => 'colors',
                    'settings' => 'link_visited_color'
                )
        )
);

$wp_customize->add_control(
        new WP_Customize_Color_Control( 
                $wp_customize, 
                'link-hover-color', 
                array(
                    'label' => __( 'Link Hover Color', 'shantanu'),
                    'section' => 'colors',
                    'settings' => 'link_hover_color',
                )
        )
);

}
add_action( 'customize_register', 'shantanu_new_theme_customizer' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function shantanu_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function shantanu_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shantanu_customize_preview_js() {
	wp_enqueue_script( 'shantanu-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'shantanu_customize_preview_js' );
