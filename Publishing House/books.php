<?php
/*
Template Name: Books
*/
get_header() ?>

<body <?php body_class() ?>>
    <?php get_sidebar(); ?>
    <div id='fadeIn'></div>
    <header>
        <div id='leftLogo' class='small'></div>
        <div id='rightLogo' class='small'></div>
        <h1 id='title' class='adjust'>
            <p id='name' class='adjust'>B R O W S E</p>
        </h1>
        <div id='line'></div>
    </header>
    <div id='menu'>
        <a href="<?= site_url() ?>">HOME</a>
        <a href="<?= site_url() . '/search' ?>">SEARCH</a>
        <a href="<?= site_url() . '/news' ?>">NEWS</a>
        <a href="<?= site_url() . '/about' ?>">ABOUT</a>
    </div>
    <form class='user' action="<?= site_url() . '/books' ?>" name='slct' method='post'>
        <label for='ctgry'>Category </label>
        <select id='ctgry' name='ctgry'>
            <option value='' disabled selected hidden>Select</option>
            <option value='A'>All</option>
            <option value='4'>Esoteric</option>
            <!--3-->
            <option value='2'>History</option>
            <!--4-->
            <option value='3'>Philosophy</option>
            <!--2-->
            <option value='24'>Other</option>
            <!--5-->
        </select>
    </form>
    <!--
    <div id='categories'><span id='label'>Categories</span></div>
    <div id='container'>
        <div id='links' class='shrink'>
            <a href='#Esoteric'>Esoteric</a>
            <a href='#History'>History</a>
            <a href='#Philosophy'>Philosophy</a>
            <a href='#Other'>Other</a>
        </div>
    </div>
    -->
    <section id='main'>
        <?php
        if (isset($_POST['ctgry']) && $_POST['ctgry'] != 'A') :
            $the_cat = get_cat_name($_POST['ctgry']); ?>
            <div class='subtitle page' id='<?= $the_cat ?>' name='<?= $the_cat ?>'><?= $the_cat ?></div>

            <?php $posts = get_posts(array('category' => $_POST['ctgry'], 'posts_per_page' => 999)); // ALSO SET MAX P/P TO 999 IN WP
            if (have_posts()) :
                $total = count($posts);
                $count = 0;
                foreach ($posts as $post) : ?>
                    <article class='item' id='post-<?php the_ID() ?>'>
                        <a class='thumb' href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
                        <a class='caption' href='<?php the_permalink() ?>'><?php the_title() ?></a>
                        <div class='text page'><?php the_content() ?></div>
                    </article>

                    <?php if (++$count !== $total) : ?>
                        <div class='break'></div>
                    <?php else : ?>
                        <br>
                <?php endif;
                endforeach;
                $count = 0;
            else : ?>
                <p>Not Found</p>
            <?php endif;
            wp_reset_postdata();
        else :
            $filtered = array(5, 6); // REPLACE WITH "FEATURED" AND "NEWS" CATEGORY IDs
            $cats = get_categories(array('exclude' => $filtered));
            foreach ($cats as $cat) : ?>
                <div class='subtitle page' id='<?= $cat->cat_name ?>' name='<?= $cat->cat_name ?>'><?= $cat->cat_name ?></div>
                <?php $posts = get_posts(array('category__in' => $cat->term_id, 'posts_per_page' => 999));
                if (have_posts()) :
                    $total = count($posts);
                    $count = 0;
                    foreach ($posts as $post) : ?>
                        <article class='item' id='post-<?php the_ID() ?>'>
                            <a class='thumb' href='<?php the_permalink() ?>'><?php the_post_thumbnail() ?></a>
                            <a class='caption' href='<?php the_permalink() ?>'><?php the_title() ?></a>
                            <div class='text page'><?php the_content() ?></div>
                        </article>

                        <?php if (++$count !== $total) : ?>
                            <div class='break'></div>
                        <?php else : ?>
                            <br>
                    <?php endif;
                    endforeach;
                    $count = 0;
                else : ?>
                    <p>Not Found</p>
        <?php endif;
            endforeach;
        endif;
        wp_reset_postdata()
        ?>
    </section>
    <script>
        ctgry.onchange = () => {
            ctgry.form.submit();
        }
        /*
        label.onclick = () => {
            label.classList.toggle('minus');
            links.classList.toggle('shrink');
        }
        */
    </script>
    <?php get_footer()
    /*
IMAGE LINK TO PDF ATTACHMENT USING WP_Query <<<<<<<<<<<<<<<<<<<<<<<<<

    global $post;   //CUSTOM LOOP USING WP_QUERY
    $args = array('post_type' => 'any', 'orderby' => 'date', 'order' => 'desc'); //SQL "SELECT" FROM wp_posts
    $WPQ = new WP_Query($args);  //LOOP QUERY
    if ($WPQ->have_posts()) : $output  = ''; ?>
        <?php while ($WPQ->have_posts()) : $WPQ->the_post();  //SAME AS "NORMAL" LOOP 
            $file_args = array(   //GET ATTACHMENT FROM POST
                'post_type' => 'attachment',
                'post_mime_type' => 'application/pdf',
                'post_status' => 'any',
                'post_parent' => $post->ID
            );
            $file_query = new WP_Query($file_args); //QUERY ATTACHMENT
            foreach ($file_query->posts as $file) {
                $string = $file->guid;
            }
            $output = sprintf($string); //PATH TO UPLOADED ATTACHMENT!!!!!
        ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="image-link">
                    <a href="<?php echo $output; ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
                </div>
                <div class="post-text">
                    <h1><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h1>
                    <?php the_content('Read More..'); ?>
                </div>
            </article>
        <?php endwhile; ?>*/
    ?>