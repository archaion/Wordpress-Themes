<?php get_header(); ?>
<section>
   <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
         <article <?php post_class() ?> id='post-<?php the_ID(); ?>'>
            <div class='post-wrap'>
               <div class='post-text'>
                  <h1><a class='post-title' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h1>
                  <p class='date'><?php the_date(); ?></p>
                  <p class='post-line'></p>
                  <?php the_content(); ?>
                  <div class='tags'><?php the_tags('TAGS: '); ?></div>
               </div>
               <div class='image-link'>
                  <a href='<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'large'); ?>' target='_blank'>
                     <?php the_post_thumbnail(); ?>
                  </a>
               </div>
            </div>
         </article>
      <?php endwhile;
      if (get_comments(array('post_id' => get_the_ID()))) comments_template();
      if (is_user_logged_in()) :
         comment_form();
      else : ?>
         <div id='login-box'>
            Log in or <?php wp_register(); ?> to comment:
            <?php wp_login_form(array('label_username' => 'Username ', 'remember' => false)); ?>
         </div>
      <?php endif;
   else : ?>
      <p>Not Found<br>
         Sorry, there's nothing here.</p>
   <?php endif;
   wp_reset_postdata(); ?>
</section>
</div>
<?php get_footer(); ?>



<!--<div id="respond" class="comment-respond">
   <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/wordpress/eltit-dda/#respond" style="display:none;">Cancel reply</a></small></h3>
   <form action="http://localhost/wordpress/wp-comments-post.php" method="post" id="commentform" class="comment-form">
      <p class="logged-in-as">Logged in as Admin. <a href="http://localhost/wordpress/wp-admin/profile.php">Edit your profile</a>. <a href="http://localhost/wordpress/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Flocalhost%2Fwordpress%2Feltit-dda%2F&amp;_wpnonce=09e4241084">Log out?</a> <span class="required-field-message">Required fields are marked <span class="required">*</span></span></p>
      <p class="comment-form-comment"><label for="comment">Comment <span class="required">*</span></label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
      <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="440" id="comment_post_ID">
         <input type="hidden" name="comment_parent" id="comment_parent" value="0">
      </p><input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="03d285f301">
      <script>
         (function() {
            if (window === window.parent) {
               document.getElementById('_wp_unfiltered_html_comment_disabled').name = '_wp_unfiltered_html_comment';
            }
         })();
      </script>
   </form>
</div>-->