<?php
class Request {
    
    public $url; //URL called by User
    
    function __construct(){
        $this->url = $_SERVER['REQUEST_URI'];
    }
}