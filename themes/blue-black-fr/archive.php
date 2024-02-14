<?php get_header(); ?>

  <!--content-->
  <div id="content">

    <!--left-col-->   
    <div id="left-col">

      <?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
      <h2 class="pagetitle"><strong><?php single_cat_title(); ?></strong></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
      <h2 class="pagetitle"><strong><?php single_tag_title(); ?></strong></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <h2 class="pagetitle">Archives pour le <strong><?php the_time('j F Y'); ?></strong></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <h2 class="pagetitle">Archives pour <strong><?php the_time('F Y'); ?></strong></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <h2 class="pagetitle">Archives pour <strong><?php the_time('Y'); ?></strong></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2 class="pagetitle">Archives du blog</h2>
 	  <?php } ?>

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
          <h2 style="text-align: center">Aucun article trouvé</h2>
        </div>
      </div>
      <div class="post-bg-down"></div>

      <?php endif; ?>

    </div><!--left-col-end--> 

<?php get_sidebar(); ?>

  </div><!--content-end-->

</div><!--wrapper-end-->

<?php get_footer(); ?>
