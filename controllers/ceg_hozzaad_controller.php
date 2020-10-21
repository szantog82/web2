<?php

class Ceg_hozzaad_controller{

    public function main()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION["jogosultsag_id"] == 1)
        {
           include_once (SERVER_ROOT . '/models/ceg_hozzaad_model.php');
           $model = new Ceg_hozzaad_model;
           $model->main();
        }
    }
}

?>