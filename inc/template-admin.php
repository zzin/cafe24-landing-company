<?php
function _themename_remove_menus()
{
  $current_user = wp_get_current_user();
  remove_menu_page('edit.php'); // Posts
  remove_menu_page('edit-comments.php'); // Comments
}
add_action('admin_init', '_themename_remove_menus');

// 글 상태 추가
// unread
// Display Custom Post Status Option in Post Edit
// https://rudrastyh.com/wordpress/custom-post-status-quick-edit.html

function zeein_custom_status_creation()
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
add_action('init', 'zeein_custom_status_creation');

function display_custom_post_status_option()
{
  echo "<script>
		jQuery(document).ready( function() {
			jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"unread\">Unread</option>' );
		});
		</script>";
}
add_action('admin_footer-edit.php', 'display_custom_post_status_option');

function zeein_display_status_label($statuses)
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
add_filter('display_post_states', 'zeein_display_status_label');

// featured image > about
function zeein_page_about_columns($columns)
{
  $columns = [
    'cb' => '<input type="checkbox" />',
    'featured_image' => 'Image',
    'title' => 'Title',
    'date' => 'Date',
  ];
  return $columns;
}
add_filter('manage_page-about_posts_columns', 'zeein_page_about_columns');

function zeein_page_about_columns_data($column, $post_id)
{
  switch ($column) {
    case 'featured_image':
      the_post_thumbnail('thumbnail');
      break;
  }
}
add_action(
  'manage_page-about_posts_custom_column',
  'zeein_page_about_columns_data',
  10,
  2
);

// featured image > crew
function zeein_page_crew_columns($columns)
{
  $columns = [
    'cb' => '<input type="checkbox" />',
    'featured_image' => 'Image',
    'title' => 'Title',
    'date' => 'Date',
  ];
  return $columns;
}
add_filter('manage_page-crew_posts_columns', 'zeein_page_crew_columns');

function zeein_page_crew_columns_data($column, $post_id)
{
  switch ($column) {
    case 'featured_image':
      the_post_thumbnail('thumbnail');
      break;
  }
}
add_action(
  'manage_page-crew_posts_custom_column',
  'zeein_page_crew_columns_data',
  10,
  2
);

// featured image > product
function zeein_page_product_columns($columns)
{
  $columns = [
    'cb' => '<input type="checkbox" />',
    'featured_image' => 'Image',
    'title' => 'Title',
    'date' => 'Date',
  ];
  return $columns;
}
add_filter('manage_page-product_posts_columns', 'zeein_page_product_columns');

function zeein_page_product_columns_data($column, $post_id)
{
  switch ($column) {
    case 'featured_image':
      the_post_thumbnail('thumbnail');
      break;
  }
}
add_action(
  'manage_page-product_posts_custom_column',
  'zeein_page_product_columns_data',
  10,
  2
);

// wp-admin > logo change
/*@ Change WordPress Admin Login Logo */
if (!function_exists('zeein_wp_admin_login_logo')):
  function zeein_wp_admin_login_logo()
  {
    if (has_custom_logo()):
      $image = wp_get_attachment_image_src(
        get_theme_mod('custom_logo'),
        'full'
      ); ?>
<style type="text/css">
body.login div#login h1 a {
  background-image: url('<?php echo esc_url($image[0]); ?>');
  background-size: contain;
  width: 240px;
}
</style>
<?php
    endif;
  }
  add_action('login_enqueue_scripts', 'zeein_wp_admin_login_logo');
endif;

/*@ Change WordPress Admin Login Logo Link URL  */
if (!function_exists('zeein_wp_admin_login_logo_url')):
  function zeein_wp_admin_login_logo_url()
  {
    return home_url();
  }
  add_filter('login_headerurl', 'zeein_wp_admin_login_logo_url');
endif;
