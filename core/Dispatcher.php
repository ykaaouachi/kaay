<?php
class Dispatcher {

    public $request;

    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();
        call_user_func_array(array($controller, $this->request->action), $this->request->params);

    }

    function loadController(){
        $name = ucFirst($this->request->controller).'Controller';
        require(ROOT.DS.'controller'.DS.$name.'.php');
        return new $name($this->request);
    }
}