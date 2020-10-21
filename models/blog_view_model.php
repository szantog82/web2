<?php
class Blog_view_model {
    
    private $viewName;
    private $cegnev;
    private $blogszam;


     public function __construct($vars){
        $this->viewName = $vars[0];
        $this->cegnev = $vars[1];
        $this->blogszam = $vars[2];
        include_once(SERVER_ROOT.'/views/'.$this->viewName.'.php');
        $view = new Blog_view;
        $view->main($this->cegnev,  $this->blogszam);
}

    public function __destruct(){
     
    }
}
?>