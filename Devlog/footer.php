<div class='menu'>
    <h1>Archives</h1>
    <div id='list'>
        <?php wp_get_archives(array('type' => 'monthly', 'show_post_count' => 1, 'format' => '', 'after' => '<br>')); ?>
    </div>
</div>
<?php wp_footer(); 
?>