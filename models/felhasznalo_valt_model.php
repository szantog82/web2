<?php
class Felhasznalo_valt_model
{

    public function change()
    {
        $d = new Database;
        $conn = $d->get_connection();
        try
        {
            $conn->prepare("Update felhasznalok set aktiv=" . $_POST["uj_ertek"] . " where Id=" . $_POST["felhasznalo_id"])->execute();
        }
        catch(Exception $e)
        {
            print_r($e);
        }

    }

    public function delete($id)
    {
        $d = new Database;
        $conn = $d->get_connection();
        try
        {
            $conn->prepare("update bejegyzes set felhasznalo_id = null where felhasznalo_id=" . $id)->execute();
            $conn->prepare("update komment set felhasznalo_id = null where felhasznalo_id=" . $id)->execute();
            $conn->prepare("delete from felhasznalok where Id=" . $id)->execute();
        }
        catch(Exception $e)
        {
            print_r($e);
        }
    }

    public function get()
    {
        $d = new Database;
        $conn = $d->get_connection();
        try
        {
            $output = $conn->query("select nev from felhasznalok")->fetchAll();
        }
        catch(Exception $e)
        {
            print_r($e);
        }
        return $output;
    }

}
?>
