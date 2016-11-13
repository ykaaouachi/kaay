<?php
class Dispatcher {

    public $request;

    function __construct(){
        echo "I'm dispatcher";
        $this->request = new Request();
        echo "url : ".$this->request->url;
    }
}