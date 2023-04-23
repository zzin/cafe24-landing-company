<?php
if (!function_exists('wh_log')):
	function wh_log($log_msg)
	{
		$baseFolder = trailingslashit(wp_upload_dir()['basedir']) . 'log';
		if (!file_exists($baseFolder)) {
			wp_mkdir_p($baseFolder);
		}
		$log_file_data = $baseFolder . '/log_' . date('d-M-Y') . '.log';
		// if you don't add `FILE_APPEND`, the file will be erased each time you add a log
		file_put_contents(
			$log_file_data,
			print_r($log_msg, true) . "\n",
			FILE_APPEND
		);
	}
endif;

// remove jquery migration
add_action('wp_default_scripts', function ($scripts) {
	if (!empty($scripts->registered['jquery'])) {
		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			['jquery-migrate']
		);
	}
});

// svg support
// https://key2blogging.com/enable-svg-support-in-wordpress/
add_filter(
	'wp_check_filetype_and_ext',
	function ($data, $file, $filename, $mimes) {
		$filetype = wp_check_filetype($filename, $mimes);
		return [
			'ext' => $filetype['ext'],
			'type' => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		];
	},
	10,
	4
);

add_filter('upload_mimes', function ($mime_types) {
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['hwp'] = 'application/x-hwp';
	$mime_types['webp'] = 'image/webp';
	return $mime_types;
});
