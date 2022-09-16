<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */


if ( $query->have_posts() )
{
	$fID = $query->query['search_filter_id'];
	?>

	<div class="grid grid-cols-2 md:grid-cols-3 realtive z-[7]">

		<?php
		while ($query->have_posts())
		{
			$query->the_post();

			?>

			<?php
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

			<?php
		}
		?>

	</div>


	<?php echo _pagination('page-pagination', $query); ?>

	<?php
}
else
{
	echo "No Results Found";
}
?>
