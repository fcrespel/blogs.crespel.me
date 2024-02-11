<?php
/*
Plugin Name: FAB Widgets
Description: A collection of Wordpress sidebar widgets.
Version: 1.1
Author: Fabien CRESPEL
Author URI: http://fabien.crespel.me
Text Domain: fab-widgets
*/

function fab_widgets_init() {
    $plugin_dir = basename(dirname(__FILE__));
    load_plugin_textdomain('fab-widgets', "wp-content/plugins/$plugin_dir/languages", "$plugin_dir/languages");

    $widgets = array(
        'FAB_Widget_Context',
	'FAB_Widget_Calendar',
    );

    foreach ($widgets as $widget) {
        require_once("widgets/$widget.php");
        register_widget($widget);
    }
}

add_action('widgets_init', 'fab_widgets_init');
