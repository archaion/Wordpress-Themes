<?php /*
Template Name: novel
*/
get_header(); ?>
<section>
   <?php $posts = get_posts('category_name=novel');
   if (have_posts()) : foreach ($posts as $post) : ?>
         <article <?php post_class() ?> id='novel'>
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
      <?php endforeach; ?>
      <div id='select'>
         <?php previous_posts_link('&laquo; Newer &nbsp;'); ?>
         <?php next_posts_link(' &nbsp; Older &raquo;'); ?>
      </div>
   <?php else : ?>
      <p>Not Found<br>
         Sorry, there's nothing here.</p>
   <?php endif; ?>
</section>
</div>
<?php get_footer();