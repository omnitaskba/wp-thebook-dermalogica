<?php

   

?>

<div class="h-[160px] bg-primary-dark"></div>

<div class="container">

    <div class="py-10 lg:py-14">
        <h2><?php the_title(); ?></h2>
        <?php
            // if(isset($_GET['type']) && $_GET['type']==='professional' && isset($product_system[0])){
            //     echo '<a href="'.get_term_link($product_system[0]->term_id, 'product_system').'" class="text-secondary font-helvetica35">'.$product_system[0]->name.'</a> <i class="icon-chevron-right mx-3 text-xs"></i> <span class="text-primary-light font-helvetica75">'.get_the_title().'</span>';
            // }else{
            //     echo '<a href="/" class="text-secondary font-helvetica35">homepage</a> <i class="icon-chevron-right mx-3 text-xs"></i> <span class="text-primary-light font-helvetica75">'.get_the_title().'</span>';
            // }
        ?>
    </div> 

</div>

<?php get_template_part( 'partials/acf' ); ?>