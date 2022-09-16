<?php get_header(); ?>

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

<?php get_template_part( 'partials/single', get_post_type() ); ?>

<?php endwhile; else : ?>

	<div class="alert alert-info">
		<strong>No content in this loop...</strong>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
