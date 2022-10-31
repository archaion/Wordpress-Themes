<?php

add_theme_support('title-tag');

function create_menu_widget() {
   register_sidebar([
      'name' => __('Custom Menu'),
      'id' => 'widget',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget' => '</li>'
   ]);
}

function create_post_type() {
   $labels = array(
      'name' => ('Custom Post'),
      'rewrite' => array('slug' => 'custom-posts')
   );
   $args = array(
      'labels' => $labels,
      'public' => true
   );
   register_post_type('custom', $args);
}

function add_featured_image_support() {
   add_theme_support('post-thumbnails');
   add_image_size('small-thumb', 95, 150, false);
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);
function custom_excerpt_length($length) {
   return 64;
}

add_filter('excerpt_more', 'change_excerpt_more', 10, 1);
function change_excerpt_more($more) {
   return ' . . . <a class="more" href="' . get_the_permalink() . '">READ</a>';
}

add_action('after_setup_theme', 'add_featured_image_support');
add_action('init', 'create_post_type');
add_action('widgets_init', 'create_menu_widget');
