<?php get_header(); ?>
<div id="ampersand"><em>&amp;</em></div>
<section>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="image-link">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <div class="post-text">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <?php the_content('Read More..'); ?>
                </div>
            </article>
        <?php endwhile; ?>
        <?php next_posts_link('&laquo; Prev'); ?>
        <?php previous_posts_link('Next &raquo;'); ?>
    <?php else : ?>
        <p>Not Found
            Sorry, there's nothing here.</p>
    <?php endif; ?>
</section>
</div>
<?php get_footer(); ?>