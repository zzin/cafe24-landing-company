<?php
// https://wordpress.stackexchange.com/questions/300912/how-to-add-color-picker-in-theme-options
function zeein_color_customizer($wp_customize)
{
	$wp_customize->add_section('theme_colors_settings', [
		'title' => __('Theme Colors Settings', '_zeein'),
		'priority' => 5,
	]);

	$theme_colors = [];

	// Navigation Background Color
	$theme_colors[] = [
		'slug' => 'color_zeein_primary',
		'default' => '#000000',
		'label' => __('Color Primary', '_zeein'),
	];

	foreach ($theme_colors as $color) {
		$wp_customize->add_setting($color['slug'], [
			'default' => $color['default'],
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'option',
			'capability' => 'edit_theme_options',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['slug'], [
				'label' => $color['label'],
				'section' => 'theme_colors_settings',
				'settings' => $color['slug'],
			])
		);
	}
}

add_action('customize_register', 'zeein_color_customizer');

function zeein_custom_header_setup()
{
	add_theme_support(
		'custom-header',
		apply_filters('zeein_custom_header_args', [
			'default-image' => '',
			'default-text-color' => '000000',
			'width' => 1000,
			'height' => 250,
			'flex-height' => true,
			'wp-head-callback' => 'zeein_header_style',
		])
	);
}
add_action('after_setup_theme', 'zeein_custom_header_setup');

if (!function_exists('zeein_header_style')):
	function zeein_header_style()
	{
		$header_text_color = get_header_textcolor();
		$color_zeein_primary = get_option('color_zeein_primary');
		if (
			get_theme_support('custom-header', 'default-text-color') ===
			$header_text_color
		) {
			return;
		}
		?>
<style type="text/css">
:root {
  --primaryColor: <?= esc_attr($color_zeein_primary) ?>
}

<?php if (!display_header_text()):
	echo '
.site-title,
.site-description {
  position: absolute;
  clip: rect(1px, 1px, 1px, 1px);
}

';
else:
	echo 'site-title a,
.site-description {
  color: #' .
		esc_attr($color_zeein_primary) .
		';

}

';
endif; ?>
</style>
<?php
	}
endif;
