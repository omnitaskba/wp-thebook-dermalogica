<?php get_header(); ?>


<div class="topPage">
    <div class="bg"></div>
    <div style="background-image: url(/wp-content/uploads/2022/09/retail-1.jpeg);" class="image"></div>
    <div class="container">
        <h4>Search results for:</h4>
        <h2>"<?php echo @$_GET['s']; ?>"</h2>
        <?php /*
        <a href="/" class="mt-2 logoPro">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.svg" alt=""/>
        </a>
        */ ?>
    </div>
</div>

<div class="productArchive">
    <div class="container">
        <div class="search-filter-results">
            <div class="grid grid-cols-2 md:grid-cols-3 realtive z-[7]">
            <?php
                if(have_posts()){
                    while (have_posts()){
                        the_post();
                        get_template_part( 'partials/loop', get_post_type() );
                    }
                }else{
                    echo '
                        <p>
                            <strong>No content in this loop...</strong>
                        </p>
                    ';
                }
            ?>
            </div>

            <?php echo _pagination('page-pagination'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
