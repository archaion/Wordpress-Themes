<?php /*
Template Name: studio
*/
get_header(); ?>
<section>
   <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
         <article <?php post_class() ?> id='post-<?php the_ID(); ?>'>
            <div class='post-wrap'>
               <div class='post-text'>
                  <h1><a class='post-title' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h1>
                  <p class='post-line'></p>
                  <?php the_content('Read More..'); ?>
               </div>
               <div class='image-link'>
                  <a href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
               </div>
            </div>
         </article>
      <?php endwhile; ?>
      <div id='select'>
         <?php next_posts_link('&laquo; Prev'); ?>
         <?php previous_posts_link('Next &raquo;'); ?>
      </div>
   <?php else : ?>
      <p>Not Found<br>
         Sorry, there's nothing here.</p>
   <?php endif; ?>
</section>
</div>
<?php get_footer(); ?>