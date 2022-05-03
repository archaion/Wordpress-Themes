<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <header id='top'>
        <?php get_header(); ?>
    </header>
    <section id='main'>
        <nav id='navbar'>
            <div id='anchors'>
                <a href='#top'>Home</a>
                <a href='#page1'>The World</a>
                <a href='#page2'>The System</a>
                <a href='#page3'>Gallery</a>
            </div>
        </nav>
        <div id='page1'>
            <div class='title'>
                <h1>The World</h1>
                <p>Notes about the world, its history and inhabitants</p>
            </div>
            <aside id='left1'>
                <?php get_sidebar(); ?>
            </aside>
            <section id='right1'>
                <?php global $args1;
                global $max1;
                $paged1 = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts1 = new WP_Query(array('category_name' => 'the-world', 'paged' => $paged1, 'posts_per_page' => 3));
                if ($posts1->have_posts()) : while ($posts1->have_posts()) : $posts1->the_post() ?>
                        <article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
                            <?php if (has_post_thumbnail()) : ?>
                                <span><?php the_title(); ?></span>
                            <?php the_post_thumbnail();
                            else : ?>
                                <span class='center'><?php the_title(); ?></span>
                            <?php endif;
                            the_excerpt(); ?>
                            <a href='<?php the_permalink(); ?>'>&raquo;</a>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Nothing Found</p>
                <?php endif;
                $max1 = $posts1->max_num_pages;
                $args1 = json_encode($posts1->query_vars);
                if ($max1 > 1) : ?>
                    <input type='submit' value='More posts' class='load1'></input>
                <?php endif;
                wp_reset_postdata();
                ?>
            </section>
        </div>
        <div id='page2'>
            <div class='title'>
                <h1>The System</h1>
                <p>Information about systems, technology, and how things work</p>
            </div>
            <section id='left2'>
                <?php global $args2;
                global $max2;
                $paged2 = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts2 = new WP_Query(array('category_name' => 'the-system', 'paged' => $paged2, 'posts_per_page' => 3));
                if ($posts2->have_posts()) : while ($posts2->have_posts()) : $posts2->the_post() ?>
                        <article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
                            <?php if (has_post_thumbnail()) : ?>
                                <span><?php the_title(); ?></span>
                            <?php the_post_thumbnail();
                            else : ?>
                                <span class='center'><?php the_title(); ?></span>
                            <?php endif;
                            the_excerpt(); ?>
                            <a href='<?php the_permalink(); ?>'>&raquo;</a>
                        </article>
                    <?php endwhile;
                    ?>
                <?php else : ?>
                    <p>Nothing Found</p>
                <?php endif;
                $max2 = $posts2->max_num_pages;
                $args2 = json_encode($posts2->query_vars);
                if ($max2 > 1) : ?>
                    <input type='submit' value='More posts' class='load2'></input>
                <?php endif;
                wp_reset_postdata(); ?>
            </section>
            <aside id='right2'>
                <?php get_footer(); ?>
            </aside>
        </div>
        <div id='page3'>
            <div class='title'>
                <h1>Gallery</h1>
                <p>Sketches of environments, objects and characters</p>
            </div>
            <div id='gallery'>
                <?php $posts = get_posts(array('category_name' => 'gallery', 'posts_per_page' => 999));
                if (have_posts()) : foreach ($posts as $post) : ?>
                        <a href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Nothing Found</p>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <div id='exit'>X</div>
    <div id='modal'>
        <iframe name='frame'></iframe>
    </div>
</body>

</html>

<script>
    var page = document.querySelector('html')

    addClickEvents = function() {
        var links = document.getElementsByTagName('a')
        for (var i in links) {
            if (links[i].target != 'frame' && links[i].parentElement != anchors) {
                links[i].target = 'frame';
                if (!links[i].onclick) {
                    links[i].onclick = function() {
                        modal.classList.add('show')
                        exit.classList.add('show')
                        page.classList.add('stop')
                    }
                }
            }
        }
        images = document.querySelectorAll('.posts > img')
        for (var i in images) {
            if (!images[i].onclick) {
                images[i].onclick = function() {
                    var title = this.parentElement.querySelector('span')

                    if (this.classList.contains('expand')) {
                        this.classList.remove('expand')
                        title.classList.remove('center')
                    } else {
                        this.classList.add('expand')
                        title.classList.add('center')
                    }
                }
            }
        }
    }

    addClickEvents();

    exit.onclick = function() {
        modal.classList.remove('show')
        modal.innerHTML = "<iframe name='frame'></iframe>"
        exit.classList.remove('show')
        page.classList.remove('stop')
    }
</script>