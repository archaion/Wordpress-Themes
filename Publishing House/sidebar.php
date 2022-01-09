<?php //dynamic_sidebar('Custom Menu'); 
?>
<div id='menuBar' class='rollUp'>
    <div id='arrow'>&#x2f0;</div>
    <a id='home' href='<?= site_url() ?>'>Tr</a>
    <div id='burger'>&equiv;</div>
</div>
<div id='ex' class='hidden'>X</div>
<div id='overlay' class='disabled'></div>
<div id='dropdown' class='offscreen'>
    <h1>
        <?php if (is_page('books')) {
            echo 'B O O K S';
        } else if (is_page('news')) {
            echo 'N E W S';
        } else if (is_page('about')) {
            echo 'A B O U T';
        } else if (is_page('contact')) {
            echo 'C O N T A C T';
        } else {
            echo 'T R A D I T I O N';
        } ?>
    </h1>
    <?php if (!is_page('books')) echo "<a href='" . site_url() . "./books'>BOOKS</a>";
    if (!is_page('news')) echo "<a href='" . site_url() . "./news'>NEWS</a>";
    if (!is_page('about')) echo "<a href='" . site_url() . "./about'>ABOUT</a>";
    if (!is_page('contact')) echo "<a href='" . site_url() . "./contact'>CONTACT</a>"; ?>
</div>