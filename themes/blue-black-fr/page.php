<?php get_header(); ?>

  <!--content-->
  <div id="content">

    <!--left-col-->   
    <div id="left-col">

      <?php while (have_posts()) : the_post(); ?>
      
      <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalien vers <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <?php if (!is_toplevel()) : ?><div class="post-info"><?php echo get_full_title('&raquo;', true, false, true); ?></div><?php endif; ?>
          <div style="clear: both;"></div>
          <?php the_content('Lire la suite &raquo;'); ?> 
        </div>
      </div>
      <div class="post-bg-down"></div>

      <?php edit_post_link('Editer cette page', '<p class="metadata2">', '</p>'); ?>

      <?php endwhile; ?>

    </div><!--left-col-end-->

<?php get_sidebar(); ?>

  </div><!--content-end-->

</div><!--wrapper-end-->

<?php get_footer(); ?>
