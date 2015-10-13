<?php

namespace ChopBox\helpers;

class ShortenUrl {

  /**
   * Api version
   * @var string
   */
  private $api_version = "v3";

  /**
   * Url format
   * @var string
   */
  private $format;

  /**
   * Login detail
   * @var string
   */
  private $login;

  /**
   * Api key
   * @var string
   */
  private $api_key;

  /**
   * Set api key
   * @param string $api_key
   */
  public function setKey($api_key) {
    $this->api_key = $api_key;
  }

  /**
   * Set login detail
   * @param string $login
   */
  public function setLogin($login) {
    $this->login = $login;
  }

  /**
   * Set format
   * @param  $format
   */
  public function setFormat($format) {
    $this->format = $format;
  }

  /**
   * Shorten Url
   * @param  string $url
   * @return string
   */
  public function shortenUrl($url) {
    $shortened_url = "";
    $encoded_url = urlencode($url);
    $bityl_url = "http://api.bit.ly/shorten?" . "version=" . $this->api_version . "&format=" . $this->format . "&longUrl=" . $encoded_url . "&login=" . $this->login . "&apiKey=" . $this->api_key;

    $content = file_get_contents($bityl_url);

    try {
      $shortened_url = $this->parseContent($content, $url);
    } catch ( Exception $e ) {
      return "Caught exception: " . $e->getMessage() . "<br/>";
    }

    return $shortened_url;
  }

  /**
   * Return a bitly hash
   * @param  string $url
   * @return string
   */
  private function parseUrl($url) {
    $parsed_url = parse_url($url);
    return trim($parsed_url ['path'], "/");
  }

  /**
   * Parse content from bitly API
   * @param  string $content
   * @param  string $key
   * @return string
   */
  public function parseContent($content, $key) {

    // decode JSON to array
    $content = json_decode($content, true);

    $shortUrl = $content['results'][$key]['shortUrl'];

    // check errors
    if ($content ['statusCode'] != 'OK') {
      return $content ['statusCode'] . ":" . $content ['errorCode'] . " " . $content ['errorMessage'];
    }

    // return right url or throw exception if not set
    return ( isset($shortUrl) ) ? $shortUrl : "Error: URL not found" . $key;
  }

}