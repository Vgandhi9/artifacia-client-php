<?php

/**
 *
 */

namespace Artifacia;

class Client
{
  protected static $api_key;

  public function __construct($api_key)
  {
    $this->api_key = $api_key;
  }

  public function upload_user_purchased_items($user_id, $data)
  {
    $url = 'https://api.artifacia.com/v1/users/%d/purchased_items';
    $context = stream_context_create(array(
        'http' => array(
          'header'  =>["api_key: " . $this->api_key,
          "Content-Type: application/json"],
            'method' => 'POST',
            'content' => $data
        )
    ));
    $url = sprintf($url, $user_id);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result;
  }

  public function upload_user_viewed_items($user_id, $data)
  {
    $url = 'https://api.artifacia.com/v1/users/%d/viewed_items';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>["api_key: " . $this->api_key,
            "Content-Type: application/json"],
            'method' => 'POST',
            'content' => $data
        )
    ));
    $url = sprintf($url, $user_id);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result;
  }

  public function upload_item_data($data)
  {
    $url = 'https://api.artifacia.com/v1/items';
    $context = stream_context_create(array(
        'http' => array(
          'header'  =>["api_key: " . $this->api_key,
          "Content-Type: application/json"],
            'method' => 'POST',
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result;
  }

  public function delete_item_data($data)
  {
    $url = 'https://api.artifacia.com/v1/items';
    $context = stream_context_create(array(
        'http' => array(
          'header'  =>["api_key: " . $this->api_key,
          "Content-Type: application/json"],
            'method' => 'DELETE',
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result;
  }

  public function get_cpr_recommendation($prod_id, $num)
  {
    $url = 'https://api.artifacia.com/v1/recommendation/collections/%d/%d';
    $context = stream_context_create(array(
        'http' => array(
          'header'  =>["api_key: " . $this->api_key,
          "Content-Type: application/json"],
            'method' => 'GET'
        )
    ));

    $url = sprintf($url, $prod_id, $num);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    return $result;
  }

  public function get_visual_recommendation($prod_id, $num, $filters='{}')
  {
    $url = 'https://api.artifacia.com/v1/recommendation/similar/%d/%d';
    $context = stream_context_create(array(
        'http' => array(
          'header'  =>["api_key: " . $this->api_key,
          "Content-Type: application/json"],
            'method' => 'POST',
            'content' => json_encode(array('filters' => $filters))
        )
    ));

    $url = sprintf($url, $prod_id, $num);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    return $result;
  }

  public function get_smart_recommendation($user_id, $num)
  {
    $url = 'https://api.artifacia.com/v1/recommendation/user/%d/%d';
    $context = stream_context_create(array(
        'http' => array(
          'header'  =>["api_key: " . $this->api_key,
          "Content-Type: application/json"],
            'method' => 'GET'
        )
    ));

    $url = sprintf($url, $user_id, $num);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    return $result;
  }
}
