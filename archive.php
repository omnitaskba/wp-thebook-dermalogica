<?php get_header(); ?>


<div class="topPage">
    <div class="bg"></div>
    <!-- <div style="background-image:url('<?php echo $toppage_image['sizes']['max']; ?>')" class="image"></div> -->
    <div class="container">
        <h2><?php echo get_the_archive_title(); ?></h2>
        <a href="/" class="mt-2 logoPro">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.svg" alt=""/>
        </a>
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

            <?php echo _pagination('page-pagination', $query); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
