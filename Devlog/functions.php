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

function load1_scripts() {
	global $args1;
	global $max1;
	wp_register_script('load1', get_stylesheet_directory_uri() . '/load1.js', array('jquery'));
	wp_localize_script('load1', 'load1_args', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'posts' => $args1,
		'posts_per_page' => get_option('posts_per_page'),
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $max1
	));
	wp_enqueue_script('load1');
}

function load2_scripts() { 
	global $args2;
	global $max2;
	wp_register_script('load2', get_stylesheet_directory_uri() . '/load2.js', array('jquery'));
	wp_localize_script('load2', 'load2_args', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'posts' => $args2, 
		'posts_per_page' => get_option('posts_per_page'),
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $max2
	));
	wp_enqueue_script('load2');
}

add_action('wp_enqueue_scripts', 'load1_scripts');
add_action('wp_enqueue_scripts', 'load2_scripts');

function ajax_handler1() {
	$args = json_decode(stripslashes($_POST['query']), true);
	$args['paged'] = $_POST['page'] + 1; 
	$args['post_status'] = 'publish';
	$args['category_name'] = 'the-world'; 
	query_posts($args);
	if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
				<?php if (has_post_thumbnail()) : ?>
					<span><?php the_title(); ?></span>
				<?php the_post_thumbnail();
				else : ?>
					<span class='center'><?php the_title(); ?></span>
				<?php endif;
				the_excerpt(); ?>
				<a href='<?php the_permalink(); ?>'>&raquo;</a>
			</article>
<?php endwhile;
	endif;
	die; 
}

function ajax_handler2() {	
	$args = json_decode(stripslashes($_POST['query']), true);
	$args['paged'] = $_POST['page'] + 1; 
	$args['post_status'] = 'publish';
	$args['category_name'] = 'the-system'; 
	query_posts($args);
	if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
				<?php if (has_post_thumbnail()) : ?>
					<span><?php the_title(); ?></span>
				<?php the_post_thumbnail();
				else : ?>
					<span class='center'><?php the_title(); ?></span>
				<?php endif;
				the_excerpt(); ?>
				<a href='<?php the_permalink(); ?>'>&raquo;</a>
			</article>
<?php endwhile;
	endif;
	die; 
}

add_action('wp_ajax_load1', 'ajax_handler1'); 
add_action('wp_ajax_nopriv_load1', 'ajax_handler1');

add_action('wp_ajax_load2', 'ajax_handler2');
add_action('wp_ajax_nopriv_load2', 'ajax_handler2');

add_filter('excerpt_more', 'change_excerpt_more', 10, 1);
function change_excerpt_more($more) {
	return ' . . . ';
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);
function custom_excerpt_length($length) {
	return 70;
}
function add_featured_image_support() {
	add_theme_support('post-thumbnails');
	add_image_size('small-thumb', 95, 150, false);
}

add_action('after_setup_theme', 'add_featured_image_support');
add_action('widgets_init', 'create_menu_widget');
/*
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
add_action('init', 'create_post_type');
*/