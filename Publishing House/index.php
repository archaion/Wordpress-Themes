<?php get_header() ?>
<div id='main'>
    <div class='subtitle'>Featured</div>
    <div id='shadow'></div>
    <section id='carousel'>
        <div class='selector' id="prev">&laquo;</div>
        <div class='selector' id="next">&raquo;</div>
        <?php $args = array('category_name' => 'featured', 'posts_per_page' => 5);
        $posts = get_posts($args);
        if (have_posts()) : ?>
            <article class='slide' id='post-<?php the_ID() ?>'>
                <?php foreach ($posts as $post) : ?>
                    <a class='cover' href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
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
        <?php $filtered = array(8);
		$posts = get_posts(array('posts_per_page' => 8, 'category__not_in' => $filtered)); // REPLACE EXCLUDE WITH "NEWS" ID
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
    var slide = document.querySelector('.slide'),
        width = window.innerWidth;

    prev.addEventListener('click', function() {
        var slideX = Number(slide.style.left.replace(/px/, ''));
        if (window.innerWidth >= 600) {
            if (slideX < 0) slide.style.left = (slideX + 400) + 'px';
        } else {
            if (slideX < 0) slide.style.left = (slideX + 240) + 'px';
        }
    });
    next.addEventListener('click', function() {
        var slideX = Number(slide.style.left.replace(/px/, ''));
        if (window.innerWidth >= 600) {
            if (slideX > -1600) slide.style.left = (slideX - 400) + 'px';
        } else {
            if (slideX > -960) slide.style.left = (slideX - 240) + 'px';
        }
    });

    window.onresize = () => {
        if (width <= 600 && window.innerWidth > 600 || width >= 600 && window.innerWidth < 600) {
            slide.style.left = 0 + 'px';
            width = window.innerWidth;
        }
    }
</script>
<?php get_footer() ?>