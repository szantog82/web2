<?php

class Register_model
{

    public function feedback()
    {
        $nev = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $ceg_id = $_POST["radio_ceg"];
        $d = new Database;
        $conn = $d->get_connection();
        $query = "select count(*) from felhasznalok where nev = '" . $nev . "'";

        if ($conn->query($query)->fetchColumn() == 1)
        {
            return 0;
        }
        else if (strlen($nev) < 3 || strlen($email) < 3 || strlen($password) < 3)
        {
            return -1;
        }
        else
        {
            if ($ceg_id == -1) {
                $jogosultsag_id = 3;
                $ceg_id = null;
            } else {
                $jogosultsag_id = 2;
            }
            $data = ['nev' => $nev, 'jelszo' => password_hash($password, PASSWORD_DEFAULT) , 'ceg_id' => $ceg_id, 'jogosultsag_id' => $jogosultsag_id, 'email' => $email, 'aktiv' => 0];
            try
            {
                $sql = "insert into felhasznalok (nev, jelszo, ceg_id, jogosultsag_id, email, aktiv) values (:nev, :jelszo, :ceg_id, :jogosultsag_id, :email, :aktiv)";
                $conn->prepare($sql)->execute($data);

            }
            catch(Exception $e)
            {
                print_r($e);
            }
            return 1;
        }
    }

}

?>
