<?php
/*

######################################################################################
##
## Auto-post new articles to Twitter. This uses the Codebird library:
## https://github.com/jublonet/codebird-php/tree/release/3.2.0
##
######################################################################################

// Make this function run whenever it changes from any of these statuses to 'publish':
add_action('auto-draft_to_publish', 'twitter_auto_post', 10, 1);
add_action('draft_to_publish', 'twitter_auto_post', 10, 1);
add_action('future_to_publish', 'twitter_auto_post', 10, 1);
add_action('new_to_publish', 'twitter_auto_post', 10, 1);
add_action('pending_to_publish', 'twitter_auto_post', 10, 1);


function twitter_auto_post() {

   // Get ID of the published post:
   $post_id = get_the_ID();

   // Check to see if this has already been Tweeted
   $posted = get_post_meta($post_id, 'social_twitter_posted', true);

   // If it hasn't previously been posted, create and post a Tweet:
   if ($posted != 'true') {

      // Include Codebird library. Ensure this matches where you have saved it:
      require_once __DIR__ . '/autoshare/src/codebird.php';

      // Set your keys. Get these from your created Twitter App:
      $consumer_key = 'b9l72UZUZN9u87qL2Oi9CQjHw';
      $consumer_secret = 'Vn4jieSkHGrl4tSv6xVgiOkfU6vB0K2rGVO0zfkQfSK0NHPe9H';
      $access_token = '1585767823091138560-kWMHhoOoTmgommGjSOp5ydXotglkmN';
      $access_token_secret = 'ohPAz6PaWdOKd29qMxOyK5R0HUXJ8sFrOCzr9NINksbwH';

      // Codebird setup:
      \Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
      $cb = \Codebird\Codebird::getInstance();
      $cb->setToken($access_token, $access_token_secret);

      // Get data from the published post:
      $post_title = get_the_title($post_id);
      $post_image = get_the_post_thumbnail_url($post_id);
      $post_link = get_the_permalink($post_id);

      // Compose a status using the gathered data:
      $status = 'New post! ' . $post_title . ' - ' . $post_link;

      // Prepare for image upload:
      $media_files = array($post_image);
      $media_ids = array();

      foreach ($media_files as $file) {
         $reply = $cb->media_upload(array(
            'media' => $file
         ));
         $media_ids[] = $reply->media_id_string;
      }
      $media_ids = implode(',', $media_ids);

      // Send Tweet with image and status:
      $reply = $cb->statuses_update(array(
         'status'    => $status,
         'media_ids' => $media_ids
      ));
      // Check status of Tweet submission:
      if ($reply->httpstatus == 200) {
         // Add database entry showing that the Tweet was sucessful:
         add_post_meta($post_id, 'social_twitter_posted', 'true', true);
      } else {
         // Add database entry showing error details if it wasn't successful:
         add_post_meta($post_id, 'social_twitter_posted', $reply->httpstatus, true);
      }
   } else {
      // Tweet has already been posted. This will prevent it being posted again:
      return;
   }
}
*/

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

/*add_filter('excerpt_length', 'custom_excerpt_length', 999);
function custom_excerpt_length($length) {
   return 80;
}

add_filter('excerpt_more', 'change_excerpt_more', 10, 1);
function change_excerpt_more($more) {
   return ' . . . <a class="more" href="' . get_the_permalink() . '">Continue</a>';
}

remove_filter ('the_excerpt', 'wpautop');
remove_filter('the_excerpt', 'wp_trim_excerpt');

add_filter('the_content', 'smartwp_featured_image_in_rss_feed');
function smartwp_featured_image_in_rss_feed($content) {
   global $post;
   if (is_feed()) {
      if (has_post_thumbnail($post->ID)) {
         $prepend = '<div>' . get_the_post_thumbnail($post->ID, 'medium', array('style' => 'margin-bottom: 10px;')) . '</div>';
         $content = $prepend . $content;
      }
   }
   return $content;
}*/
add_action('after_setup_theme', 'add_featured_image_support');
add_action('init', 'create_post_type');
add_action('widgets_init', 'create_menu_widget');
