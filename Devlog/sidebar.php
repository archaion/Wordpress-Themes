<div class='menu'>
   <h1>News</h1>
   <?php $posts = get_posts('posts_per_page=50');
   if (have_posts()) : foreach ($posts as $post) : ?>
         <div class='note'>
            <?php if (has_post_thumbnail()) : ?>
               <a class='thumb' href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
            <?php endif; ?>
            <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
            posted <?php echo get_the_date(); ?>
            in <a href='<?php $name = get_the_category($post)[0]->name;
            echo site_url() . '/category/' . preg_replace('/\s+/','-',$name) ?>'><?php echo $name; ?></a>
         </div>
      <?php endforeach;
      wp_reset_postdata(); ?>
   <?php else : ?>
      <p>Nothing Found</p>
   <?php endif; ?>
</div>