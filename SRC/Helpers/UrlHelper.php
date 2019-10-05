<?php

namespace SRC\Helpers;

class UrlHelper
{
    private $request;
    private $URI;
    public $URL;

    public function __construct()
    {
        $uri = parse_url(URI);
        //var_dump($_SERVER['REQUEST_URI'] === URI);
        if (isset($uri['query'])) {
            $operation = explode('/', $uri['path'])[2];
            $this->request = '/' . $operation . '?' . $uri['query'];
        }
        //var_dump($uri['path']);
        $this->fullUrl();
        $this->URI = URI;
    }

    public function setRequest(){
        
    }

    public function fullUrl()
    {
        $base_dir = __DIR__;
        $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
        $domain = DOM;
        $base_url = '';

        $port = $_SERVER['SERVER_PORT'];
        $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

        $this->URL = "${protocol}://${domain}${disp_port}${base_url}";
    }



    /**
     * Get the value of parsedURI
     */
    public function getURI()
    {
        return $this->URI;
    }

    /**
     * Get the value of getRequest
     */
    public function getRequest()
    {
        return $this->request ? $this->request : '';
    }
}
