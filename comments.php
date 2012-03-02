<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Password Protected'); ?></h2>
<p><?php _e('Enter the password to view comments.'); ?></p>

<?php return;
	}
}

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<!-- You can start editing here. -->
<div id="comments">

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

<ul class="commentlist">
<?php foreach ($comments as $comment) : ?>

	<li class="<?php
/* Only use the authcomment class from style.css if the user_id is 1 (admin) */
if (1 == $comment->user_id)
$oddcomment = "authcomment";
echo $oddcomment;
?>" id="comment-<?php comment_ID() ?>">

<div class="commentmetadata">
<strong><?php comment_author_link() ?></strong>, <?php _e('on'); ?> <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php _e('at');?> <?php comment_time() ?></a> <?php _e('Said&#58;'); ?> <?php edit_comment_link('Edit Comment','',''); ?>
 		<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.'); ?></em>
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
<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<fieldset>
		<legend id="respond">Leave a Reply</legend>
		<br />

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form-horizontal">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<div class="control-group">
	<label class="control-label" for="author">Name <?php if ($req) echo "(required)"; ?></label>
	<div class="controls">
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="input-xlarge" />
		<p class="help-block">Please input your real name for a decent debate...</p>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="email">Mail <?php if ($req) echo "(required)"; ?></label>
	<div class="controls">
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" class="input-xlarge" />
		<p class="help-block">Your email will not be published</p>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="url">Website</label>
	<div class="controls">
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" class="input-xlarge" />
	</div>
</div>


<?php endif; ?>

<div class="control-group">
	<label class="control-label" for="comment">Comment</label>
	<div class="controls">
		<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4" class="input-xxlarge"></textarea>
	</div>
</div>

<div class="form-actions">
	<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="btn btn-success" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</div>

<?php do_action('comment_form', $post->ID); ?>

</form>

</fieldset>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>
