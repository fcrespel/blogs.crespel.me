<!--right-col-->  
<div id="right-col">

  <!--feed-->  
  <div class="feed">
    <p class="rss-icon">&nbsp;</p>
    <ul>
      <li><a class="rss-posts" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">RSS Articles</a></li>
      <li><a class="rss-comments" href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>">RSS Commentaires</a></li>
    </ul>
  </div>

  <!--sidebar-->
  <div id="sidebar">
<?php include(TEMPLATEPATH . '/sidebar-right.php'); ?>                   
  </div><!--sidebar-end-->

</div><!--right-col-end-->
