<?php

    /*
    * Template name: Flexible
    * Template Post Type: page
    */
    global $post;


    get_header();

    if ( ! post_password_required( $post ) ) {
        get_template_part( 'partials/acf' );
    }else{
        // we will show password form here
        echo get_the_password_form();
    }
    
    get_footer();
  
?>