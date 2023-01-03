<?php /*
Template Name: Studio
*/
get_header(); ?>
<section>
   <?php $posts = get_posts('category_name=studio');
   if (have_posts()) : foreach ($posts as $post) : ?>
         <article <?php post_class() ?> id='studio'>
            <div class='post-wrap'>
               <div class='post-text'>
                  <h1><a class='post-title' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h1>
                  <p class='post-line'></p>
                  <?php the_content(); ?>
                  <div class='tags'><?php the_tags('TAGS: '); ?></div>
               </div>
               <div class='image-link'>
                  <a href='<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'large'); ?>' target='_blank'>
                     <?php the_post_thumbnail(); ?>
                  </a>
               </div>
            </div>
         </article>
         <br><br><br>
      <?php endforeach;
   else : ?>
      <p>Not Found<br>
         Sorry, there's nothing here.</p>
   <?php endif;
   wp_reset_postdata(); ?>
</section>
</div>
<?php get_footer(); ?>