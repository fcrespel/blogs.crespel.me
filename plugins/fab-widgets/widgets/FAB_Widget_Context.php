<?php
class FAB_Widget_Context extends WP_Widget {

    function FAB_Widget_Context() {
        $widget_ops = array('classname' => 'widget_context', 'description' => __('Contextual information (search, archives, category, etc.)', 'fab-widgets'));
        $this->WP_Widget('fab_widget_context', __('FAB: Context', 'fab-widgets'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        echo $before_widget;

        $sitelink = '<a href="' . get_bloginfo('url') . '/">' . get_bloginfo('name') . '</a>';

        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) {
            if (is_category()) {
                printf('<p>'.__('You are currently browsing the %1$s site archives for the %2$s category.', 'fab-widgets').'</p>', $sitelink, single_cat_title('', false));
            } elseif (is_day()) {
                printf('<p>'.__('You are currently browsing the %1$s site archives for the day %2$s.', 'fab-widgets').'</p>', $sitelink, get_the_time(__('l, F jS, Y', 'fab-widgets')));
            } elseif (is_month()) {
                printf('<p>'.__('You are currently browsing the %1$s site archives for %2$s.', 'fab-widgets').'</p>', $sitelink, get_the_time(__('F, Y', 'fab-widgets')));
            } elseif (is_year()) {
                printf('<p>'.__('You are currently browsing the %1$s site archives for the year %2$s.', 'fab-widgets').'</p>', $sitelink, get_the_time('Y'));
            } elseif (is_search()) {
                printf('<p>'.__('You have searched the %1$s site archives for %2$s. If you are unable to find anything in these search results, use the menu or one of these links.', 'fab-widgets').'</p>', '<strong>&#8216;' . wp_specialchars(get_search_query(), true) . '&#8217;</strong>', $sitelink);
            } elseif (is_paged()) {
                printf('<p>'.__('You are currently browsing the %1$s site archives.', 'fab-widgets').'</p>', $sitelink);
            }
        }

        echo $after_widget;
    }
}
