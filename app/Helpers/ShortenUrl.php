<?php
namespace ChopBox\helpers;



class ShortenUrl
{

  private $api_version = "v3";
  private $format;
  private $login;
  private $api_key;


  public function setKey($api_key)
  {
    $this->api_key = $api_key;
  }

  public function setLogin($login)
  {
    $this->login = $login;
  }

  public function setFormat($format)
  {
    $this->format = $format;
  }


  public function shortenUrl($url)
  {
    $shortened_url = "";
    $encoded_url = urlencode($url);
    $bityl_url = "http://api.bit.ly/shorten?" . 
    "version=" . $this->api_version . 
    "&format=" . $this->format . 
    "&longUrl=" . $encoded_url . 
    "&login=" . $this->login . 
    "&apiKey=" . $this->api_key;

    $content = file_get_contents($bityl_url);

    try
    {
      $shortened_url = $this->parseContent($content, $url);
    
    }catch(Exception $e)
    {
       echo "Caught exception: " . 
       $e->getMessage() ."<br/>";
       exit;
    }

    return $shortened_url;
  }


//  public function shorten($url)
//  {
//    $expanded_url = "";
//    $hash = $this->parseUrl($url);
//    $expanded_url = $this->expandUrlByHash($hash);
//
//    return $expanded_url;
//  }


  /* returns a  bitly hash*/
  private function parseUrl($url)
  {
    $parsed_url = parse_url($url);
    return trim($parsed_url['path'], "/");
  }

  /* parse content from bitly API */

  public function parseContent($content, $key)
  {
    //decode JSON to array
    $content = json_decode($content, true);
   

    //check errors
    if($content['statusCode'] != 'OK')
    {
      echo $content['statusCode']. ":". $content['errorCode']. " ".$content['errorMessage'];
    }


     // dd($content);

    //return right url or throw exception if not set
    if(isset($content['results'][$key]['shortUrl'])){
      return $content['results'][$key]['shortUrl'];
    }else {
      echo "Error: URL not found ".$key;
    }
  }
}
?>