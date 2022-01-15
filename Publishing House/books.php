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
    <div id='categories'><span id='label'>Categories</span></div>
    <div id='container'>
        <div id='links' class='shrink'>
            <a href='#Esoteric'>Esoteric</a>
            <a href='#History'>History</a>
            <a href='#Philosophy'>Philosophy</a>
            <a href='#Other'>Other</a>
        </div>
    </div>
    <section id='main' style='padding-top: 94px;'>
        <?php
        $filtered = array(6, 8); // REPLACE WITH "NEW" AND "FEATURED" CATEGORY IDs
        $cats = get_categories(array('exclude' => $filtered));
        foreach ($cats as $cat) : ?>
            <div class='subtitle page' id='<?= $cat->cat_name ?>' name='<?= $cat->cat_name ?>'><?= $cat->cat_name ?></div>
            <?php $posts = get_posts(array('category__in' => $cat->term_id));
            if (have_posts()) : ?>
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
        endforeach;
        wp_reset_postdata()
        ?>
    </section>
    <script>
        label.onclick = () => {
            label.classList.toggle('minus');
            links.classList.toggle('shrink');
        }
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