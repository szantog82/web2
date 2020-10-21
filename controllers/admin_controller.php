<?php
class Admin_controller{

    public function main(){
        if ($_SESSION["jogosultsag_id"] == 1){
            $view = new View_model("admin_main");
        } else {
            include_once(SERVER_ROOT.'/models/view_model_message.php');
            $message = "<h2>Hiba tortent!</h2>";
            $view_message = new View_model_message($message);
        }
    }
}

?>