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
            <section class="ultimo_post w_100 section_top_justify">';
            $args = array(
                'numberposts'   => '1',
                'order'         => 'DESC'
            );

            $recent_posts = wp_get_recent_posts($args);
            foreach( $recent_posts as $recent ){
                $id_last_post = $recent["ID"];
                if ( has_post_thumbnail( has_post_thumbnail( $id_last_post ) ) ) {
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id_last_post ), 'single-post-thumbnail' );
                    echo '<div class="w_48 portada_last_post" style="background-image: url('.$image[0].')"></div>';
                }
                $more_last_post = '...';
                $limit_words = 60;
                //CANTIDAD DE PALABRAS MANTENIENDO EL FORMAT HTML
                // force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), 50, $more_last_post ) ) )
                echo '  <div class="w_49 contenido_wrapp">
                            <h3 class="align_left w_100">'.$recent["post_title"].'</h3>
                            <div class="w_100 align_justify contenido_reciente">'.force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), $limit_words, $more_last_post ) ) ).'</div>
                            <a href="'.get_permalink( $id_last_post ).'" class="degradado">'.$rss_ver_mas.'</a>
                        </div>';
            }

    echo'   </section>';
    echo '
        </article>
        <div id="works" class="w_100 section_middle_center">';
        $args = array(
            'numberposts'   => '12',
            'order'         => 'DESC'
        );

        $last_no = 0;

        $recent_posts = wp_get_recent_posts($args);
        foreach( $recent_posts as $recent ){
            if ($last_no != 0) {
                $id_last_post = $recent["ID"];
                if ( has_post_thumbnail( has_post_thumbnail( $id_last_post ) ) ) {
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id_last_post ), 'single-post-thumbnail' );
                    echo '<div class="w_48 portada_last_post" style="background-image: url('.$image[0].')"></div>';
                }
                $more_last_post = '...';
                $limit_words = 60;
                //CANTIDAD DE PALABRAS MANTENIENDO EL FORMAT HTML
                // force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), 50, $more_last_post ) ) )
                echo '  <div class="w_49 contenido_wrapp">
                            <h3 class="align_left w_100">'.$recent["post_title"].'</h3>
                            <div class="w_100 align_justify contenido_reciente">'.force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), $limit_words, $more_last_post ) ) ).'</div>
                            <a href="'.get_permalink( $id_last_post ).'" class="degradado">'.$rss_ver_mas.'</a>
                        </div>';
                $last_no ++;
            }
        }
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
