<?php

/**
 * Crear nuestros menús gestionables desde el
 * administrador de Wordpress.
 */

function mis_menus() {
    register_nav_menus(
        array(
            'navegation' => __( 'Menú de navegación' ),
        )
    );
}
add_action( 'init', 'mis_menus' );

/**
 * Crear una zonan de widgets que podremos gestionar
 * fácilmente desde administrador de Wordpress.
 */

function mis_widgets(){
    register_sidebar(
        array(
            'name'          => __( 'Sidebar' ),
            'id'            => 'sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );
}
add_action('init','mis_widgets');

/**
 * Filtrar resultados de búsqueda para que solo muestre
 * posts en el listado
 */

function buscar_solo_posts($query) {
    if($query->is_search) {
        $query->set('post_type','post');
    }
    return $query;
}
add_filter('pre_get_posts','buscar_solo_posts');

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array(
	'aside',
	'image',
	'video',
	'quote',
	'link',
	'gallery',
	'audio',
) );

/**
 * Habilitar la opción de logo en el template
 */
function custom_logo() {

	add_theme_support( 'custom-logo', array(
		'height'      => 93,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'custom_logo' );


// Cargar Hojas de estilos
function custom_css(){
	wp_enqueue_style('Quicksand', "https://fonts.googleapis.com/css?family=Quicksand:400,700&amp;subset=latin-ext", false, '1.0', 'all');
	wp_enqueue_style('bastemp', "https://bastemp.com/css/bastemp.min.css", 'Quicksand', '1.1.2', 'all');

    //VALIDAMOS LA CARGA DE ARCHIVOS SOLO PARA EL UNDER CONSTRUCTION
    if ( is_page_template( 'page-under-construction.php' ) ) {
        wp_enqueue_style('under', get_bloginfo('template_url').'/assets/css/under.min.css','bastemp', '1.0', 'all');
    }
    else{
        wp_enqueue_style('style', get_bloginfo('template_url').'/assets/css/style.min.css','bastemp', '1.0', 'all');
    }
}
add_action('wp_print_styles', 'custom_css');

//Cargador de Javascript
function custom_scripts() {

	// Registramos JQUERY
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_bloginfo('template_url').'/assets/js/jquery-3.2.1.min.js', false, '3.2.1', false );
	wp_enqueue_script( 'jquery' );
	//
	// // Registramos Slick
	// wp_deregister_script( 'slick' );
	// wp_register_script( 'slick', get_bloginfo('template_url').'/assets/slick/slick.js', false, '1.0', false );
	// wp_enqueue_script( 'slick' );

	// Registramos Bastemp
	wp_deregister_script( 'bastemp' );
	wp_register_script( 'bastemp', 'https://bastemp.com/js/bastemp.min.js', false, '1.1.2"', false );
	wp_enqueue_script( 'bastemp' );

	// Registramos navike21 css
	wp_deregister_script( 'navike21' );
	wp_register_script( 'navike21', get_bloginfo('template_url').'/assets/js/navike21.min.js', false, '1.0', false );
	wp_enqueue_script( 'navike21' );

	// // Registramos Bastemp
	// wp_deregister_script( 'agrovet-js' );
	// wp_register_script( 'agrovet-js', get_bloginfo('template_url').'/assets/js/agrovet.min.js', false, '1.0', false );
	// wp_enqueue_script( 'agrovet-js' );

	// //REGISTRAMOS BOOTSTRAP
	// wp_deregister_script( 'bootstrap' );
	// wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', false );
	// wp_enqueue_script( 'bootstrap' );

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

/*===========================================================================
        WIDGETS ZONE
  ===========================================================================*/
/**
 * RECENT WORKS HOME
 **/
function recent_works() {

	register_sidebar( array(
		'name'          => 'Recent Works',
		'id'            => 'recent_works',
		'before_widget' => '<div class="w_100 section_middle_center">',
		'after_widget'  => '</div>',
		//'before_title'  => '<h3>',
		//'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'recent_works' );

/**
 * LASTEST POST HOME
 **/
function recent_post() {

	register_sidebar( array(
		'name'          => 'Lastest post',
		'id'            => 'recent_post',
		'before_widget' => '<div class="w_100 section_middle_center">',
		'after_widget'  => '</div>',
		//'before_title'  => '<h3>',
		//'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'recent_post' );

/**
 * PRE FOOTER
 **/
function to_work() {

	register_sidebar( array(
		'name'          => 'Let´s Go to work',
		'id'            => 'to_work',
		'before_widget' => '<div class="w_100 section_middle_center">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'to_work' );

/**
 * CAPACIDADES
 **/
function capacidades() {

	register_sidebar( array(
		'name'          => 'Capacidades',
		'id'            => 'capacidades',
		'before_widget' => '<div class="w_20 section_middle_center">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'capacidades' );
