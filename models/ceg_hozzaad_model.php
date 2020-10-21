<?php
class Ceg_hozzaad_model{

public function main(){
        $cegnev = $_POST["cegnev"];
        $d = new Database;
        $conn = $d->get_connection();

        if (strlen($cegnev) > 3)
        {
            try
            {
                $query = "select Id from menu where cimke='Blogok'";
                $szulo = $conn->query($query)->fetchColumn();
                $sql = sprintf("insert into ceg (cegnev, cegnev_normalized) values ('%s', '%s')", $cegnev, normalize($cegnev));
                $sql2 = sprintf("insert into menu (cimke, link, szulo) values ('%s', '%s', %d)", $cegnev, "#", $szulo);
                $conn->prepare($sql)->execute();
                $conn->prepare($sql2)->execute();
            }
            catch(Exception $e)
            {
                print_r($e);
            }
        }
}
}