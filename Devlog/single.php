<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset='<?php bloginfo('charset'); ?>'>
   <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
   <section id='main'>
   <div id='the_world'>
         <div id='right1' class='framed'>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <div class='title'>
                     <h1><?php the_title(); ?></h1>
                     <p><?php echo get_the_date(); ?></p>
                  </div>
                  <?php if (get_the_category()[0]->cat_name == 'Gallery') : ?>
                     <a class='picture' href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
                  <?php else : ?>
                     <div class='poster'>
                        <article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
                           <?php the_post_thumbnail();
                           the_content(); ?>
                           <nav class='tags'><?php the_tags('','- ',''); ?></nav>
                        </article>
                     </div>
               <?php endif;
               endwhile;
            else : ?>
               <p>Nothing Found</p>
            <?php endif; ?>
         </div>
      </div>
   </section>
</body>

</html>

<script>
   document.querySelector('.wp-post-image').onclick = function() { this.classList.toggle('expand') }
</script>