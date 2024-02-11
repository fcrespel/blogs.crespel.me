<?php

class FAB_Widget_Calendar extends WP_Widget {

    public function __construct() {
        $widget_ops = array('classname' => 'widget_calendar', 'description' => __( 'A calendar of your blog&#8217;s posts') );
        parent::__construct('fab_calendar', __('FAB: Calendar'), $widget_ops);
    }

    public function widget( $args, $instance ) {
        global $monthnum, $year;
        $old_monthnum = $monthnum;
        $old_year = $year;

        if (intval($instance['monthnum']) > 0)
            $monthnum = intval($instance['monthnum']);

        if (intval($instance['year']) > 0)
            $year = intval($instance['year']);

        $title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
        echo $args['before_widget'];
        if ( $title )
            echo $args['before_title'] . $title . $args['after_title'];
        echo '<div id="calendar_wrap">';
        get_calendar();
        echo '</div>';
        echo $args['after_widget'];

        $monthnum = $old_monthnum;
        $year = $old_year;
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['monthnum'] = intval($new_instance['monthnum']);
        $instance['year'] = intval($new_instance['year']);
        return $instance;
    }

    public function form( $instance ) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $monthnum = intval($instance['monthnum']);
        $year = intval($instance['year']);
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('monthnum'); ?>"><?php _e('Month number:'); ?></label>
        <input id="<?php echo $this->get_field_id('monthnum'); ?>" name="<?php echo $this->get_field_name('monthnum'); ?>" type="text" size="2" value="<?php echo esc_attr($monthnum); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('year'); ?>"><?php _e('Year:'); ?></label>
        <input id="<?php echo $this->get_field_id('year'); ?>" name="<?php echo $this->get_field_name('year'); ?>" type="text" size="4" value="<?php echo esc_attr($year); ?>" /></p>
<?php
    }
}
