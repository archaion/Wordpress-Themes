<?php get_header() ?>
<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo' class='small'></div>
        <div id='rightLogo' class='small'></div>
        <h1 id='title' class='adjust back'>
            <a id='name' class='adjust' href="<?= site_url() ?>">R A N D O M</a>
        </h1>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?= site_url() . '/books' ?>">BROWSE</a>
        <a href="<?= site_url() . '/search' ?>">SEARCH</a>
        <a href="<?= site_url() . '/news' ?>">NEWS</a>
        <a href="<?= site_url() . '/about' ?>">ABOUT</a>
    </div>
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