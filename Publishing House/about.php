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
                Tradition Publishing Company is a reprinting service for rare and out-of-print books in the genres of traditionalist,
                philosophical and reactionary literature. In addition to public domain and orphan works, our collection includes
                original publications of material by several well-known authors. We employ a third-party service (The Book Patch)
                to publish this material using print-on-demand technology, which provides the assurance of legitimacy and reduces the 
                overall cost to you, the reader. Our company is not profit-motivated, but rather focused on the distribution of
                traditionalist literature for educational purposes.
                <br><br>
                We thank you for visiting our website. Please contact us with any inquiries or to recommend books for publication at
                <em>tradtion(at)tuta.io</em>.
            </p>
        </article>
    </section>
    <br>
    <?php get_footer() ?>