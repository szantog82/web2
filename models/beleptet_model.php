<?php
class Beleptet_model{

public function getValidation(){
        $nev = $_POST["login"];
        $password = $_POST["password"];
        $d = new Database;
        $conn = $d->get_connection();
        $query = "select count(*) from felhasznalok where nev = '" . $nev . "'";

        if ($conn->query($query)->fetchColumn() == 0)
        {
            return 0;  
    
        } else{
            $query2 = "select * from felhasznalok where nev = '" . $nev . "'";
            $felhasznalok_row = $conn->query($query2)->fetch();
            
            if ($felhasznalok_row["aktiv"] == 1 && password_verify($password, $felhasznalok_row["jelszo"])) {
                if (!($felhasznalok_row["ceg_id"] == 0)){
                    $query3 = "select * from ceg where Id = " . $felhasznalok_row["ceg_id"];
                    $ceg_row = $conn->query($query3)->fetch();
                    $_SESSION["ceg_id"] = $ceg_row["Id"];
                    $_SESSION["ceg"] = $ceg_row["cegnev"];
                }
                $_SESSION["nev"] = $nev;
                $_SESSION["felhasznalo_id"] = $felhasznalok_row["Id"];
                $_SESSION["jogosultsag_id"] = $felhasznalok_row["jogosultsag_id"];
                $_SESSION["email"] = $felhasznalok_row["email"];
                return 1;
            } else {
                return 0;
            }
        }
}
   
}

?>