<?php

    $prescribedItem = [];
    $prescribedProducts = get_field('pim_prescribed_products');
    if($prescribedProducts && count($prescribedProducts)){
        $i = 0;
        foreach ($prescribedProducts as $rp) {
            $i++;
            if($i<3){
                $tRPID = get_post_thumbnail_id($rp->ID);
                $prescribedItem []= '
                    <div class="item last:rounded-r-md  w-1/2 md:w-1/3 max-w-[50%] md:max-w-[33.333%] ">
                        <a href="'.get_the_permalink($rp->ID).'">
                        '.wp_get_attachment_image($tRPID, 'medium', '', array( "object-fit" => "contain" )).'
                            <div class="flex justify-center items-center">
                                <div class="button secondary rounded-lg">'.get_the_title($rp->ID).'</div>
                            </div>
                        </a>
                    </div>
                ';
            }
        }
    }


    $recommendedItem = [];
    $recommendedProducts = get_field('pim_top_recommended_products');
    if($recommendedProducts && count($recommendedProducts)){
        $i = 0;
        foreach ($recommendedProducts as $rp) {
            $i++;
            if($i<3){
                $tRPID = get_post_thumbnail_id($rp->ID);
                $recommendedItem []= '
                    <div class="border-[1px] border-primary-light border-opacity-10 w-1/2 md:w-1/3 max-w-[50%] md:max-w-[33.333%]">
                        <a href="'.get_the_permalink($rp->ID).'">
                        '.wp_get_attachment_image($tRPID, 'medium', '', array( "object-fit" => "contain" )).'
                        <div class="flex justify-center items-center">
                            <div class="button secondary rounded-lg">'.get_the_title($rp->ID).'</div>
                        </div>
                        </a>
                    </div>
                ';
            }
        }
    }

?>


<?php if(count($prescribedItem)>0 || count($recommendedItem)>0){ ?>
<div class="productArchive my-10 lg:my-20">
    <div class="flex flex-row justify-start flex-wrap search-filter-results rounded-md overflow-hidden">
        <div class="flex flex-col overflow-hidden md:rounded-l-md min-w-full md:min-w-[33.333%] max-w-full md:max-w-[33.333%] h-full">
            <div style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/image2.jpg');" class="flex flex-1 bg-center bg-cover min-h-[200px] md:min-h-[340px]"></div>
            <div class="bg-primary-dark text-white p-6 text-center font-helvetica75">
                retail this product with: 
            </div>
        </div>
        <?php 
            if(count($prescribedItem)>0){ 
                echo implode('',$prescribedItem);
            }else if(count($recommendedItem)>0){
                echo implode('',$recommendedItem);
            }
        ?>
    </div>
</div>
<?php } ?>