<?php
class Kijelentkezes_controller{

public function main()
    {
      include_once (SERVER_ROOT . '/models/kileptet_model.php');
      $model = new Kileptet_model;
      $model->main();
      header('Location: ' . SITE_ROOT);
}
}
?>