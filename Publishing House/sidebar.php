<?php //dynamic_sidebar('Custom Menu'); 
?>
<div id='menuBar' class='rollUp'>
    <a id='home' href='<?= site_url() ?>'></a>
    <div id='arrow'>&#x2f0;</div>
    <div id='burger'>&equiv;</div>
</div>
<div id='ex' class='hidden'>X</div>
<div id='overlay' class='disabled'></div>
<div id='dropdown' class='offscreen'>
    <h1>
        <?php if (is_page('books')) {
            echo 'B R O W S E';
        } else if (is_page('search')) {
            echo 'S E A R C H';
        } else if (is_page('news')) {
            echo 'N E W S';
        } else if (is_page('about')) {
            echo 'A B O U T';
        } else {
            echo 'T R A D I T I O N';
        } ?>
    </h1>
    <?php if (!is_page('books')) echo "<a href='" . site_url() . "/books'>BROWSE</a>";
    if (!is_page('search')) echo "<a href='" . site_url() . "/search'>SEARCH</a>";
    if (!is_page('news')) echo "<a href='" . site_url() . "/news'>NEWS</a>";
    if (!is_page('about')) echo "<a href='" . site_url() . "/about'>ABOUT</a>"; ?>
</div>