<?php
if (!defined('ABSPATH')) {
	exit(); // Exit if accessed directly
}
function zeein_saveRequest_ajax_handler()
{
	// 보안을 위한 체크
	check_ajax_referer('moim-save', 'security');

	wh_log($_POST);
	// $_POST
	$requestName = $_POST['data']['inputName'];
	$requestContact = $_POST['data']['inputContact'];
	$requestComment = $_POST['data']['inputComment'];

	$requestTitle = '[' . $requestName . '] ' . $requestContact;
	$request = [
		'post_title' => wp_strip_all_tags($requestTitle),
		'post_type' => 'request',
		'post_status' => 'unread',
		'post_content' => wp_strip_all_tags($requestComment),
	];
	$requestId = wp_insert_post($request);
	$rtn = 'fail';
	if ($requestId) {
		$rtn = 'saved';
	}
	echo $rtn;
	wp_die();
}
add_action('wp_ajax_saveRequest', 'zeein_saveRequest_ajax_handler');
add_action('wp_ajax_nopriv_saveRequest', 'zeein_saveRequest_ajax_handler');
