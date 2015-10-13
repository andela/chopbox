<?php

namespace ChopBox\helpers;

class ExpandUrl {

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
     * Shortened Url
     * @var [type]
     */
    private $shorten;

    /**
     * Declare the constructor to initialise the ShortenUrl class
     * @param ShortenUrl $shorten
     */
    public function __construct(ShortenUrl $shorten) {
        $this->shorten = $shorten;
    }

    /**
     * Bitly login for the application
     * @param String $login
     */
    public function setLogin($login) {
        $this->login = $login;
    }

    /*
    * data return format for the api call
    * formats include text, json, etc.
    */
    public function setFormat($format) {
        $this->format = $format;
    }

    /**
     * Set the API Key for the application
     * @param String $api_key
     */
    public function setKey($api_key) {
        $this->api_key = $api_key;
    }

    /**
     * Expand given url and return expanded url
     * @param  String $url
     * @return String
     */
    public function expandUrl($url) {

        $hash = $this->url->parseUrl($url);
        $expanded_url = $this->expandUrlByHash($hash);

        return $expanded_url;
    }

    /**
     * Expand given hash and return expanded url
     * @param  string $hash
     * @return string
     */
    public function expandUrlByHash($hash) {
        $expanded_url = NULL;
        $bitly_url = "http://api.bit.ly/expand?" . "version=" . $this->api_version . "&format=" . $this->format . "&hash=" . $hash . "&login=" . $this->login . "&apiKey=" . $this->api_key;

        $content = file_get_contents($bitly_url);

        try {
            $expanded_url = $this->shorten->parseContent($content, $hash);
        } catch ( Exception $e ) {
            return "Caught exception: " . $e->getMessage();
        }

        return $expanded_url;
    }

}