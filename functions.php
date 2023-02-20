<?php


if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}



if ( ! function_exists( '_setup' ) ) :
	function _setup() {
		load_theme_textdomain( 'cs_theme' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'small', 100, 100 );
		add_image_size( 'default', 1080, 1080 );
		add_image_size( 'max', 1920, 1920 );

		// This theme uses wp_nav_menu() in one location
		register_nav_menus(array(
        'main-menu' => esc_html__('Main menu', 'cs_theme'),
        'footer-menu' => esc_html__('Footer menu', 'cs_theme')
    ));

	}
endif; // blank_setup
add_action( 'after_setup_theme', '_setup' );




function _assets() {

	$template_url = get_template_directory_uri();

	// Main JS script
	wp_register_script('maginfic-script', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), '', true );
	wp_enqueue_script('maginfic-script');
	wp_register_style('maginfic-style', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', '', '123');
  	wp_enqueue_style('maginfic-style');

	// Main JS script
	wp_register_script('main-script', $template_url . '/scripts.js', array('jquery'), '', true );
	wp_enqueue_script('main-script');
	
	// Main style
	wp_register_style( 'dist-style', $template_url . '/dist/output.css', '', '123' );
  	wp_enqueue_style('dist-style');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', '_assets' );


// 
// 
function _get_query_paged() {
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
   $page = ( get_query_var('page') ) ? get_query_var('page') : 1;
   return ( $paged > $page ) ? $paged : $page;
}


// 
// 
function _pagination( $class = 'page-pagination', $query = null ) {

  global $wp_query;

  if ( !$query ) {
      $query = $wp_query;
  }

  $paged      = _get_query_paged();
  $total_page = $query->max_num_pages;
  $big        = 999999999;

  $args = array(
      'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'  => '?paged=%#%',
      'current' => max( 1, $paged ),
      'total'   => $total_page,
      'type'		=> 'array',
      'prev_text' => '<i class="icon-chevron-left"></i>',
      'next_text' => '<i class="icon-chevron-right"></i>',
  );

  $pages = paginate_links( $args );

  if( is_array( $pages ) ) {
      $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
      echo '<div class="'.$class.'"><ul>';
      foreach ( $pages as $page ) {
        echo "<li>$page</li>";
      }
      echo '</ul></div>';
  }

}




// 
// 
function _stringLimit($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}



// 
// 
function lockedContent($title, $accordion=true){
	if($accordion){
		return '
        <div class="locked">
            <div>
                <p>
                        Light-diffusing technology begins to balance the appearance of uneven pigmen- tation after one use, and continues working over time with potent Niacinamide and Hexylresor- cinol to help fade dark spots. Skin care powerhouse Shiitake Mushroom – rich in beta glucans – brightens skin, while adaptogenic Ashwagandha smoothes and delivers antioxidant benefits. Black Currant Oil and Peony Flower help boost skin’s natural luminosity. Skin-shielding actives help protect against pollution-induced dark spots.
                </p>
                <p class="hidden md:block">
                        Light-diffusing technology begins to balance the appearance of uneven pigmen- tation after one use, and continues working over time with potent Niacinamide and Hexylresor- cinol to help fade dark spots. Skin care powerhouse Shiitake Mushroom – rich in beta glucans – brightens skin, while adaptogenic Ashwagandha smoothes and delivers antioxidant benefits. Black Currant Oil and Peony Flower help boost skin’s natural luminosity. Skin-shielding actives help protect against pollution-induced dark spots.
                </p>
            </div>
            <div class="lockedContent">
                <h3>For Professionals Only</h3>
                <p class="mt-2 mb-6">Please sign-in or create an acccount to view this information.</p>
                <div class="flex justify-center items-center gap-4">
                    <a href="'.do_shortcode('[openid_connect_generic_auth_url]').'" class="button secondary rounded-full">sign in</a>
                    <a href="'.do_shortcode('[openid_connect_generic_auth_url]').'" class="button outline secondary rounded-full">create account</a>
                </div>
            </div>
        </div>
		';
	}else{
		return '
            <div class="w-full h-[160px] bg-primary-dark">
                <div class="bg"></div>
            </div>
            <div class="relative flex flex-1 h-full justify-center items-center">
                <div class="container text-center py-5">
                    <div class="locked">
                        <div>
                            <p>
                                    Light-diffusing technology begins to balance the appearance of uneven pigmen- tation after one use, and continues working over time with potent Niacinamide and Hexylresor- cinol to help fade dark spots. Skin care powerhouse Shiitake Mushroom – rich in beta glucans – brightens skin, while adaptogenic Ashwagandha smoothes and delivers antioxidant benefits. Black Currant Oil and Peony Flower help boost skin’s natural luminosity. Skin-shielding actives help protect against pollution-induced dark spots.
                            </p>
                            <p>
                                    Light-diffusing technology begins to balance the appearance of uneven pigmen- tation after one use, and continues working over time with potent Niacinamide and Hexylresor- cinol to help fade dark spots. Skin care powerhouse Shiitake Mushroom – rich in beta glucans – brightens skin, while adaptogenic Ashwagandha smoothes and delivers antioxidant benefits. Black Currant Oil and Peony Flower help boost skin’s natural luminosity. Skin-shielding actives help protect against pollution-induced dark spots.
                            </p>
                        </div>
                        <div class="lockedContent">
                            <h3>For Professionals Only</h3>
                            <p class="mt-2 mb-6">Please sign-in or create an acccount to view this information.</p>
                            <div class="flex justify-center items-center gap-4">
                                <a href="'.do_shortcode('[openid_connect_generic_auth_url]').'" class="button secondary rounded-full">sign in</a>
                                <a href="'.do_shortcode('[openid_connect_generic_auth_url]').'" class="button outline secondary rounded-full">create account</a>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		';
	}
}


function _lockshortocode( $atts ){
	return lockedContent('Locked content', false);
}
add_shortcode( 'lock', '_lockshortocode' );


// 
// 
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


// 
// Disable SSL verify
add_filter('https_ssl_verify', '__return_false');


// 
// 
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/ACF';

    // return
    return $path;

}


//
// 
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/ACF';

    // return
    return $paths;

}



?>
