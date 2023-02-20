<?php



// if( have_rows('hc_items') ){
//   $i=0;
//   while ( have_rows('hc_items') ){
//     the_row(); $i++;
//
//     $hc_i_image = get_sub_field('hc_i_image');
//
//     echo '
//       <div style="background:url('.$hc_i_image['sizes']['max'].');"></div>';
//   }
// }

if( have_rows('flexible_content') ):
    while ( have_rows('flexible_content') ) : the_row();

      if( get_row_layout() == 'spacer' ):

        $s_desktop = get_sub_field('s_desktop');
        $s_tablet = get_sub_field('s_tablet');
        $s_mobile = get_sub_field('s_mobile');
        $s_rand = mt_rand(0000,9999);

    ?>
    <!--  -->
    <style>
      .spacer#spacer<?php echo $s_rand; ?>{
        height: <?php echo $s_desktop; ?>px;
      }
      @media(max-width:991){
        .spacer#spacer<?php echo $s_rand; ?>{
          height: <?php echo $s_tablet; ?>px;
        }
      }
      @media(max-width:767){
        .spacer#spacer<?php echo $s_rand; ?>{
          height: <?php echo $s_mobile; ?>px;
        }
      }
    </style>
    <div class="spacer" id="spacer<?php echo $s_rand; ?>"></div>
    <!--  -->
    

    <?php

      elseif( get_row_layout() == 'homepage' ):

        $home_title = get_sub_field('home_title');
        $home_subtitle = get_sub_field('home_subtitle');

    ?>
    <div style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/image1.jpg');" class="homeBlock">
      <div class="vimeoVideo"> 
      <iframe src="https://player.vimeo.com/video/750561348?h=fff8d18180&background=1" width="100%" height="564" frameborder="0" allow="autoplay; fullscreen; background" allowfullscreen></iframe>
      </div>
    <div class="container realtive z-[1] homepage">
      <div class="w-full max-w-2xl mx-auto">
            <?php 
                if($home_title != ''){
                    echo '<h1>'.$home_title.'</h1>';
                }
            ?>
            <?php 
                if($home_subtitle != ''){
                    echo '<p>'.$home_subtitle.'</p>';
                }
            ?>
            <div class="w-full mt-10">
            <?php echo do_shortcode('[wd_asp id=1]'); ?>
            </div>
      </div>
    </div>
    </div>


    <?php

      elseif( get_row_layout() == 'top_page' ):

        $toppage_image = get_sub_field('toppage_image');
        $toppage_title = get_sub_field('toppage_title');

    ?>
    <div class="topPage">
        <div class="bg"></div>
        <div style="background-image:url('<?php echo $toppage_image['sizes']['max']; ?>')" class="image"></div>
        <div class="container">
            <h2><?php echo $toppage_title; ?></h2>
            <?php /*
            <a href="/" class="mt-2 logoPro">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.svg" alt=""/>
            </a>
            */ ?>
        </div>
    </div>


    <?php

      elseif( get_row_layout() == 'page_tabs' ):

        if( have_rows('pt_items') ){
          $i=0;
          echo '<div class="tabs" data-js="false"><div class="tabs-nav">';
          while ( have_rows('pt_items') ){
            the_row(); $i++;

            $pt_i_title = get_sub_field('pt_i_title');
            $pt_i_link = get_sub_field('pt_i_link');
            $pt_i_active = get_sub_field('pt_i_active');

            echo '<a href="'.$pt_i_link.'" '.($pt_i_active ? 'class="active"' : '').' data-id="t1">'.$pt_i_title.'</a>';
          }
          echo '</div></div>';
        }

    ?>

    <?php

      elseif( get_row_layout() == 'accordions' ):

        if( have_rows('accordions_items') ){
          $i=0;
          echo '<div class="container"><div class="accordions">';
          while ( have_rows('accordions_items') ){
            the_row(); $i++;

            $accordions_i_title = get_sub_field('accordions_i_title');
            $accordions_i_content = get_sub_field('accordions_i_content');

            echo '
            <div class="item">
              <a href="#" class="title">
                <span>'.$accordions_i_title.'</span>
                <div>
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
              </a>
              <div class="content">
                '.$accordions_i_content.'
              </div>
            </div>
            ';
          }
          echo '</div></div>';
        }

    ?>

    <?php

      elseif( get_row_layout() == 'block_with_image_left' ):

        $bwil_image = get_sub_field('bwil_image');
        $bwil_overtitle = get_sub_field('bwil_overtitle');
        $bwil_title = get_sub_field('bwil_title');
        $bwil_subtitle = get_sub_field('bwil_subtitle');
        $bwil_text = get_sub_field('bwil_text');
        $bwil_button = get_sub_field('bwil_button');

    ?>
    <div class="container">
        <div class="block_with_image_left">
          <div>

          </div>
          <div class="bgImage s100" style="background:url('<?php echo $bwil_image['sizes']['large']; ?>')"></div>
        </div>
    </div>


    
    <div class="container">
      <div class="row d-flex align-items-center py-5">
        <div class="col-lg-6 my-3">
          <div class="bgImage s100" style="background:url('<?php echo $bwil_image['sizes']['large']; ?>')"></div>
        </div>
        <div class="col-lg-6 my-3">
          <div class="px-lg-5">
            <?php if($bwil_overtitle != ''){ ?>
              <p class="uppercase bold small mb-0"><?php echo $bwil_overtitle; ?></p>
            <?php } ?>
            <?php if($bwil_title != ''){ ?>
              <h2 class="font-secondary"><?php echo $bwil_title; ?></h2>
            <?php } ?>
            <?php if($bwil_subtitle != ''){ ?>
              <p class="text-black-50 py-3"><?php echo $bwil_subtitle; ?></p>
            <?php } ?>
            <?php echo $bwil_text; ?>
            <?php if($bwil_button){ ?>
              <a href="<?php echo $bwil_button['url']; ?>" <?php if($bwil_button['target']=='_blank'){ echo 'target="_blank"'; } ?> class="button underline mt-4"><span><?php echo $bwil_button['title']; ?></span> &rarr;</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <?php

      elseif( get_row_layout() == 'products_archive' ):

        $product_archive_filter_shortcode = get_sub_field('product_archive_filter_shortcode');
        $product_archive_result_shortcode = get_sub_field('product_archive_result_shortcode');

    ?>
    <div class="productArchive">
        <div class="container">

            <div class="filter">
                <?php echo do_shortcode($product_archive_filter_shortcode); ?>
            </div>
            <?php echo do_shortcode($product_archive_result_shortcode); ?>

        </div>
    </div>

    <?php

      elseif( get_row_layout() == 'ingredients_index' ):


        if(is_user_logged_in()) {

        $loop = new WP_Query(
          array(
            'post_type' => 'ing',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'order'=>'asc',
            'orderby' => 'name' // modified | title | name | ID | rand
          )
        );
        $array = array();
        if($loop->have_posts()){
          while ($loop->have_posts()){
            $loop->the_post();
            $first_letter = strtoupper(mb_substr(get_the_title(), 0, 1, "UTF-8"));
            $array[$first_letter][] = '<h5 class="font-helvetica75"><a href="'.get_the_permalink().'" class="hover:text-secondary">'.get_the_title().'</a></h5><div class="font-helvetica35">'.get_the_content().'</div>';
          }
        }
        wp_reset_postdata();

    ?>
    <!--  -->
    <div class="topPageIngredients d-flex align-items-center justify-content-center" >
      <div class="container">
        <h2  class="mb-10">Ingredient index</h2>
	      <?php echo do_shortcode('[wd_asp id=2]'); ?>
      </div>
    </div>
    <!--  -->
    <div class="container">
      <div class="productIngredientsABC">
        <?php
          if(count($array)>0){
            echo '<div class="navs">';
            foreach($array as $key=>$value){
              echo '<a href="#scrollto_'.$key.'">'.$key.'</a>';
            }
            echo '</div>';
          }
        ?>
        <div class="grid grid-cols-1 gap-4">
        <?php
          if(count($array)>0){
            foreach($array as $key=>$value){
              echo '<div class="row py-4" id="scrollto_'.$key.'">';
              echo '<h2>'.$key.'</h2>';
              foreach($value as $item){
                echo '<div class="col-md-6 col-lg-4 py-4">'.$item.'</div>';

              }
              echo '</div>';
            }
          }
        ?>
        </div>
      </div>
    </div>

    <?php
      }else{
        echo lockedContent('Ingredients', false);
      }
    ?>

    <?php

      elseif( get_row_layout() == 'new_product' ):

        $np_image = get_sub_field('np_image');
        $np_overtitle = get_sub_field('np_overtitle');
        $np_title = get_sub_field('np_title');
        $np_subtitle = get_sub_field('np_subtitle');
        $nop_link = get_sub_field('nop_link');
        $np_badge_text = get_sub_field('np_badge_text');
        $np_badge_color = get_sub_field('np_badge_color');

    ?>
    <div class="container">
      <div class="new_product">
        <div class="content">
          <?php if($np_overtitle != ''){ echo '<h5>'.$np_overtitle.'</h5>'; } ?>
          <?php if($np_title != ''){ echo '<h2 class="font-helvetica75">'.$np_title.'</h2>'; } ?>
          <?php if($np_subtitle != ''){ echo '<h3 class="font-helvetica35 mb-10">'.$np_subtitle.'</h3>'; } ?>
          <?php if($nop_link){ echo '<a href="'.$nop_link['url'].'" '.($nop_link['target']=='_blank' ? 'target="_blank"' : '').' class="font-helvetica75 uppercase text-xs tracking-widest underline underline-offset-8">'.$nop_link['title'].'</a>'; } ?>
        </div>
        <?php echo wp_get_attachment_image($np_image['ID'], 'large', ''); ?>
          <?php if($np_badge_text != ''){ echo '<div class="badge" style="background-color:'.$np_badge_color.';">'.$np_badge_text.'</div>'; } ?>
      </div>
    </div>

    <?php

      elseif( get_row_layout() == 'default_content' ):

        $dc_content = get_sub_field('dc_content');

    ?>
    <div class="container innerContent"><?php echo $dc_content; ?></div>

    <?php

      elseif( get_row_layout() == 'professional_service_block' ):

        $tID = get_post_thumbnail_id(get_the_ID());
        $psb_download_title = get_sub_field('psb_download_title');
        $psb_download_file = get_sub_field('psb_download_file');

    ?>
    <div class="container mb-10">
      <div class="flex flex-col lg:flex-row items-start professional_service_block">

        <div class="w-full lg:w-1/4 lg:pr-10">
          <div class="flex flex-col gap-6 justify-between items-start bg-primary-light text-white rounded-lg overflow-hidden">
            <div class="p-6">
              <?php
                if( have_rows('psb_left_column') ){
                  $i=0;
                  while ( have_rows('psb_left_column') ){
                    the_row(); $i++;
                
                    $psb_lc_type = get_sub_field('psb_lc_type');
                    $psb_lc_maintitle = get_sub_field('psb_lc_maintitle');

                    if($psb_lc_type=='repeater'){
                      if( have_rows('psb_lc_repeater') ){
                        $i=0;
                        while ( have_rows('psb_lc_repeater') ){
                          the_row(); $i++;
                      
                          $psb_lc_title = get_sub_field('psb_lc_title');
                          $psb_lc_content = get_sub_field('psb_lc_content');
                      
                          echo '<div class="pb-4">
                          <p><strong>'.$psb_lc_title.'</strong></p>
                          '.$psb_lc_content.'
                          </div>';
                        }
                      }
                    }


                    if($psb_lc_type=='title'){
                      echo '<h4 class="mb-4">'.$psb_lc_maintitle.'</h4>';
                    }


                    if($psb_lc_type=='line'){
                      echo '<hr/>';
                    }
                
                  }
                }
              ?>
            </div>
            <div class="bg-primary-dark">
              <?php echo wp_get_attachment_image($tID, 'large', ''); ?>
            </div>
          </div>
          <?php if($psb_download_file){ ?>
            <div class="my-6 text-right">
              <?php if($psb_download_title != ''){ echo '<h3 class="font-helvetica35">'.$psb_download_title.'</h3>'; } ?>
              <a href="<?php echo $psb_download_file['url']; ?>" class="font-helvetica75">download &rarr;</a>
            </div>
          <?php } ?>
        </div>

        <div class="w-full lg:w-3/4 mt-10 lg:mt-0">
          <?php
              if( have_rows('psb_right_column') ){
                $i=0;
                while ( have_rows('psb_right_column') ){
                  the_row(); $i++;
              
                  $psb_rc_type = get_sub_field('psb_rc_type');
                  $psb_rc_maintitle = get_sub_field('psb_rc_maintitle');

                  if($psb_rc_type=='repeater'){
                    if( have_rows('psb_rc_repeater') ){
                      $i=0;
                      while ( have_rows('psb_rc_repeater') ){
                        the_row(); $i++;
                    
                        $psb_rc_title = get_sub_field('psb_rc_title');
                        $psb_rc_content = get_sub_field('psb_rc_content');
                    
                        echo '<div class="pb-4">
                        <p><strong>'.$psb_rc_title.'</strong></p>
                        '.$psb_rc_content.'
                        </div>';
                      }
                    }
                  }


                  if($psb_rc_type=='title'){
                    echo '<h4 class="mb-4">'.$psb_rc_maintitle.'</h4>';
                  }


                  if($psb_rc_type=='line'){
                    echo '<hr/>';
                  }
              
                }
              }
            ?>
        </div>

      </div>
    </div>

    <?php

      elseif( get_row_layout() == 'cards_vertical' ):

        $cv_title = get_sub_field('cv_title');

    ?>
    <div class="container">
      <?php if($cv_title != ''){ echo '<h3 class="font-helvetica55 my-10 text-center">'.$cv_title.'</h3>'; } ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto pb-20">
        <?php
          if( have_rows('cv_items') ){
            $i=0;
            while ( have_rows('cv_items') ){
              the_row(); $i++;

              $cv_i_image = get_sub_field('cv_i_image');
              $cv_i_badge = get_sub_field('cv_i_badge');
              $cv_i_title = get_sub_field('cv_i_title');
              $cv_i_text = get_sub_field('cv_i_text');
              $cv_i_button = get_sub_field('cv_i_button');

              echo '
                <div class="bg-white shadow-lg relative flex flex-col justify-between">
                  '.($cv_i_badge != '' ? '<div class="absolute text-center top-0 left-0 right-0 text-sm uppercase text-white bg-primary-dark py-2">'.$cv_i_badge.'</div>' : '').'
                  <div>
                  '.($cv_i_button ? 
                    '<a href="'.$cv_i_button['url'].'" style="background-image:url('.$cv_i_image['sizes']['large'].');" class="w-full block aspect-video bg-cover bg-center"'.($cv_i_button['target']=='_blank' ? 'targret="_blank"' : '').'></a>'
                    :
                    '<div style="background-image:url('.$cv_i_image['sizes']['large'].');" class="w-full block aspect-video bg-cover bg-center"></div>'
                  ).'
                  <h4 class="px-6 pt-4">'.$cv_i_title.'</h4>
                  <p class="px-6 py-4">'.$cv_i_text.'</p>
                  </div>
                  '.($cv_i_button ? 
                    '<div class="p-6">
                      <a href="'.$cv_i_button['url'].'" class="button" '.($cv_i_button['target']=='_blank' ? 'targret="_blank"' : '').'>'.$cv_i_button['title'].'</a>
                    </div>'
                  : null).'
                </div>
              ';
          
            }
          }
        ?>
        </div>
      </div>
      
    <?php

      elseif( get_row_layout() == 'cards_horizontal' ):

        $ch_title = get_sub_field('ch_title');

    ?>
    <div class="container">
    <?php if($ch_title != ''){ echo '<h3 class="font-helvetica55 my-10 text-center">'.$ch_title.'</h3>'; } ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-auto pb-20">
      <?php
          if( have_rows('ch_items') ){
            $i=0;
            while ( have_rows('ch_items') ){
              the_row(); $i++;

              $ch_i_image = get_sub_field('ch_i_image');
              $ch_i_title = get_sub_field('ch_i_title');
              $ch_i_text = get_sub_field('ch_i_text');
              $ch_i_button = get_sub_field('ch_i_button');

              echo '
                <div class="bg-white shadow-lg relative flex flex-row justify-between">
                  '.($ch_i_button ? 
                    '<a href="'.$ch_i_button['url'].'" style="background-image:url('.$ch_i_image['sizes']['large'].');" class="w-full block aspect-square bg-cover bg-center"'.($ch_i_button['target']=='_blank' ? 'targret="_blank"' : '').'></a>'
                    :
                    '<div style="background-image:url('.$ch_i_image['sizes']['large'].');" class="w-full block aspect-square bg-cover bg-center"></div>'
                  ).'
                  <div class="p-4 flex flex-col justify-between">
                  <div>
                  <h4>'.$ch_i_title.'</h4>
                  <p>'.$ch_i_text.'</p>
                  </div>
                  '.($cv_i_button ? 
                    '<div class="flex justify-start mt-4">
                      <a href="'.$ch_i_button['url'].'" class="button" '.($ch_i_button['target']=='_blank' ? 'targret="_blank"' : '').'>'.$ch_i_button['title'].'</a>
                    </div>'
                  : null).'
                  </div>
                </div>
              ';
          
            }
          }
        ?>
        </div>
      </div>

    <?php

      elseif( get_row_layout() == '' ):

        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');

    ?>

    <?php

      elseif( get_row_layout() == '' ):

        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');

    ?>

    <?php

      elseif( get_row_layout() == '' ):

        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');

    ?>

    <?php

      elseif( get_row_layout() == '' ):

        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');

    ?>

    <?php

      elseif( get_row_layout() == '' ):

        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');

    ?>

    <?php

      elseif( get_row_layout() == '' ):

        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');
        // $ = get_sub_field('');

    ?>

    <?php

      endif;
    endwhile;

  else :

   // no layouts found

  endif;

?>