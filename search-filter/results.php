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
		while ($query->have_posts()){
			$query->the_post();
			get_template_part( 'partials/loop', get_post_type(), array('fID'=>$fID) );
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
