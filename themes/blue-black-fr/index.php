<?php get_header(); ?>

  <!--content-->
  <div id="content">

    <!--left-col-->   
    <div id="left-col">

      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

      <!--post #<?php the_ID(); ?>-->
      <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalien vers <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="post-info">Publié par <?php the_author() ?> le <strong><?php the_time(get_option('date_format')) ?></strong> | <?php comments_popup_link('0 commentaire', '1 commentaire', '% commentaires'); ?><?php edit_post_link('Modifier', ' | ', ''); ?></div>
          <div style="clear: both;"></div>
          <?php the_content('Lire la suite &raquo;');?> 
        </div>
        <p class="metadata"><?php the_tags('', ' . ', ''); ?></p>
      </div>
      <div class="post-bg-down"></div>

      <?php endwhile; ?>

      <div class="navigation">
        <?php posts_nav_link(' ', '&laquo; Articles plus récents', 'Articles plus anciens &raquo;') ?> 
      </div>

      <?php else : ?>

      <div class="post">
        <div class="entry">
          <h2 style="text-align: center">Page introuvable</h2>
        </div>
      </div>
      <div class="post-bg-down"></div>

      <?php endif; ?>

    </div><!--left-col-end-->

<?php get_sidebar(); ?>

  </div><!--content-end-->

</div><!--wrapper-end-->

<?php get_footer(); ?>
