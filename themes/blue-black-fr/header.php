<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archives <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" href="<?php bloginfo("template_directory"); ?>/hack.css" type="text/css" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body>

<!--wrapper-->
<div id="wrapper">

  <!--header-->
  <div id="header">
    <div id="header-top">

      <!--blog-title-->
      <div id="blog-title">
        <h1><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
        <span><?php bloginfo('description'); ?></span>
      </div>

      <!--search-->  
<?php get_search_form(); ?>

      <!--page-navigation-->
      <div id="menu">
        <?php if (function_exists('wp_nav_menu')) : wp_nav_menu(array('container' => false, 'template_location' => 'header', 'depth' => '1')); ?>
        <?php elseif (function_exists('wp_page_menu')) : wp_page_menu(array('depth' => '1', 'meta_key' => 'menu', 'meta_value' => '1')); ?>
        <?php else : ?>
        <ul>
          <?php wp_list_pages('sort_order=desc&title_li=&depth=1&meta_key=menu&meta_value=1'); ?>
        </ul>
        <?php endif; ?>
      </div>

    </div>

    <!--[if lt IE 7]>
    <div id="ie6-warning">
      <p><strong>Vous utilisez un navigateur obsolète.</strong>
      Certains éléments de ce site peuvent ne pas fonctionner correctement. Cliquez <a href="/configuration-requise/#ie6-deprecated">ici</a> pour plus d'informations.</p>
    </div>
    <![endif]-->

    <div id="header-image"></div>
  </div>

