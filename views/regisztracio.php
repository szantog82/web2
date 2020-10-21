<?php

$menu = new Menu("Regisztracio");
$menu->main();

$d = new Database;
$conn = $d->get_connection();
$query = "select * from ceg";
?>
<div class="container">
<h1>Regisztráció</h1>
<div class="container col-sm-6">
  <form method="POST" action="<?= SITE_ROOT ?>register" class="form-group">
    <label>Felhasználo név:</label>
    <input type="text" name="login" class="form-control"><br>
    <label>Email cím:</label>
    <input type="email" name="email" class="form-control"><br>
    <label>Jelszó:</label>
    <input type="password" name="password" class="form-control"><br>
    <label>Cég:</label>
    <div class='radio'>
     <label><input type='radio' name='radio_ceg' value='-1' checked>Látogató</label>
     </div>
    <?php
    $i = 1;
    foreach ($conn->query($query) as $q) {
        $checked = "";
        if ($i == 1) {
            $checked = "checked";
        }
     echo "<div class='radio'>";   
     echo "<label><input type='radio' name='radio_ceg' value='" . $q["Id"]. "'>" .$q["cegnev"]. "</label>";
     echo "</div>";
     $i++;
    }
    ?>
    <input type="submit" class="btn btn-success" value="Küldés">
  </form>
</div>
</div>
</body>
