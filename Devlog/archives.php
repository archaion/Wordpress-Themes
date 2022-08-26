<?php
/*
Template Name: Archives
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset='<?php bloginfo('charset'); ?>'>
   <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <?php wp_head(); ?>
</head>

<body <?php body_class() ?> style='height: 100vh'>
   <div class='menu full'>
      <h1>Archives</h1>
      <div id='list'>
         <?php wp_get_archives(array('type' => 'monthly', 'show_post_count' => 1, 'format' => '', 'after' => '<br>')); ?>
      </div>
   </div>
   <?php wp_footer();
   ?>
</body>

</html>

<script>
   // let index = document.getElementById('index') <-- OUT OF SCOPE!!!!!!
   // links[i].onclick = () => { index.classList.add('open'); exit3.classList.add('raise') } <-- height: 94.3vh; top: ??
   //    ^ exit3.classList.contains('raise') && (index.classList.remove('open'); exit3.classList.remove('raise'))
</script>