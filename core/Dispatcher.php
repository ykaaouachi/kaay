<?php
class Dispatcher {

    public $request;

    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();
        
        if(!in_array($this->request->action, get_class_methods($controller))){
            //$this->error('Le controller ' . $this->request->controller . ' n\'a pas de méthode : ' . $this->request->action);
            $this->error('Action introuvable');
        }
        call_user_func_array(array($controller, $this->request->action), $this->request->params);
        $controller->render($this->request->action);
    }
    
    /**
     * Error management
     * @params $msg message
     * @return render 404 page
     */
    function error($msg){
        header("HTTP/1.0 404 Not found");
        $controller = new Controller($this->request);
        //Add message to view
        $controller->set(array("message" => $msg));
        // render view 404
        $controller->render('/errors/404');
        die();
    }

    /**
     * To load controller
     * @retun object controller
     */
    function loadController(){
        $name = ucFirst($this->request->controller).'Controller';
        require(ROOT.DS.'controller'.DS.$name.'.php');
        return new $name($this->request);
    }
}