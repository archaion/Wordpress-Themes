<?php
/*
Template Name: News
*/
get_header() ?>
<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo' class='small'></div>
        <div id='rightLogo' class='small'></div>
        <h1 id='title' class='adjust'>
            <p id='name' class='adjust'>N E W S</p>
        </h1>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?= site_url() ?>">HOME</a>
        <a href="<?= site_url() . '/books' ?>">BROWSE</a>
        <a href="<?= site_url() . '/search' ?>">SEARCH</a>
        <a href="<?= site_url() . '/about' ?>">ABOUT</a>
    </div>
<section id='main'>
    <?php $posts = get_posts(array('category_name' => 'news', 'posts_per_page' => 999));
    if (have_posts()) : ?>
        <div class='subtitle'>Coming Soon</div>
        <?php foreach ($posts as $post) : ?>
            <article class='item' id='post-<?php the_ID() ?>'>
                <a class='thumb' href='' style='pointer-events: none;'><?php the_post_thumbnail() ?></a>
                <a class='caption' href='' style='pointer-events: none;'><?php the_title() ?></a>
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