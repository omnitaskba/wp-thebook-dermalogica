<?php

get_header();

if(is_user_logged_in()) {

// $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$count = $GLOBALS['wp_query']->found_posts

?>


<div class="topPageIngredients flex-col jus" >
    <div class="container flex flex-col justify-between items-start">
        <h2  class="mr-10"><?php the_title(); ?></h2>
        <p class="container mt-2 text-left font-helvetica35">
            <?php the_content(); ?>
        </p>
        <a href="/ingredients/" class="button secondary rounded-full mt-5"><?php _e('Back', '_custom'); ?></a>
    </div>
</div>


<div class="container">

    <?php
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $loop = new WP_Query(
            array(
                'post_type' => 'product',
                'posts_per_page' => get_option('posts_per_page'),
                'paged' => $paged,
                'post_status' => 'publish',
                'meta_query' => array(
                    array(
                        'key' => 'pim_ingredients_relation', // name of custom field
                        'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                ),
                'orderby' => 'date' // modified | title | name | ID | rand
            )
        );
    ?>
    <p class="mt-10 font-helvetica35 text-sm">Showing <?php echo $loop->found_posts; ?> products with <strong>"<?php the_title(); ?>"</strong></p>
    <div class="productArchive">
    <div class="grid grid-cols-1 md:grid-cols-3 search-filter-results">
      <?php
        if($loop->have_posts()){
            while ($loop->have_posts()){
                $loop->the_post();
                $tID = get_post_thumbnail_id(get_the_ID());
                get_template_part( 'partials/loop', get_post_type() );
            }
            echo '<div class="col-12 text-center p-0">'; _pagination('page-pagination', $loop); echo '</div>';
        }
        wp_reset_postdata();
      ?>
    </div>
    </div>

</div>


<?php
}else{
  echo lockedContent('Ingredients', false);
}
?>

<?php get_footer(); ?>
