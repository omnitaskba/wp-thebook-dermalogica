<?php

    $pim_subtitle = get_field('pim_subtitle');
    $tID = get_post_thumbnail_id(get_the_ID());

    $product_use = get_the_terms( $post->ID, 'product_use' );
    $product_system = get_the_terms( $post->ID, 'product_system' );
    $product_type = get_the_terms( $post->ID, 'product_type' );
    $theSizes = array();


    if( have_rows('pim_sizes') ){
        $i=0;
        while ( have_rows('pim_sizes') ){
            the_row(); $i++;
            $isActiveSize = get_sub_field('pim_sizes_active');
            if(get_sub_field('pim_sizes_metric_size') && $isActiveSize) {
                $theSizes []= array(get_sub_field('pim_sizes_type'), '<a class="taglink mr-1 mb-1 '.(get_sub_field('pim_sizes_recommended_size')==true ? 'active' : '').'" href="#">'.get_sub_field('pim_sizes_metric_size').'</a>', '<a class="taglink mr-1 mb-1 '.(get_sub_field('pim_sizes_recommended_size')==true ? 'active' : '').'" href="#">'.get_sub_field('pim_sizes_imperial_size').'</a>');
            }
        }
    }

?>

<div class="h-[160px] bg-primary-dark"></div>

<div class="container">

    <div class="py-10 lg:py-20 hidden lg:block">
        <?php
            if(isset($_GET['type']) && $_GET['type']==='professional' && isset($product_system[0])){
                echo '<a href="'.get_term_link($product_system[0]->term_id, 'product_system').'" class="text-secondary font-helvetica35">'.$product_system[0]->name.'</a> <i class="icon-chevron-right mx-3 text-xs"></i> <span class="text-primary-light font-helvetica75">'.get_the_title().'</span>';
            }else{
                echo '<a href="/" class="text-secondary font-helvetica35">homepage</a> <i class="icon-chevron-right mx-3 text-xs"></i> <span class="text-primary-light font-helvetica75">'.get_the_title().'</span>';
            }
        ?>
    </div>


    <div class="flex justify-between items-center flex-wrap pt-10 lg:pt-0">

        <div class="w-full md:w-2/5 mb-10 md:mb-0">
            <?php

                $tIDpro = null;
                if(isset($_GET['type']) && $_GET['type']==='professional'){
                    if( have_rows('pim_sizes', get_the_ID()) ){
                        while ( have_rows('pim_sizes', get_the_ID()) ){
                            the_row();
                            if(get_sub_field('pim_sizes_type')==='Professional') {
                                $img = get_sub_field('pim_sizes_image');
                                if(isset($img['ID'])){
                                    $tIDpro = $img['ID'];
                                    break;
                                }
                            }
                        }
                    }
                }

                if($tID || $tIDpro){
                    if($tID){
                        echo '<a href="'.wp_get_attachment_image_url($tID, 'max', '').'" class="zoom hidden-m img-retail" '.($tIDpro ? 'style="display:none"' : '').'>';
                        echo wp_get_attachment_image($tID, 'large', '');
                        echo '</a>';
                    }
                    if($tIDpro){
                        echo '<a href="'.wp_get_attachment_image_url($tIDpro, 'max', '').'" class="zoom hidden-m img-professional">';
                        echo wp_get_attachment_image($tIDpro, 'large', '');
                        echo '</a>';
                    }
                }else{
                    echo '<a href="'.wp_get_attachment_image_url(1313, 'max', '').'" class="zoom hidden-m">';
                    echo wp_get_attachment_image(1313, 'large', '', array( "style"=>"opacity:0.3;"));
                    echo '</a>';
                }
            ?>
            
        </div>

        <div class="w-full md:w-3/5">
            <?php
                if($product_type){
                    $types = array();
                    foreach ($product_type as $tp) {
                        $types []= '<a href="#" class="switch-from-'.$tp->slug.'">'.$tp->name.'</a>';
                    }
                    echo '<p class="uppercase text-xs tracking-[0.25em] font-helvetica55">'.implode(' | ', $types).'</p>';
                }
            ?>
            <h2 class="font-helvetica75 mt-10"><?php the_title(); ?></h2>
            <?php if($pim_subtitle != ''){ ?><p class="font-helvetica75 text-[20px]"><?php echo $pim_subtitle; ?></p><?php } ?>
            
            <?php 
                if($tID || $tIDpro){
                    if($tID){
                        echo '<a href="'.wp_get_attachment_image_url($tID, 'max', '').'" class="zoom hidden-d img-retail" '.($tIDpro ? 'style="display:none"' : '').'>';
                        echo wp_get_attachment_image($tID, 'large', '');
                        echo '</a>';
                    }
                    if($tIDpro){
                        echo '<a href="'.wp_get_attachment_image_url($tIDpro, 'max', '').'" class="zoom hidden-d img-professional">';
                        echo wp_get_attachment_image($tIDpro, 'large', '');
                        echo '</a>';
                    }
                }else{
                    echo '<a href="'.wp_get_attachment_image_url(1313, 'max', '').'" class="zoom hidden-d mt-10">';
                    echo wp_get_attachment_image(1313, 'large', '', array( "style"=>"opacity:0.3;"));
                    echo '</a>';
                }
            ?>
            
            <div class="tabs">
                <ul>
                    <li><a href="#t1" class="active">description</a></li>
                    <li><a href="#t2">category</a></li>
                    <?php if( have_rows('pim_sizes') ){ ?><li><a href="#t3">sizes</a></li><?php } ?>
                </ul>
                <div id="t1" class="content active">
                    <div class="font-helvetica35 mt-6"><?php the_content(); ?></div>
                </div>
                <div id="t2" class="content">
                    <div class="font-helvetica35 mt-6">
                        <?php
                            if($product_use){
                                foreach ($product_use as $pu) {
                                  echo '<h4 class="font-helvetica75"><a href="'.get_term_link($pu->term_id, 'product_use').'" class="no-decoration">'.$pu->name.'</a></h4>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div id="t3" class="content">
                    <div class="mt-6 max-w-md">
                    <?php
                        if(count($theSizes)>0){
                            echo '
                                <div class="flex justify-between items-start my-10">
                                    <h4 class="font-helvetica75">'.__('product sizes','_custom').'</h4>
                                    <div class="packageSwitch">
                                        <a href="#" class="active" data-id="imperial">oz.</a>
                                        <a href="#" data-id="metric">ml.</a>
                                    </div>
                                </div>
                            ';
                            echo '<table>';
                            foreach($theSizes as $size){
                                echo '<tr>';
                                echo '<td>'.$size[0].'</td>';
                                echo '<td><span class="packageSwitchContent imperial">'.$size[2].'</span><span class="packageSwitchContent metric hidden">'.$size[1].'</span></td>';
                                echo '<tr/>';
                            }
                            // echo implode(' ',$theSizes);
                            echo '</table>';
                        }
                    ?>
                    </div>
                </div>
            </div>
            
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