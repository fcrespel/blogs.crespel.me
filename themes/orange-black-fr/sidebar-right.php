    <!--sidebar2-->
    <div id="sidebar2">
      <ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
        <li>
          <h2>Catégories</h2>
          <ul>
            <?php wp_list_cats('sort_column=name'); ?> 
            <li><div class="li-sidebar-bottom">&nbsp;</div></li>
          </ul>
        </li>

        <li>
          <h2>Articles Récents</h2>
          <ul>
            <?php wp_get_archives('type=postbypost&limit=5'); ?>
            <li><div class="li-sidebar-bottom">&nbsp;</div></li>
          </ul>
        </li>
    
        <li>
          <h2>Archives</h2>
          <ul>
            <?php wp_get_archives('type=monthly'); ?>
            <li><div class="li-sidebar-bottom">&nbsp;</div></li>
          </ul>
        </li>
		
        <li>
          <h2>Favoris</h2>
          <ul>
            <?php get_links(-1, '<li>', '</li>', '', false, 'name', false, false, -1, false); ?>
            <li><div class="li-sidebar-bottom">&nbsp;</div></li>
          </ul>
        </li>

<?php endif; // end of sidebar1 ?> 
      </ul>
    </div><!--sidebar2-end-->
