<?php
class Request {
    
    public $url; //URL called by User
    
    function __construct(){
        echo "I'm new request";
        $this->url = $_SERVER['PATH_INFO'];
    }
}