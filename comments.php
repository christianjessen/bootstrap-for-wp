<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Password Protected', 'bootstrap-for-wp'); ?></h2>
<p><?php _e('Enter the password to view comments.', 'bootstrap-for-wp'); ?></p>

<?php return;
	}
}

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<!-- You can start editing here. -->
<div id="comments">

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number( __('No Responses', 'bootstrap-for-wp'), __('One Response', 'bootstrap-for-wp'), __('% Responses', 'bootstrap-for-wp') );?> <?php _e('to', 'bootstrap-for-wp'); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

<ul class="commentlist">
<?php foreach ($comments as $comment) : ?>

	<li class="<?php
/* Only use the authcomment class from style.css if the user_id is 1 (admin) */
if (1 == $comment->user_id)
$oddcomment = "authcomment";
echo $oddcomment;
?>" id="comment-<?php comment_ID() ?>">

<div class="commentmetadata">
<strong><?php comment_author_link() ?></strong>, <?php _e('on', 'bootstrap-for-wp'); ?> <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php _e('at', 'bootstrap-for-wp');?> <?php comment_time() ?></a> <?php _e('Said&#58;', 'bootstrap-for-wp'); ?> <?php edit_comment_link(__('Edit Comment', 'bootstrap-for-wp'),'',''); ?>
 		<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.', 'bootstrap-for-wp'); ?></em>
 		<?php endif; ?>
</div>

<?php comment_text() ?>
<hr />
	</li>

<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
?>

<?php endforeach; /* end for each comment */ ?>
	</ul>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>

	<!-- If comments are closed. -->
<p class="nocomments"><?php _e('Comments are closed', 'bootstrap-for-wp'); ?>.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<fieldset>
		<legend id="respond"><?php _e('Leave a Reply', 'bootstrap-for-wp'); ?></legend>
		<br />

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%1$s/wp-login.php?redirect_to=%2$s">logged in</a> to post a comment.', 'bootstrap-for-wp'), get_option('siteurl'), the_permalink()); ?></p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form-horizontal">
<?php if ( $user_ID ) : ?>

<p><?php printf( __('Logged in as <a href="%1$s/wp-admin/profile.php">%2$s</a>. <a href="%1$s/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a>', 'bootstrap-for-wp'), get_option('siteurl'), $user_identity); ?></p>

<?php else : ?>

<div class="control-group">
	<label class="control-label" for="author"><?php _e('Name', 'bootstrap-for-wp'); ?> <?php if ($req) _e('(required)', 'bootstrap-for-wp'); ?></label>
	<div class="controls">
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="input-xlarge" />
		<p class="help-block"><?php _e('Please input your real name for a decent debate...', 'bootstrap-for-wp'); ?></p>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="email"><?php _e('Mail', 'bootstrap-for-wp'); ?> <?php if ($req) _e('(required)', 'bootstrap-for-wp'); ?></label>
	<div class="controls">
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" class="input-xlarge" />
		<p class="help-block"><?php _e('Your email will not be published', 'bootstrap-for-wp'); ?></p>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="url"><?php _e('Website', 'bootstrap-for-wp'); ?></label>
	<div class="controls">
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" class="input-xlarge" />
	</div>
</div>


<?php endif; ?>

<div class="control-group">
	<label class="control-label" for="comment"><?php _e('Comment', 'bootstrap-for-wp'); ?></label>
	<div class="controls">
		<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4" class="input-xxlarge"></textarea>
	</div>
</div>

<div class="form-actions">
	<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'bootstrap-for-wp'); ?>" class="btn btn-success" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</div>

<?php do_action('comment_form', $post->ID); ?>

</form>

</fieldset>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>
