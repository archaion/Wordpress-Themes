<?php
/*
Template Name: About
*/
get_header() ?>
<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo' class='small'></div>
        <div id='rightLogo' class='small'></div>
        <h1 id='title' class='adjust'>
            <p id='name' class='adjust'>A B O U T</p>
        </h1>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?= site_url() ?>">HOME</a>
        <a href="<?= site_url() . '/books' ?>">BROWSE</a>
        <a href="<?= site_url() . '/search' ?>">SEARCH</a>
        <a href="<?= site_url() . '/news' ?>">NEWS</a>
    </div>
    <section id='main'>
        <div class='subtitle only'>Mission Statement</div>
        <article id='order' class='item large state'>
            <p class='text' style='text-align: left;'>
            Lorem ipsum dolor sit amet, consectetur adipisci elit,
            sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrum exercitationem ullam
            corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
            consequatur. Quis aute iure reprehenderit in voluptate velit
            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
            obcaecat cupiditat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            </p>
        </article>
    </section>
    <br>
    <?php get_footer() ?>