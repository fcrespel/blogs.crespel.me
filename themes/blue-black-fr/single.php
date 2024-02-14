<?php get_header(); ?>

  <!--content-->
  <div id="content">

    <!--left-col-->   
    <div id="left-col">

      <?php while (have_posts()) : the_post(); ?>
      
      <!--post #<?php the_ID(); ?>-->
      <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalien vers <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="post-info">Publié par <?php the_author() ?> le <strong><?php the_time(get_option('date_format')) ?></strong> | <?php comments_popup_link('0 commentaire', '1 commentaire', '% commentaires'); ?><?php edit_post_link('Modifier', ' | ', ''); ?></div>
          <div style="clear: both;"></div>
          <?php the_content('Lire la suite &raquo;');?> 
        </div>
      </div>
      <div class="post-bg-down"></div>

      <p class="metadata2">
        Vous pouvez suivre les réponses à cet article via le flux <?php post_comments_feed_link('RSS 2.0'); ?>.

        <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
            // Both Comments and Pings are open ?>

        <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
            // Only Pings are Open ?>
            Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

        <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
            // Comments are open, Pings are not ?>
            You can skip to the end and leave a response. Pinging is currently not allowed.

        <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
            // Neither Comments, nor Pings are open ?>
            Both comments and pings are currently closed.

        <?php } edit_post_link('<br />Editer cet article','',''); ?>
      </p>

<?php comments_template(); ?>

      <?php endwhile; ?>

    </div><!--left-col-end-->

<?php get_sidebar(); ?>

  </div><!--content-end-->

</div><!--wrapper-end-->

<?php get_footer(); ?>
