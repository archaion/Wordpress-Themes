<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include WP header -->
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <div id="overlay">
        <div id="banner"></div>
        <div id="gradient"></div>
        <div id="owner"><em>Joe's</em></div>
        <header class="title">
            <!-- link to home page -->
            <div id="back"></div>
            <h1><a class="print" href="<?php bloginfo('url'); ?>"><em>Rare Books</em>
                </a></h1>
            <h2><a class="print" href="<?php bloginfo('url'); ?>"><em>Art</em>
                </a></h2>
        </header>
        <div id="line"></div>
        <aside class="subtitle">
            <!-- links to main pages -->
            <p id="address1"><em>McCarthy</em></p>
            <p id="address2"><em>Beach,</em></p>
            <p id="address3"><em>Minnesota</em></p>
        </aside>
        <div id="divider">
            <div id="menu">
                <a id="books" href="<?php bloginfo('url') . '/books'; ?>">BOOKS</a>|<a id="artwork" href="<?php bloginfo('url') . '/art'; ?>">ARTWORK</a>|<a id="contact" href="<?php bloginfo('url') . '/contact'; ?>">CONTACT</a>
            </div>
        </div>
        <?php get_sidebar(); ?>
        <div id="main">