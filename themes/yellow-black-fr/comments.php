<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!--comments-->
<div id="comments">
<?php if ($comments) : ?>
  <h3 id="comments-title">Commentaires</h3>
  <ol>

<?php foreach ($comments as $comment) : ?>
    <li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
      <div class="comment-gravatar">
        <?php echo get_avatar( $comment, 60 ); ?>
      </div>
      <div class="comments-arrow"></div>
      <div class="comment-data">
        <div class="comment-info">Le <?php comment_date() ?> <?php comment_author_link() ?> a dit :</div> 
        <?php comment_text() ?>
        <?php if ($comment->comment_approved == '0') : ?>
        <em>Votre commentaire est en attente de modération.</em>
        <?php endif; ?>
        <?php edit_comment_link('Modifier', '&nbsp;&nbsp;', ''); ?>
      </div>
    </li>
<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>
<?php endforeach; /* end for each comment */ ?>

  </ol>
<?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
  <!-- No comments so far -->

  <?php else : // comments are closed ?>
  <p class="nocomments">Les commentaires ne sont pas autorisés.</p>
  <?php endif; ?>

<?php endif; ?>
</div><!--comments-end-->

<?php if ('open' == $post->comment_status) : ?>
<!--respond-->
<div id="respond">
  <h3 id="respond-title">Laisser un commentaire</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
  <p>Vous devez être <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">connecté</a> pour poster un commentaire.</p>
<?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>
    <p>Connecté en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Se déconnecter de ce compte">Déconnexion &raquo;</a></p>
<?php else : ?>
    <p>
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
      <label for="author"><small>Nom <?php if ($req) echo "(requis)"; ?></small></label>
    </p>
    <p>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
      <label for="email"><small>E-mail (ne sera pas affiché) <?php if ($req) echo "(requis)"; ?></small></label>
    </p>
    <p>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
      <label for="url"><small>Site Web</small></label>
    </p>
<?php endif; ?>

    <p><small><strong>XHTML:</strong> vous pouvez utiliser ces balises : <code><?php echo allowed_tags(); ?></code></small></p>

    <p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

    <p>
      <input name="submit" type="submit" id="submit" tabindex="5" value="Envoyer le commentaire" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </p>

<?php do_action('comment_form', $post->ID); ?>

  </form>
<?php endif; // If registration required and not logged in ?>
</div><!--respond-end-->
<?php endif; // If comments are open ?>
