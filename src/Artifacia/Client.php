<?php

/**
 *
 */

namespace Artifacia;

class Client
{
  protected $user;
  protected $passwd;

  public function __construct($username, $password)
  {
    $this->user = $username;
    $this->passwd = $password;
    // $credentials = sprintf('Authorization: Basic %s', base64_encode("$user:$passwd") );
  }

  public function upload_user_data($data)
  {
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$this->user:$this->passwd") );
    $url = 'http://api.artifacia.com/v1/users';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'POST',
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result;
  }

  public function upload_item_data($data)
  {
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$this->user:$this->passwd") );
    $url = 'http://api.artifacia.com/v1/items';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
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
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$this->user:$this->passwd") );
    $url = 'http://api.artifacia.com/v1/items';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'DELETE',
            'content' => $data
        )
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    return $result;
  }

  public function get_cpr_recommendation($prod_id)
  {
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$this->user:$this->passwd") );
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
    return $result;
  }

  public function get_visual_recommendation($prod_id)
  {
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$this->user:$this->passwd") );
    $url = 'http://api.artifacia.com/v1/recommendation/similar/%d';
    $context = stream_context_create(array(
        'http' => array(
            'header'  =>
                          $credentials. "\r\n" .
                          'Content-Type: application/json',
            'method' => 'GET'
        )
    ));

    $url = sprintf($url, $prod_id);

    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    return $result;
  }

  public function get_smart_recommendation($user_id)
  {
    $credentials = sprintf('Authorization: Basic %s', base64_encode("$this->user:$this->passwd") );
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
    return $result;
  }
}
