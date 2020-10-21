<?php
class Komment_feltolt_model{

public function main(){
        $comment = $_POST["comment"];
        $felhasznalo_id = $_SESSION["felhasznalo_id"];
        $blog_id = $_POST["blog_id"];
        $datum = date("Y/m/d G:i");

        $d = new Database;
        $conn = $d->get_connection();
        $query = "select count(*) from felhasznalok where nev = '" . $nev . "'";

        if (strlen($comment) > 1)
        {
           $data = ['szoveg' => $comment, 'felhasznalo_id' => intval($felhasznalo_id), 'datum' => $datum, 'bejegyzes_id' => $blog_id];
            try
            {
                $sql = "insert into komment (szoveg, felhasznalo_id, datum, bejegyzes_id) values (:szoveg, :felhasznalo_id, :datum, :bejegyzes_id)";
                $conn->prepare($sql)->execute($data);

            }
            catch(Exception $e)
            {
                print_r($e);
            }
        }
}
}

?>