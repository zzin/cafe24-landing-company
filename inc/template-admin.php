<?php
function _themename_remove_menus()
{
	$current_user = wp_get_current_user();
	remove_menu_page('edit-comments.php'); // Comments
}
add_action('admin_init', '_themename_remove_menus');

// 글 상태 추가
// unread
// Display Custom Post Status Option in Post Edit
// https://rudrastyh.com/wordpress/custom-post-status-quick-edit.html

function rudr_custom_status_creation()
{
	register_post_status('unread', [
		'label' => _x('Unread', 'post'), // I used only minimum of parameters
		'label_count' => _n_noop(
			'Unread <span class="count">(%s)</span>',
			'Unread <span class="count">(%s)</span>'
		),
		'public' => true,
		'private' => true,
	]);
}
add_action('init', 'rudr_custom_status_creation');

function display_custom_post_status_option()
{
	echo "<script>
		jQuery(document).ready( function() {
			jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"unread\">Unread</option>' );
		});
		</script>";
}
add_action('admin_footer-edit.php', 'display_custom_post_status_option');

function rudr_display_status_label($statuses)
{
	global $post; // we need it to check current post status
	if (@get_query_var('post_status') != 'unread') {
		// not for pages with all posts of this status
		if (@$post->post_status == 'unread') {
			return ['Unread'];
		}
	}
	return $statuses; // returning the array with default statuses
}

add_filter('display_post_states', 'rudr_display_status_label');