<?php

class Komment_feltolt_controller{

    public function main()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
           include_once (SERVER_ROOT . '/models/komment_feltolt_model.php');
           $model = new Komment_feltolt_model;
           $model->main();
        }
    }
}

?>
