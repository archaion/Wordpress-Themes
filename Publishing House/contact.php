<?php
/*
Template Name: Contact
*/
get_header() ?>
<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo' class='small'></div>
        <div id='rightLogo' class='small'></div>
        <h1 id='title' class='adjust'>
            <p id='name' class='adjust'>C O N T A C T</p>
        </h1>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?php site_url() . '/books' ?>">BROWSE</a>
        <a href="<?php site_url() . '/search' ?>">SEARCH</a>
        <a href="<?php site_url() . '/news' ?>">NEWS</a>
        <a href="<?php site_url() . '/about' ?>">ABOUT</a>
    </div>
    <section id='main'>
        <article id='order' class='item large' style='margin: 25px auto 105px auto;'>
            <p>Please contact us with any inquiries regarding the Tradition website,
                including help with orders and requests for publication, at the following accounts:</p>
            <div class='text' style='text-align: center;'>
                <br>
                Email - tradition@tuta.io
                <br><br>
                Twitter - Tradition
                <br><br>
                VK - Tradition
                <br><br>
                Gab - Tradition
            </div>
        </article>
    </section>
    <br>
    <?php get_footer() ?>