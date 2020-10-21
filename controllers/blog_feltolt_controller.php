<?php
class Blog_feltolt_controller
{

    public function main()
    {
        include_once(SERVER_ROOT.'/models/view_model_message.php');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_SESSION["jogosultsag_id"] == 1 || $_SESSION["jogosultsag_id"] == 2))
        {
            include_once (SERVER_ROOT . '/models/blogfeltolt_model.php');
            $model = new Blogfeltolt_model;
            $result = $model->upload();
            if ($result = 1)
            {
                $message = "<h3>Sikeres feltoltes</h3>";
            } else{
                $message = "<h2>Hiba a feltoltes soran!</h2>";
            }
        }
        else {
            $message = "<h2>Hiba tortent!</h2>";
        }
        $view_message = new View_model_message($message);
    }
}

?>
