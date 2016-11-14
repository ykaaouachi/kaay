<?php
class Controller {
    
    public $request;
    public $vars = array();
    public $layout = 'default';
    private $renderd = false;
    
    function __construct($request){
        $this->request = $request;
    }
    
    public function render($view){
        if($this->renderd){ 
            return false;
        }
        
        extract($this->vars);
        if(strpos($view, '/')===0){
            $view = ROOT.DS.'view'.$view.'.php';
        } else {
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        }
        
        ob_start();
        require($view);
        $content_for_layout = ob_get_clean();
        
        $default_layout = ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
        require $default_layout;
        
        $this->renderd = true;
    }
    
    public function set($key, $value=null){
        if(is_array($key)){
            $this->vars += $key;    
        } else {
            $this->vars[$key] = $value;
        }
    }
}