<?php
///////////////////////////////////////////////////// AJAX LOADING FUNCTIONS 
add_action('wp_enqueue_scripts', function () {
   global $args1;                                  // Pass variables from index.php
   global $args2;
   global $args3;
   global $max1;
   global $max2;
   global $max3;
   wp_enqueue_script('load', get_stylesheet_directory_uri() . '/loader.js', array('jquery'));
   wp_localize_script('load', 'args', array(
      'ajaxURL' => admin_url('admin-ajax.php'),    // WordPress AJAX URL
      'query1' => $args1,                          // WP_Query parameters
      'query2' => $args2,
      'query3' => $args3,
      'thisPage1' => get_query_var('paged') ? get_query_var('paged') : 1,  // Separate pagination variables
      'thisPage2' => get_query_var('paged') ? get_query_var('paged') : 1,
      'thisPage3' => get_query_var('paged') ? get_query_var('paged') : 1,
      'maxPage1' => $max1,
      'maxPage2' => $max2,
      'maxPage3' => $max3,
      'category1' => 'the-world',
      'category2' => 'the-system',
      'category3' => 'gallery'
   ));
});

function ajax_handler() {
   $args = json_decode(stripslashes($_POST['query']), true);
   $args['paged'] = $_POST['page'] + 1;            // Declaration of properties from loader.js
   $args['category_name'] = $_POST['category'];
   $args['post_status'] = 'publish';

   if ($args['category_name'] != 'gallery') {
      query_posts($args);                          // Display new posts
      if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='poster'>
               <article <?php post_class('posts') ?> id=' post-<?php the_ID(); ?>'>
                  <?php if (has_post_thumbnail()) : ?>
                     <span><?php the_title(); ?></span>
                  <?php the_post_thumbnail();
                  else : ?>
                     <span class='center'><?php the_title(); ?></span>
                  <?php endif;
                  the_excerpt(); ?>
                  <a href='<?php the_permalink(); ?>'>&raquo;</a>
               </article>
            </div>
         <?php endwhile;
      endif;
      die;                                         // Exit the script - no wp_reset_query() required
   } else {
      query_posts($args); 
      if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
<?php endwhile;
      endif;
      die;
   }
}

add_action('wp_ajax_load', 'ajax_handler');        // wp_ajax_{action}
add_action('wp_ajax_nopriv_load', 'ajax_handler'); // wp_ajax_nopriv_{action}

///////////////////////////////////////////////////////////////////////////////////////////
add_filter('excerpt_more', 'change_excerpt_more', 10, 1);
function change_excerpt_more($more) {
   return ' . . . ';
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);
function custom_excerpt_length($length) {
   return 60;
}
function add_featured_image_support() {
   add_theme_support('post-thumbnails');
   add_image_size('small-thumb', 95, 150, false);
}

add_action('after_setup_theme', 'add_featured_image_support');
