<?php
/*
Template Name: Search
*/
get_header() ?>

<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo' class='small'></div>
        <div id='rightLogo' class='small'></div>
        <h1 id='title' class='adjust'>
            <p id='name' class='adjust'>S E A R C H</p>
        </h1>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?= site_url() ?>">HOME</a>
        <a href="<?= site_url() . '/books' ?>">BROWSE</a>
        <a href="<?= site_url() . '/news' ?>">NEWS</a>
        <a href="<?= site_url() . '/about' ?>">ABOUT</a>
    </div>
    <div class='user'>
        <?php get_search_form(); ?>
    </div>
    <section id='main' style='padding-top: 40px;'>
        <?php if (have_posts()) :
            while (have_posts()) : the_post() ?>
                <?php if (get_the_ID() == 124) : //REPLACE WITH DEFAULT SEARCH POST ID ?>
                    <br><br><br><br><br><br><br>
                <?php else : ?>
                    <article class='item' id='post-<?php the_ID() ?>'>
                        <a class='thumb' href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
                        <a class='caption' href='<?php the_permalink() ?>'><?php the_title() ?></a>
                        <div class='text page'><?php the_content() ?></div>
                    </article>
            <?php endif;
            endwhile;
        else : ?>
            <div style='margin: 0 auto; width: 100%; text-align: center;'>Not Found</div>
            <br><br><br><br><br><br><br>
        <?php
        endif;
        wp_reset_postdata() ?>
    </section>
    <br>
    <?php
    /* WORDPRESS TUTORIAL TEMPLATE/*
    global $query_string;
    $args = explode("&", $query_string);
    $terms = array();

    if (!empty($terms)) :
        foreach ($args as $key => $str) {
            $split = explode("=", $str);
            $terms[$split[0]] = $split[1];
        }
        $WPQ = new WP_Query($terms);
        global $wp_query;
        $results = $wp_query->found_posts;    //number of results

        if ($WPQ->have_posts()) : ?>
            <?php while ($WPQ->have_posts()) : $WPQ->the_post(); ?>
                <article class='item' id='post-<?php the_ID() ?>'>
                    <a class='thumb' href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
                    <a class='caption' href='<?php the_permalink() ?>'><?php the_title() ?></a>
                    <div class='text page'><?php the_content() ?></div>
                </article>
            <?php endwhile;
        endif;
        wp_reset_postdata();
    else : // no search query



    $posts = get_posts('replace-WITH-SEARCH-QUERY@@@@@@@@@@@@@@@');
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
</section> */
    get_footer() ?>