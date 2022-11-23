<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php wp_head(); ?>
</head>
<body <?php body_class('d-flex flex-column'); ?>>


    <header class="header">
        <div class="container flex justify-between items-center w-full">
            
            <!-- <a href="/" class="logo">the book</a> -->
            <a href="/" class="logoPro">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.svg" alt=""/>
        </a>

            <div class="navContainer">
                <a href="#" class="open">
                    <span>menu</span>
                    <i class="icon-burger"></i>
                </a>
            </div>

        </div>
    </header>


    <div class="mainNavigation">
        <div>
            <div class="flex justify-between items-center max-w-[360px] w-full py-6 lg:py-20 px-10">
                <a href="/" class="logo">the book</a>
                <a href="#" class="close"><i class="icon-close"></i></a>
            </div>
            <?php
                wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'container' => false
                )
                );
            ?>
        </div>
        <div>
            <?php if(is_user_logged_in()) { ?>
                <a href="<?php echo do_shortcode('[openid_connect_generic_auth_url]'); ?>" class="button rounded-full">sign out</a>
            <?php } else { ?>
                <a href="<?php echo wp_logout_url('/'); ?>" class="button rounded-full">sign in</a>
            <?php } ?>
        </div>
    </div>


    <div class="mainContent">
