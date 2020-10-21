<?php
$menu = new Menu("Blogfeltoltes");
$menu->main();
$d = new Database;
$conn = $d->get_connection();
$query = "select * from ceg";
?>
<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
<body>
<div class="container">      
<h3>Blogbejegyzes feltoltese</h3>
<form action="<?= SITE_ROOT ?>blog_feltolt" method="POST" onsubmit="return blogSubmitValidate();">
        <label>Bejegyzes cime:</label> <input type="text" class="form-control" name="blog_cim" id="blog_cim">
        <label>Szoveg:</label>
        <textarea class="form-control" rows="10" id="blog_text" name="blog_text"></textarea>
        <?php
$i = 1;
if ($_SESSION["jogosultsag_id"] == 1)
{

    foreach ($conn->query($query) as $q)
    {
        $checked = "";
        if ($i == 1)
        {
            $checked = "checked";
        }
        echo "<div class='radio'>";
        echo "<label><input type='radio' name='radio_nev' value='" . $q["Id"] . "' " . $checked . ">" . $q["cegnev"] . "</label>";
        echo "</div>";
        $i++;
    }
}
else
{
    echo "<div class='radio'>";
    echo "<label><input type='radio' name='radio_nev' value='" . $_SESSION["ceg_id"] . "' checked>" . $_SESSION["ceg"] . "</label>";
    echo "</div>";
}
?>
        <input type="submit" class="btn btn-success" />
      </form>
</div>


<script>
         CKEDITOR.replace('blog_text');
         CKEDITOR.config.entities_latin = false;
                </script>

</body>
