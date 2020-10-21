<?php
class Kileptet_model{

public function main(){
        session_start();
        $_SESSION["nev"] = "";
        $_SESSION["ceg_id"] = "";
        $_SESSION["felhasznalo_id"] = "";
        $_SESSION["ceg"] = "";
        $_SESSION["jogosultsag_id"] = "";
        $_SESSION["email"] = "";
        session_destroy();
        }
}

?>