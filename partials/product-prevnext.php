<div class="flex justify-between items-start my-10 lg:my-20">
    <div class="">
        <?php
        $prev_post = get_previous_post();
        if($prev_post) {
            $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
            echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" "><i class="icon-arrow-left text-xs mr-3"></i><span class="uppercase text-xs tracking-[0.25em] font-helvetica55">Previous</span><strong class="block ml-6">'. $prev_title . '</strong></a>' . "\n";
        }
        ?>
    </div>
    <div class="text-right">
        <?php
            $next_post = get_next_post();
            if($next_post) {
                $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
                echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" "><span class="uppercase text-xs tracking-[0.25em] font-helvetica55">Next</span><i class="icon-arrow-right text-xs ml-3"></i><strong class="block mr-6">'. $next_title . '</strong></a>' . "\n";
            }
        ?>
    </div>
</div>