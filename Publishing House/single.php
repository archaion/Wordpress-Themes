<?php get_header() ?>
<section id='main'>
    <?php if (have_posts()) :
        while (have_posts()) : the_post() ?>
            <div class='subtitle only'><?php the_title() ?></div>
            <article id='order' class='item large'>
                <div class='thumb'><?php the_post_thumbnail() ?></div>
                <div class='text'><?php the_content() ?></div>
            </article>
        <?php endwhile;
    else : ?>
        <p>Not Found</p>
    <?php
    endif;
    wp_reset_postdata() ?>
</section>
<br>
<?php get_footer() ?>