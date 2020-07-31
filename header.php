<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package FastWay
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="cms-page" class="cms-page site">
        <div class="cms-header-wraps"><?php 
            fastway_header_top();
            fastway_header_layout();
        ?></div>
        <?php 
        	fastway_page_loading();
            fastway_page_title_layout();
        ?>
        <div id="content" class="site-content">
        	<div class="content-inner">
