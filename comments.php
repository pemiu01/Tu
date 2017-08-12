

<?php if ( post_password_required() ) : ?>
<?php _e( 'Enter your password to view comments.' ); ?>
<?php return; endif; ?>

<div id="comments">
<h1 class="comment-title">
这篇文章<?php comments_number('还没有人发言,快抢第一!','有人发言喽~','有%人发言了呢.'); ?>
 </h1>
  <?php if ( have_comments() ) : ?>
    <div class="com-1">
    <ol class="commentlist">
      <?php wp_list_comments('type=comment&callback=mytheme_comment&max_depth=10000'); ?>
    </ol>
        <div class="mark-comment"></div>
      <nav class="commentnav">  
            <?php paginate_comments_links('prev_text=Prev&next_text=Next');?>
       </nav>
      </div>
  <?php endif; ?>
    
    <div id="respond">
        <h2>
        发表评论<small><?php cancel_comment_reply_link('点击取消回复'); ?></small>
        </h2>   
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <div class="comment-tip"><p>您必须<a href="<?php echo wp_login_url(); ?>">登录</a>才能评论</p></div>
    <?php else : ?>
    <form action="" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      <?php if ( is_user_logged_in() ) : ?>
      <div class="comment-tip"><p>
      <?php {
$user = wp_get_current_user();
$link = $user->display_name.'  <a href="' . get_settings('siteurl') . '/wp-login.php?action=logout">登出 &raquo;</a>';
echo apply_filters('loginout', $link);
}
?>
      </p></div>
      <?php endif; ?>
    <?php endif; ?>
        <div style="position:relative;">
			<?php if ( ! $user_ID ): ?>
			<div id="comment-author-info">
			<p><input type="text" name="author" id="author" class="commenttext" value="<?php echo $comment_author; ?>" style="width:100%" size="22" tabindex="1" placeholder="姓名（必填）" required /></p>
			<p><input type="text" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" style="width:100%" size="22" tabindex="2" placeholder="邮件（必填）" required /></p>
			<p><input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" style="width:100%" size="22" tabindex="3" placeholder="网址（随便你）" /></p>
			</div>
		<?php endif; ?>
			<textarea name="comment" id="comment" tabindex="4" cols="50" rows="8" placeholder="既然路过就来说一句吧" onkeydown="if(event.ctrlKey&&event.keyCode==13)
{document.getElementById('submit').click();return false};"></textarea>
<br/>
			<div class="smiles"><?php include(TEMPLATEPATH . '/smiley.php'); ?></div>
        <?php if ( ! $user_ID ): ?>
<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发射（Ctrl+Enter）" /><?php comment_id_fields(); ?>
<?php else: ?>
<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发射（Ctrl+Enter）" /><?php comment_id_fields(); ?>
<?php endif; ?>
</div>
        
        <?php do_action('comment_form', $post->ID); ?>
    </form>
    <div class="clear"></div>
    <?php endif; ?>
  </div> 
</div>
