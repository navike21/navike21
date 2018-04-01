<?php
	/**
	 * Template Name: Plantilla de Under Construction
	 */

     get_header(); //Header Web site

	//Featured image;
 	$url_img_destacada = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

	//Imagen Logo Ruta
	if ( function_exists( 'the_custom_logo' ) ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$logo_principal = '<img src="'.$image[0].'" width="100%" height="auto" title="'.$image[3].'">';
	}
	else{
		$logo_principal = "";
	}

    //REDES SOCIALES
    $name_pod = "redes-sociales";
    $parametr = array(
    	'limit' => -1
    );
    $pods_rss = pods($name_pod, $parametr);
    if ( 0 < $pods_rss->total() ) {
		$pods_rss->fetch();
        $rss_facebook = $pods_rss->display('facebook');
        $rss_twitter = $pods_rss->display('twitter');
        $rss_instagram = $pods_rss->display('instagram');
        $rss_linkedin = $pods_rss->display('linkedin');

        //Facebook
        if ($rss_facebook != "") {
            $img_facebook = "https://navike21.com/wp-content/uploads/2018/03/facebook.svg";
            $linkfacebook = '<a href="'.$rss_facebook.'" target="_blank"><img src="'.$img_facebook.'" alt="facebook"></a>';
        }
        else{
            $linkfacebook = "";
        }

        //Twitter
        if ($rss_twitter != "") {
            $img_twitter = "https://navike21.com/wp-content/uploads/2018/03/twitter.svg";
            $linktwitter = '<a href="'.$rss_twitter.'" target="_blank"><img src="'.$img_twitter.'" alt="twitter"></a>';
        }
        else{
            $linktwitter = "";
        }

        //Instagram
        if ($rss_instagram != "") {
            $img_instagram = "https://navike21.com/wp-content/uploads/2018/03/instagram.svg";
            $linkinstagram = '<a href="'.$rss_instagram.'" target="_blank"><img src="'.$img_instagram.'" alt="instagram"></a>';
        }
        else{
            $linkinstagram = "";
        }

        //Linkedin
        if ($rss_linkedin != "") {
            $img_linkedin = "https://navike21.com/wp-content/uploads/2018/03/linkedin.svg";
            $linklinkedin = '<a href="'.$rss_linkedin.'" target="_blank"><img src="'.$img_linkedin.'" alt="linkedin"></a>';
        }
        else{
            $linklinkedin = "";
        }
    }

    $rss = $linklinkedin.$linktwitter.$linkinstagram.$linkfacebook;

	echo '	<main id="under_construction" class="section_middle_center w_100 full_min_h" style="background-image: url('.$url_img_destacada.')">
				<section class="w_85 align_left">
					<div class="logo">'.$logo_principal.'</div>
					<div class="section_top_right">';
						the_content();
	echo'			</div>
                    <aside class="section_middle_right">
                    '.$rss.'
                    </aside>
				</section>
			</main>';
	get_footer(); // Obtener el Footer del web site
?>
