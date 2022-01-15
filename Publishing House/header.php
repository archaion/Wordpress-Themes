<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php wp_head(); ?>
</head>
<!--
<body <?php /*
body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <?php if (is_page() || is_single()) : ?>
            <div id='leftLogo' class='small'></div>
            <div id='rightLogo' class='small'></div>
        <?php else : ?>
            <div id='leftLogo'></div>
            <div id='rightLogo'></div>
        <?php endif;
            if (is_page()) {
                echo "<h1 id='title' class='adjust'>";
            } else {
                echo "<h1 id='title'>";
            }
            
            if (is_page('books')) {
                echo "<p id='name' class='adjust'>B O O K S</p>";
            } else if (is_page('news')) {
                echo "<p id='name' class='adjust'>N E W S</p>";
            } else if (is_page('about')) {
                echo "<p id='name' class='adjust'>A B O U T</p>";
            } else if (is_page('contact')) {
                echo "<p id='name' class='adjust'>C O N T A C T</p>";
            } else if (is_single()) {
                echo "<p id='name' class='adjust reduce'>T R A D I T I O N</p>";
            } else {
                echo "<p id='name'>T R A D I T I O N</p>";
            } ?>
        </h1>
        <?php if (!is_page() && !is_single()) echo "<div id='pub'>P u b l i s h i n g &nbsp; C o .</div>"; ?>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <?php if (!is_home()) echo "<a href='" . site_url() . "'>HOME</a>";
        if (!is_page('books')) echo "<a href='" . site_url() . "/books'>BOOKS</a>";
        if (!is_page('news')) echo "<a href='" . site_url() . "/news'>NEWS</a>";
        if (!is_page('about')) echo "<a href='" . site_url() . "/about'>ABOUT</a>";
        if (!is_page('contact')) echo "<a href='" . site_url() . "/contact'>CONTACT</a>"; */?>
    </div>
    -->