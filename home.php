<?php
    get_header(); //Header Web site
    //Featured image;
    echo $url_img_destacada = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

    //REDES SOCIALES
    $name_pod = "redes-sociales";
    $parametr = array(
    	'limit' => -1
    );
    $pods_rss = pods($name_pod, $parametr);
    if ( 0 < $pods_rss->total() ) {
		$pods_rss->fetch();
        $portada_blog   = $pods_rss->display('portada_blog');
        $rss_facebook   = $pods_rss->display('facebook');
        $rss_twitter    = $pods_rss->display('twitter');
        $rss_instagram  = $pods_rss->display('instagram');
        $rss_linkedin   = $pods_rss->display('linkedin');
        $rss_correo     = $pods_rss->display('correo');
        $rss_telefono   = $pods_rss->display('telefono');
        $rss_ver_mas    = $pods_rss->display('ver-mas');
        $rss_ver_todo   = $pods_rss->display('ver-todo');
        $rss_leeme      = $pods_rss->display('leeme');
        $rss_ubicacion  = $pods_rss->display('ubicacion');
        $rss_contactame = $pods_rss->display('contactame');
    }

    echo '
    <div class="w_100 banner_principal" style="background-image: url('.$portada_blog.')"></div>
    <div class="w_80">
        <article class="w_100 section_top_center bienvenida">
            <h2>Blog</h2>
            <section class="w_100 section_top_justify">';
            $args = array(
                // 'category_name' => 'Pic of the Week',
                'posts_per_page' => 1,
                'order_by' => 'date',
                'order' => 'desc'
            );

            $post = get_posts( $args );
            if($post) {
                $post_id = $post[0]->ID;
                if(has_post_thumbnail($post_id)){
                    // use one of these
                    echo get_the_post_thumbnail($page->ID, 'thumbnail');
                    echo get_the_post_thumbnail( $post_id, array(80, 80), array('class' => 'post_thumbnail') );
                }
            }

    echo'   </section>';
    echo '
        </article>
        <div id="works" class="w_100 section_middle_center">';

    echo '
        </div>
    </div>
    <div class="w_100 to_work section_top_center">';
        if ( is_active_sidebar( 'to_work' ) ) {
            dynamic_sidebar( 'to_work' );
            echo '<a href="/contact/" class="enlace_towork enlace">'.$rss_contactame.'</a>';
        }
    echo '
    </div>
    ';
    get_footer(); // Obtener el Footer del web site
?>
