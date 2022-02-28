<?php
add_theme_support('title-tag');
//set_post_thumbnail_size( 150, 150 );

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

/*
function enable_woocommerce() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
*/
function filter_pages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
/*
 * Force URLs in srcset attributes into HTTPS scheme.
 * This is particularly useful when you're running a Flexible SSL frontend like Cloudflare
function ssl_srcset( $sources ) {
    foreach ( $sources as &$source ) {
      $source['url'] = set_url_scheme( $source['url'], 'https' );
    }
  
    return $sources;
  }
add_filter( 'wp_calculate_image_srcset', 'ssl_srcset' );
*/
//add_filter('wp_lazy_loading_enabled', '__return_false');
add_filter('excerpt_length', function ($length) {
    return 20;
}, PHP_INT_MAX);
add_filter('pre_get_posts', 'filter_pages');
add_action('init', 'create_post_type');
add_action('widgets_init', 'create_menu_widget');
add_action('after_setup_theme', 'enable_featured_image');
//add_action('after_setup_theme', 'disable_lazy_loading');
//add_action('after_setup_theme', 'enable_woocommerce');
