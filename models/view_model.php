<?php

    class View_model{
    private $viewName;

    public function __construct($viewName){
        $this->viewName = $viewName;
}

    public function __destruct(){
        include_once(SERVER_ROOT.'/views/'.$this->viewName.'.php');
    }

}

?>					