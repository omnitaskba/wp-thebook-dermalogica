<?php get_header(); ?>

<div class="flex flex-1 h-full justify-center items-center text-white flex-col bg-primary-dark px-4 text-center pt-40">

  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.svg" alt="" class="logo mb-3" />
  <h1><?php _e('404 not found.', '_custom'); ?></h1>
  <p class="mt-5 mb-20"><?php _e('Sorry, this page can’t be found.', '_custom'); ?></p>
  <a href="/" class="button secondary rounded-full"><?php esc_html_e( 'Back to homepage', '_custom' ); ?></a>

</div>

<?php get_footer(); ?>
