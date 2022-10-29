<?php /*
Template Name: browse
*/
get_header(); ?>
<section>
   <article <?php post_class() ?> id='contact'>
      <div class='post-wrap'>
         <div>
            <h1>Archives</h1>
            <p class='post-line'></p>
            <div id='list'>
               <?php wp_get_archives(array('type' => 'monthly', 'show_post_count' => 1, 'format' => '', 'after' => '<br>')); ?>
            </div>
         </div>
   </article>
</section>
</div>
<?php get_footer(); ?>