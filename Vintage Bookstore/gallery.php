<?php /*
Template Name: gallery
*/
get_header(); ?>
<section>
   <?php $posts = get_posts('category_name=gallery');
   if (have_posts()) : foreach ($posts as $post) : ?>
         <article <?php post_class() ?> id='post-<?php the_ID(); ?>'>
            <div class='post-wrap'>
               <div class='post-text'>
                  <h1><a class='post-title' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h1>
                  <p class='post-line'></p>
                  <?php the_content('Read More..'); ?>
               </div>
               <div class='image-link'>
                  <!--CHANGE TO MOBILE LAYOUT-->
                  <a href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
               </div>
            </div>
         </article>
      <?php endforeach; ?>
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
                           */ ?>