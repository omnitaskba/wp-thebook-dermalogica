<?php

    $pim_subtitle = get_field('pim_subtitle');
    $tID = get_post_thumbnail_id(get_the_ID());

    $product_use = get_the_terms( $post->ID, 'product_use' );
    $product_system = get_the_terms( $post->ID, 'product_system' );
    $product_type = get_the_terms( $post->ID, 'product_type' );

?>

<div class="h-[160px] bg-primary-dark"></div>

<div class="container">

    <div class="py-10 lg:py-20">
        <?php
            if(isset($_GET['type']) && $_GET['type']==='professional'){
                echo '<a href="'.get_term_link($product_system[0]->term_id, 'product_system').'" class="text-secondary font-helvetica35">'.$product_system[0]->name.'</a> <i class="icon-chevron-right mx-3 text-xs"></i> <span class="text-primary-light font-helvetica75">'.get_the_title().'</span>';
            }
        ?>
    </div>


    <div class="flex justify-between items-center flex-wrap">

        <div class="w-full md:w-2/5 mb-10 md:mb-0">
            <a href="<?php echo wp_get_attachment_image_url($tID, 'max', ''); ?>" class="zoom">
            <?php
                if($tID){
                    echo wp_get_attachment_image($tID, 'large', '');
                }else{
                    echo wp_get_attachment_image(1313, 'large', '', array( "style"=>"opacity:0.3;"));
                }
            ?>
            </a>
        </div>

        <div class="w-full md:w-3/5">
            <?php
                if($product_type){
                    $types = array();
                    foreach ($product_type as $tp) {
                        $types []= $tp->name;
                    }
                    echo '<p class="uppercase text-xs tracking-[0.25em] font-helvetica75">'.implode(' | ', $types).'</p>';
                }
            ?>
            <h2 class="font-helvetica75 mt-10"><?php the_title(); ?></h2>
            <?php if($pim_subtitle != ''){ ?><p class="font-helvetica75 text-[20px]"><?php echo $pim_subtitle; ?></p><?php } ?>
            <div class="font-helvetica35 mt-10"><?php the_content(); ?></div>
        </div>

    </div>


    <?php 
        // Recommended or prescribed products
        get_template_part( 'partials/product', 'accordions' ); 
    ?>

    <?php 
        // Recommended or prescribed products
        get_template_part( 'partials/product', 'recommend' ); 
    ?>

    <?php 
        // Prev/next links
        get_template_part( 'partials/product', 'prevnext' ); 
    ?>

</div>




<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "product",
  "brand": {
    "@type": "Thing",
    "name": "Dermalogica"
  },
  "sku": "<?php echo get_the_ID(); ?>",
  "gtin8": "derm_<?php echo get_the_ID(); ?>",
  "name": "<?php echo get_the_title(); ?>",
  "image": "<?php echo wp_get_attachment_image_url($tID, 'max', ''); ?>",
  "description": "<?php echo _stringLimit(get_the_excerpt(), 100); ?>",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "reviewCount": "5"
  }
}
 </script>