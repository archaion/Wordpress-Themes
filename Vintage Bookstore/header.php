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
      <div id='owner'><span class='alt1'>W</span>er<span class='alt2'>c</span>wolf:</div>
      <div id='splat'></div>
      <div id='streak'></div>
      <header class='title'>
         <!-- link to home page -->
         <div id='back'></div>
         <h1><a class='print' href='<?php bloginfo('url'); ?>'><em>Moonlight</em>
            </a></h1>
         <div id='ampersand'><em>&amp;</em></div>
         <h2><a class='print' href='<?php bloginfo('url'); ?>'><em>Thorns</em>
            </a></h2>
      </header>
      <!--<div id='line'></div>-->
      <aside class='subtitle'>
         <!-- links to main pages -->
         <span id='copy1'><em>Pennyblood Comics</em></span>
         <span id='copy2'><em>2022</em></span>
      </aside>
      <div id='divider'>
         <div id='menu'>
            <a id='comics' href='<?php echo bloginfo('url'); ?>'>COMICS</a>
            |<a id='gallery' href='<?php echo bloginfo('url') . '/gallery'; ?>'>GALLERY</a>
            |<a id='studio' href='<?php echo bloginfo('url') . '/studio'; ?>'>STUDIO</a>
            |<a id='contact' href='<?php echo bloginfo('url') . '/contact'; ?>'>CONTACT</a>
         </div>
      </div>
      <?php get_sidebar(); ?>
      <div id='main'>