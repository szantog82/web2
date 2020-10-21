<?php

class Blogfeltoltes_controller{

public function main(){
    if ($_SESSION["jogosultsag_id"] == 1 || $_SESSION["jogosultsag_id"] == 2) {
        $view = new View_model("blogfeltoltes");   
    } else{
        include_once(SERVER_ROOT.'/models/view_model_message.php');
        $message = "<h2>Hiba tortent!</h2>";
        $view_message = new View_model_message($message);
    }
}

}

?>	