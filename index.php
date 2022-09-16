<?php get_header(); ?>

<?php
	$i = 0;
	if(have_posts()) :
		while (have_posts()) : the_post();
?>

<?php endwhile; else : ?>

<?php endif; ?>


<?php get_footer(); ?>
