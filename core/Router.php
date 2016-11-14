<?php
class Router {

    /**
     * To parse URL
     * @params $url URL to parse
     * @return return array contain parameters
     **/
    static function parse($url, $request){
        // Remove '/' character
        $url = trim($url, '/');
        $params = explode('/', $url);
        
        $request->controller = $params[0];
        $request->action = (isset($params[1]))?$params[1]:"index";
        $request->params = array_slice($params, 2);
        
        return true;
    }
}