<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <section id='main'>
        <div id='page1'>
            <div id='right1' class='single'>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class='title'>
                            <h1><?php the_title(); ?></h1>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <article <?php post_class('posts') ?> id='post-<?php the_ID(); ?>'>
                            <?php the_post_thumbnail();
                            the_content(); ?>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Nothing Found</p>
                <?php endif; 
                wp_reset_postdata();?>
            </div>
        </div>
    </section>
</body>

</html>

<script>
    var images = document.getElementsByClassName('wp-post-image')
    for (var i in images) {
        images[i].onclick = function() {

            if (this.classList.contains('expand')) {
                this.classList.remove('expand')
            } else {
                this.classList.add('expand')
            }
        }
    }
</script>