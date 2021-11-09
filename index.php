<?php get_header(); ?>
<div id="ampersand"><em>&amp;</em></div>
<section>
    <?php
    global $post;   //CUSTOM LOOP USING WP_QUERY
    $args = array('post_type' => 'post', 'orderby' => 'date', 'order' => 'desc'); //SQL "SELECT" FROM wp_posts
    $WPQ = new WP_Query($args);  //LOOP QUERY
    if ($WPQ->have_posts()) : $output  = ''; ?>
        <?php while ($WPQ->have_posts()) : $WPQ->the_post();  //SAME AS "NORMAL" LOOP 
            $file_query_args = array(   //GET ATTACHMENT FROM POST
                'post_type' => 'attachment',
                'post_mime_type' => 'application/pdf',
                'post_status' => 'published',
                'post_parent' => $post->ID
            );
            $file_query = new WP_Query($file_query_args); //QUERY ATTACHMENT
            foreach ($file_query->posts as $file) {
                $string = $file->guid;
            }
            $output = sprintf($string); //PATH TO UPLOADED ATTACHMENT
            if (get_the_ID() % 2 == 0) :
        ?>
                <article <?php post_class() ?> style="transform: rotate(-0.7deg);" id="post-<?php the_ID(); ?>">
                    <div class="image-link" style="transform: rotate(0.7deg);">
                        <a href="<?php echo $output; ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="post-text" style="transform: rotate(0.7deg);">
                        <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                        <?php the_content('Read More..'); ?>
                    </div>
                </article>
            <?php else : ?> <!-- ROTATE EVEN- AND ODD-NUMBERED POSTS -->
                <article <?php post_class() ?> style="transform: rotate(0.7deg);" id="post-<?php the_ID(); ?>">
                    <div class="image-link" style="transform: rotate(-0.7deg);">
                        <a href="<?php echo $output; ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="post-text" style="transform: rotate(-0.7deg);">
                        <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                        <?php the_content('Read More..'); ?>
                    </div>
                </article>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php next_posts_link('&laquo; Previous Entries'); ?>
        <?php previous_posts_link('Next Entries &raquo;'); ?>
    <?php else : ?>
        <p>Not Found
            Sorry, there is nothing here.</p>
    <?php endif; ?>
</section>
</div>
<?php get_footer(); ?>