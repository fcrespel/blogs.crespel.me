<?php get_header(); ?>

<div class="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- Post #<?php the_ID(); ?> -->
    <div class="post" id="post-<?php the_ID(); ?>">
<?php the_content('Read the rest of this entry &raquo;'); ?>
      <div class="clear"></div>
    </div>

<?php endwhile; ?>

<?php else : ?>
    <p>D&eacute;sol&eacute;, la page demand&eacute;e n'existe pas.</p>
<?php get_search_form(); ?>
<?php endif; ?>
	
</div>

<?php get_footer(); ?>