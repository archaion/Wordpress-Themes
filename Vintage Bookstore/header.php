<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset='<?php bloginfo('charset'); ?>'>
   <link rel='stylesheet' type='text/css' media='all' href='<?php bloginfo('stylesheet_url'); ?>' />
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
   <div id='overlay'>
      <div id='banner'></div>
      <div id='gradient'></div>
      <div id='owner'><span>Hunter:</span></div>
      <div id='splat'></div>
      <div id='streak'></div>
      <header class='title'>
         <!-- link to home page -->
         <div id='back'></div>
         <h1><a class='print' href='<?php bloginfo('url'); ?>'><em>Moonlight</em>
            </a></h1>
         <div id='ampersand'><em>&amp;</em></div>
         <h2><a class='print' href='<?php bloginfo('url'); ?>'><em>Blood</em>
            </a></h2>
      </header>
      <!--<div id='line'></div>-->
      <aside class='subtitle'>
         <!-- links to main pages -->
         <p id='address1'><em>Studio</em></p>
         <p id='address2'><em>Crossroad</em></p>
         <p id='address3'><em>2022</em></p>
      </aside>
      <div id='divider'>
         <div id='menu'>
            <a id='books' href='<?php echo bloginfo('url') . '/books'; ?>'>BOOKS</a>|<a id='artwork' href='<?php echo bloginfo('url') . '/artwork'; ?>'>ARTWORK</a>|<a id='contact' href='<?php echo bloginfo('url') . '/contact'; ?>'>CONTACT</a>
         </div>
      </div>
      <?php get_sidebar(); ?>
      <div id='main'>