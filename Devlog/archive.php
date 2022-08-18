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
      <div id='page1'>
         <div id='right1' class='single'>
            <?php if (have_posts()) : while (have_posts()) : the_post();
                  if (get_the_category()[0]->cat_name == 'Gallery') : ?>
                     <div class='title'>
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo get_the_date(); ?></p>
                     </div>
                     <div class='poster'>
                        <article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
                           <?php the_post_thumbnail();
                           the_content(); ?>
                        </article>
                     </div>
                  <?php else : ?>
                     <div class='poster'>
                        <article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
                           <?php if (has_post_thumbnail()) : ?>
                              <span><?php the_title(); ?></span>
                           <?php the_post_thumbnail();
                           else : ?>
                              <span class='center'><?php the_title(); ?></span>
                           <?php endif;
                           the_content(); ?>
                        </article>
                     </div>
               <?php endif;
               endwhile; ?>
               <div id='select'>
                  <?php if (get_previous_posts_link()) : ?>
                     <div id='prev'><?php previous_posts_link('Return'); ?></div>
                  <?php endif;
                  if (get_next_posts_link()) : ?>
                     <div id="next"><?php next_posts_link('Continue'); ?></div>
                  <?php endif; ?>
               </div>
            <?php else : ?>
               <p>Nothing Found</p>
            <?php endif;
            wp_reset_postdata(); ?>
         </div>
      </div>
   </section>
</body>

</html>

<script>
   var images = document.getElementsByClassName('wp-post-image')
   for (var i in images) {
      images[i].onclick = function() {

         if (this.classList.contains('expand')) {
            this.classList.remove('expand')
         } else {
            this.classList.add('expand')
         }
      }
   }
</script>