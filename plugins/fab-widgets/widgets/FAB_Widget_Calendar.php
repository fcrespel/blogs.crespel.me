<?php

class FAB_Widget_Calendar extends WP_Widget_Calendar {

    function FAB_Widget_Calendar() {
        $widget_ops = array('classname' => 'widget_calendar', 'description' => __( 'A calendar of your blog&#8217;s posts') );
        $this->WP_Widget('fab_calendar', __('FAB: Calendar'), $widget_ops);
    }

    function widget( $args, $instance ) {
        global $monthnum, $year;
        $old_monthnum = $monthnum;
        $old_year = $year;

        if (intval($instance['monthnum']) > 0)
            $monthnum = intval($instance['monthnum']);

        if (intval($instance['year']) > 0)
            $year = intval($instance['year']);

        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;
        echo '<div id="calendar_wrap">';
        get_calendar();
        echo '</div>';
        echo $after_widget;

        $monthnum = $old_monthnum;
        $year = $old_year;
    }

    function update( $new_instance, $old_instance ) {
        $instance = parent::update($new_instance, $old_instance);
        $instance['monthnum'] = intval($new_instance['monthnum']);
        $instance['year'] = intval($new_instance['year']);
        return $instance;
    }

    function form( $instance ) {
        parent::form($instance);
        $monthnum = intval($instance['monthnum']);
        $year = intval($instance['year']);
?>
        <p><label for="<?php echo $this->get_field_id('monthnum'); ?>"><?php _e('Month number:'); ?></label>
        <input id="<?php echo $this->get_field_id('monthnum'); ?>" name="<?php echo $this->get_field_name('monthnum'); ?>" type="text" size="2" value="<?php echo esc_attr($monthnum); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('year'); ?>"><?php _e('Year:'); ?></label>
        <input id="<?php echo $this->get_field_id('year'); ?>" name="<?php echo $this->get_field_name('year'); ?>" type="text" size="4" value="<?php echo esc_attr($year); ?>" /></p>
<?php
    }
}
