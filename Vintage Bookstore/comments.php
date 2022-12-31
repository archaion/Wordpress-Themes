<div class='comment-title'>Comments</div>
<?php foreach (get_comments(array('post_id' => get_the_ID())) as $comm) : ?>
   <article <?php post_class('comment') ?>>
      <div class='post-wrap'>
         <div class='post-text'><br>
            <?php echo $comm->comment_content; ?><br><br>
            <div class='tags'>- <?php echo $comm->comment_author ?>, <p class='date'><?php comment_date('F j, Y', $comm->comment_ID); ?></p></div>
         </div>
      </div>
   </article>
<?php endforeach; ?>