<?php get_header() ?>

<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo'></div>
        <div id='rightLogo'></div>
        <h1 id='title' class='adjust'>
            <p id='name'>R A N D O M</p>
        </h1>
        <div id='pub'>P u b l i s h i n g &nbsp; C o m p a n y</div>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?= site_url() . '/books' ?>">BROWSE</a>
        <a href="<?= site_url() . '/search' ?>">SEARCH</a>
        <a href="<?= site_url() . '/news' ?>">NEWS</a>
        <a href="<?= site_url() . '/about' ?>">ABOUT</a>
    </div>
    <div id='main'>
        <div class='subtitle'>Featured</div>
        <div id='shadow'></div>
        <div class='selector' id="prev">&laquo;&nbsp;</div>
        <div class='selector' id="next">&raquo;&nbsp;</div>
        <section id='carousel'>
            <?php $args = array('category_name' => 'featured', 'posts_per_page' => 5);
            $posts = get_posts($args);
            if (have_posts()) : ?>
                <article class='slide' id='post-<?php the_ID() ?>'>
                    <?php foreach ($posts as $post) : ?>
                        <a class='cover' href='<?php the_permalink() ?>'><?php the_post_thumbnail('post-thumbnail', 'loading=eager') ?></a>
                        <div class='info'>
                            <h1><a href='<?php the_permalink() ?>'><?php the_title() ?></a></h1>
                        </div>
                    <?php endforeach ?>
                </article>
            <?php else : ?>
                <p>Not Found</p>
            <?php endif;
            wp_reset_postdata() ?>
        </section>
        <br>
        <div class='subtitle'>New Releases</div>
        <section id='gallery'>
            <?php $filtered = array(5, 6); // REPLACE WITH "FEATURED" AND "NEWS" CATEGORY IDs
            $posts = get_posts(array('category__not_in' => $filtered, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8));
            if (have_posts()) :
                foreach ($posts as $post) : ?>
                    <article <?php post_class() ?> id='post-<?php the_ID() ?>'>
                        <a href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
                    </article>
                <?php endforeach;
            else : ?>
                <p>Not Found</p>
            <?php endif;
            wp_reset_postdata() ?>
        </section>
    </div>
    <script>
        var images = document.getElementsByTagName('img');
        for (var i in images) {
            i.loading = 'eager';
        }
        var slide = document.querySelector('.slide'),
            width = document.body.clientWidth;

        prev.addEventListener('click', function() {
            var slideX = Number(slide.style.left.replace(/px/, ''));
            if (document.body.clientWidth >= 600) {
                if (slideX < 0) slide.style.left = (slideX + 240) + 'px';
            } else {
                if (slideX < 0) slide.style.left = (slideX + 260) + 'px';
            }
        });
        next.addEventListener('click', function() {
            var slideX = Number(slide.style.left.replace(/px/, ''));
            if (document.body.clientWidth >= 900) {
                if (slideX > -480) slide.style.left = (slideX - 240) + 'px';                
            } else if (document.body.clientWidth >= 600) {
                if (slideX > -720) slide.style.left = (slideX - 240) + 'px';
            } else {
                if (slideX > -960) slide.style.left = (slideX - 260) + 'px';
            }
        });

        window.onresize = () => {
            if (width <= 600 && document.body.clientWidth > 600 || width >= 600 && document.body.clientWidth < 600) {
                slide.style.left = 0 + 'px';
                width = document.body.clientWidth;
            }
        }
    </script>
    <?php get_footer() ?>