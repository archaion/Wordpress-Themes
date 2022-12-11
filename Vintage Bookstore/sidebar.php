<aside id='sidebar'>
   <ul>
      <?php //dynamic_sidebar('Custom Menu'); 
      ?>
      <li><span>_SEARCH_</span>
         <form role="search" method="get" id="form" action="<?php echo home_url(); ?>">
               <input id='query' value="" name="s" id="s" type="text">
               <input id="submit" value="GO" type="submit">
         </form>
      </li>
      <li><span>_BROWSE_</span>
         <div id='archives'>
            <?php wp_get_archives(array('type' => 'monthly', 'limit' => 12, 'format' => '', 'after' => '<div class="break"></div>')); ?>
            <a href='<?php echo bloginfo('url') . '/browse'; ?>'>More...</a>
         </div>
      </li>
      <li><a id='top' href='#'>_RETURN_</a></li>
   </ul>
   <div id='corner2'></div>
   <div id='corner3'></div>
</aside>