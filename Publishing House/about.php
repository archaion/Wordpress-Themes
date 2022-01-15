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
            <p class='text'>
                Tradition Publishing Company is a reprinting service for rare and censored books in the genres of traditionalist,
                philosophical and reactionary literature. We employ a third party service to publish this
                material using print-on-demand technology at a significantly reduced cost to you, the reader.
                <br><br>
                We thank you for visiting our website. Please contact us with any inquiries or recommended books to publish.
            </p>
        </article>
    </section>
    <br>
    <?php get_footer() ?>