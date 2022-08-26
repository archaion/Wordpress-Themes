<?php
/*
Template Name: News
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset='<?php bloginfo('charset'); ?>'>
   <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <?php wp_head(); ?>
</head>

<body <?php body_class() ?> style='height: 100vh'>
   <div class='menu full'>
      <h1>News</h1>
      <?php $posts = get_posts('posts_per_page=50');
      if (have_posts()) : foreach ($posts as $post) : ?>
            <div class='item'>
               <?php if (has_post_thumbnail()) : ?>
                  <a class='thumb' href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
               <?php endif; ?>
               <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
               posted <?php echo get_the_date(); ?>
               in <a href='<?php $name = get_the_category($post)[0]->name;
                           echo site_url() . '/category/' . preg_replace('/\s+/', '-', $name) ?>'><?php echo $name; ?></a>
            </div>
         <?php endforeach;
         wp_reset_postdata(); ?>
      <?php else : ?>
         <p>Nothing Found</p>
      <?php endif; ?>
   </div>
</body>

</html>

<script>
   // let index = document.getElementById('index') <-- OUT OF SCOPE!!!!!!
   // links[i].onclick = () => { index.classList.add('open'); exit3.classList.add('raise') } <-- height: 94.3vh; top: ??
   //    ^ exit3.classList.contains('raise') && (index.classList.remove('open'); exit3.classList.remove('raise'))
</script>