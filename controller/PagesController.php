<?php
class PagesController extends Controller {
    
    function view($nom){
        //echo "Yoooooopiiiii : " . $nom;
        $this->set(array(
                'var1' => "Hello on my page : " . $nom,
                'var2' => "var 2"
            ));
        $this->render('index');
    }
    
}