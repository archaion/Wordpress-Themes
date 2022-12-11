<?php
/*
Template Name: search
*/
get_header(); ?>
<section>
   <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
         <article <?php post_class() ?> id='search'>
            <div class='post-wrap'>
               <div class='post-text'>
                  <h1><a class='post-title' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h1>
                  <p class='date'><?php the_date(); ?></p>
                  <p class='post-line'></p>
                  <?php the_content('Read More..'); ?>
                  <div class='tags'><?php the_tags(); ?></div>
               </div>
               <div class='image-link'>
                  <a href='<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'large'); ?>' target='_blank'>
                     <?php the_post_thumbnail(); ?>
                  </a>
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
<?php get_footer();
/* if (have_posts()) : while (have_posts()) : the_post();
                  if (get_the_category() && get_the_category()[0]->cat_name == 'Gallery') : ?>
                           <nav class='tags'><?php the_tags('', '- ', ''); ?></nav>
                        </article>
                     </div>
               <?php endif;
               endwhile; ?>
            <?php else : ?>
               <p>Nothing Found</p>
            <?php endif;
            wp_reset_postdata(); */ ?>