<?php
class Blog_view
{

    public function main($cegnev, $blogszam)
    {
        $menu = new Menu("Blog");
        $menu->main($blogszam);

        $d = new Database;
        $conn = $d->get_connection();
        $query = "select * from bejegyzes where Id=" . $blogszam;
        $blog = $conn->query($query)->fetch();
        $comment_query = "select * from komment where bejegyzes_id=" . $blogszam . " order by datum";
        $comments = $conn->query($comment_query);
?>


<div class="container">

<?php
        echo "<div class='row'>";
        echo "<div class='container'>";
        echo "<div class='jumbotron text-center bg-primary'>";
        echo "<h1>" . $blog["cim"] . "</a></h1>";
        if (is_null($blog["felhasznalo_id"])){
               $user = "torolt felhasznalo";
        } else {
               $user = $conn->query("select nev from felhasznalok where Id=" . $blog["felhasznalo_id"])->fetchColumn(0);
        }
        echo "<h5 class='text-left' style='color: darkred;'>" . $user . " - " . $blog["datum"] . "</h5>";
        echo "<h4 class='text-justify'>" . $blog["szoveg"] . "</h4>";
        echo "</div>";
        echo "</div>";
?>
<div class="container">
<h4 class="d-lg-inline-block">Kommentek</h4>
<div id="comment_section">
<?php
        foreach ($comments as $c)
        {
            if (is_null($blog["felhasznalo_id"])){
               $user = "torolt felhasznalo";
        } else {
               $user = $conn->query("select nev from felhasznalok where Id=" . $blog["felhasznalo_id"])->fetchColumn(0);
        }
            echo "<div class='d-lg-inline-block bg-success'>";
            echo "<h6 class='text-justify text-left' style='padding: 10px'>" . $c["szoveg"] . "</h6>";
            echo "<h6 class='text-right' style='font-weight: bold;'>" . $user . ": " . $c["datum"] . "</h6>";
            echo "</div>";
        }

?>
</div>
 <div class="col-sm-6" style="background-color: white;">
     <?php
        if (!isset($_SESSION["nev"]) || empty($_SESSION["nev"]))
        {
            echo "<h4 style='margin-bottom: 50px;'>A kommenteleshez jelentkezz be!</h4>";
        }
        else
        {
?>
            <div class="form-group">
              <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment" style="resize: none;"></textarea>
              </div>
              <button class="btn btn-default" onclick="commentSubmitValidate()">Kuldes</button>
           </div>
          </div>
        <?php
        } ?>
</div>
</div>
<?php
    }
}
?>
