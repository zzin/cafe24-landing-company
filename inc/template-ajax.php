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
  $requestCompany = $_POST['data']['company'];
  $requestName = $_POST['data']['name'];
  $requestTel = $_POST['data']['tel'];
  $requestEmail = $_POST['data']['email'];
  $requestComment = $_POST['data']['comment'];

  $requestTitle =
    '[' .
    $requestCompany .
    ' : ' .
    $requestName .
    '(' .
    $requestEmail .
    ')] ' .
    $requestTel;
  $request = [
    'post_title' => wp_strip_all_tags($requestTitle),
    'post_type' => 'request',
    'post_status' => 'unread',
    'post_content' => wp_strip_all_tags($requestComment),
  ];
  $requestId = wp_insert_post($request);
  $rtn = 'fail';
  if ($requestId) {
    update_field('field_6448f6f7aeb79', $requestCompany, $requestId);
    update_field('field_6448f73daeb7a', $requestName, $requestId);
    update_field('field_6448f74faeb7b', $requestTel, $requestId);
    update_field('field_6448f75daeb7c', $requestEmail, $requestId);
    $rtn = 'saved';
  }
  echo $rtn;
  wp_die();
}
add_action('wp_ajax_saveRequest', 'zeein_saveRequest_ajax_handler');
add_action('wp_ajax_nopriv_saveRequest', 'zeein_saveRequest_ajax_handler');
