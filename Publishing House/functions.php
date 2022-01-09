<?php
add_theme_support('title-tag');

function create_menu_widget() {
    register_sidebar([
        'name' => __('Custom Menu'),
        'id' => 'widget',
        'before_title' => '<h3 class="widget-title">',  //before each item
        'after_title' => '</h3>',
        'before_widget' => '<li id="%1$s">',
        'after_widget' => '</li>'
    ]);
}

function create_post_type() {
    $labels = array(
        'name' => ('Custom Post'),
        'rewrite' => array('slug' => 'custom-posts') // category?????????
    );
    $args = array(
        'labels' => $labels,
        'public' => true
    );
    register_post_type('custom', $args);
}

function enable_featured_image() {
    add_theme_support('post-thumbnails');
    add_image_size('small-thumb', 95, 150, false);
}

function enable_woocommerce() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('init', 'create_post_type');
add_action('widgets_init', 'create_menu_widget');
add_action('after_setup_theme', 'enable_featured_image');
add_action('after_setup_theme', 'enable_woocommerce');
