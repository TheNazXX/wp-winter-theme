<?php

if (post_password_required()) {
	return;
}

?>


<div id="comments" class="comments-area">

	<?php

	if (have_comments()) :
	?>
		<h2 class="title">Comments</h2>

		<?php the_comments_navigation(); ?>

		<div class="comments">
			<?php
			wp_list_comments('callback=winter_comment&end-callback=winter_comment_close');
			?>
		</div>

		<?php
		the_comments_navigation();


		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'winter'); ?></p>
	<?php
		endif;

	endif; ?>

		<?php

		function winter_move_comment_field_to_bottom($fields)
		{
			$comment_field = $fields['comment'];
			unset($fields['comment']);
			$fields['comment'] = $comment_field;
			return $fields;
		}

		add_filter('comment_form_fields', 'winter_move_comment_field_to_bottom');

		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');

		$fields =  array(

			'author' => '<div class="col-4"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' placeholder="Type your name" /></div>',

			'email' => '<div class="col-4"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' placeholder="Type your email" /></div>',

			'url' => '<div class="col-4"><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="Type your website" /></div>',

		);

		$args = array(
			'label_submit'      => ' ',
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'comment_field' =>  '<textarea id="comment" name="comment" aria-required="true" placeholder="Type your comment">' . '</textarea>',
			'title_reply_before' => '<div class="respond"><div class="top"><h2>Respond</h2></div>'

		);

		comment_form($args);
		?>

	</div>

</div><!-- #comments -->

<!-- <div class="respond">
	<div class="top">
		<h2>Respond</h2>
	</div>

	<form class="cf" method="post" id="respond-form">

		<div class="col-4">
			<input name="name" type="text" placeholder="Type your name" />
		</div>

		<div class="col-4">
			<input name="email" type="text" placeholder="Type your email" />
		</div>

		<div class="col-4">
			<input name="website" type="text" placeholder="Type your website" />
		</div>

		<textarea name="subject" placeholder="Type your comment"></textarea>

		<input class="submit" type="submit" value="" />
	</form>

</div> -->