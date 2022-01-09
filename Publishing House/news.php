<?php
/*
Template Name: News
MUST BE ADDED FROM DASHBOARD AS PAGE TITLED "NEWS"
*/
get_header() ?>
<section id='main'>
    <?php $posts = get_posts('category_name=news');
    if (have_posts()) : ?>
        <div class='subtitle'>Coming Soon</div>
        <?php foreach ($posts as $post) : ?>
            <article class='item' id='post-<?php the_ID() ?>'>
                <a class='thumb' href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
                <a class='caption' href='<?php the_permalink() ?>'><?php the_title() ?></a>
                <div class='text page'><?php the_content() ?></div>
            </article>
        <?php endforeach;
    else : ?>
        <p>Not Found</p>
    <?php endif;
    wp_reset_postdata()
    ?>
</section>
<?php get_footer() ?>