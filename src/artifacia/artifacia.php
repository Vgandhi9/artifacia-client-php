<?php

/**
 *
 */
namespace artifacia;

class Client
{

  function __construct($username, $password)
  {
    $user = $username;
    $passwd = $password;
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$username:$password") );
  }

  public function upload_user_data($data)
  {
    $url = 'http://api.artifacia.com/v1/users';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'POST'
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result
  }

  public function upload_item_data($data)
  {
    $url = 'http://api.artifacia.com/v1/items';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'POST'
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result
  }

  public function delete_item_data($data)
  {
    $url = 'http://api.artifacia.com/v1/items';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'DELETE'
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result
  }

  publin function get_visual_recommendation(prod_id)
  {
    $url = 'http://api.artifacia.com/v1/recommendation/similar/%d';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'GET'
        )
    ));

    $url = sprintf($url, prod_id);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
  }

  publin function get_visual_recommendation(prod_id)
  {
    $url = 'http://api.artifacia.com/v1/recommendation/collections/%d';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'GET'
        )
    ));

    $url = sprintf($url, prod_id);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
  }

  publin function get_smart_recommendation(user_id)
  {
    $url = 'http://api.artifacia.com/v1/recommendation/user/%d';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'GET'
        )
    ));

    $url = sprintf($url, user_id);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
  }
}
