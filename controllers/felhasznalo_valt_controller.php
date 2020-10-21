<?php
class Felhasznalo_valt_controller
{

    public function main()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION["jogosultsag_id"] == 1)
        {
            include_once (SERVER_ROOT . '/models/felhasznalo_valt_model.php');
            $model = new Felhasznalo_valt_model;
            $model->change();
        } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && $_SESSION["jogosultsag_id"] == 1) {
            $data = array();
            $incoming = file_get_contents("php://input");
            parse_str($incoming, $data);
            $felhasznalo_id = $data["felhasznalo_id"];
            echo $felhasznalo_id;
            include_once (SERVER_ROOT . '/models/felhasznalo_valt_model.php');
            $model = new Felhasznalo_valt_model;
            $model->delete($felhasznalo_id);
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include_once (SERVER_ROOT . '/models/felhasznalo_valt_model.php');
            $model = new Felhasznalo_valt_model;
            $user_list = $model->get();
            echo json_encode($user_list);
        }
    }
}

?>
