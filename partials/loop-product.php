<?php

    $fID = isset($args['fID']) ? $args['fID'] : 0;

    $tID = get_post_thumbnail_id(get_the_ID());
    $type = $fID==1295 ? 'professional' : 'retail';

    if($fID==1295){
        // $alternateImage = get_field('pim_alternate_professional_image', get_the_ID());
        // if(isset($alternateImage['ID'])){
        // 	$tID = $alternateImage['ID'];
        // }


        $sizes = get_field('pim_sizes', get_the_ID());
        if(count($sizes)){
            foreach($sizes as $size){
                if($size['pim_sizes_type']=='Professional'){
                    if(isset($size['pim_sizes_image']['ID'])){
                        // print_r($size['pim_sizes_image']['ID']);
                        $tID = $size['pim_sizes_image']['ID'];
                        break;
                    }
                }
            }
        }

    }
?>

<div class="item">
    <a href="<?php the_permalink(); ?>?type=<?php echo $type; ?>">
    <?php
            if($tID){
                echo wp_get_attachment_image($tID, 'x600', '', array( "object-fit" => "contain" ));
            }else{
                echo wp_get_attachment_image(1313, 'x600', '', array( "style"=>"opacity:0.3;", "object-fit" => "contain" ));
            }
        ?>
    <div class="title"><?php the_title(); ?></div>
    </a>
</div>