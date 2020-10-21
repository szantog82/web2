<?php
class Blogfeltolt_model
{

    public function upload()
    {
        $cim = $_POST["blog_cim"];
        $szoveg = $_POST["blog_text"];
        $felhasznalo_id = $_SESSION["felhasznalo_id"];
        $datum = date("Y/m/d G:i");
        $ceg_id = $_POST["radio_nev"];

        if (strlen($cim) < 3 || strlen($szoveg) < 3)
        {
            return 0;
        }
        else
        {
            $d = new Database;
            $conn = $d->get_connection();

            $data = ['cim' => $cim, 'szoveg' => $szoveg, 'felhasznalo_id' => $felhasznalo_id, 'datum' => $datum, 'ceg_id' => $ceg_id];
            try
            {
                $sql = "insert into bejegyzes (cim, szoveg, felhasznalo_id, datum, ceg_id) values (:cim, :szoveg, :felhasznalo_id, :datum, :ceg_id)";
                $conn->prepare($sql)->execute($data);
                $last_id = $conn->lastInsertId();
                $ceg_query = "select cegnev, cegnev_normalized, m.Id from ceg as c inner join menu as m on c.cegnev=m.cimke where c.Id=" . $ceg_id;
                $ceg_row = $conn->query($ceg_query)->fetch();
                $blog_link = "/blog/" . $ceg_row["cegnev_normalized"] . "/" . $last_id;
                $sql = sprintf("insert into menu (cimke, link, szulo) values ('%s', '%s', %d)", $cim, $blog_link, $ceg_row['Id']);
                $conn->prepare($sql)->execute();

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
