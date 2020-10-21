<?php
$menu = new Menu("Regisztracio");
$menu->main();

?>
<div class="container">
<h1>Bejelentkezes</h1>
<div class="container col-sm-6">
  <form method="POST" action="<?= SITE_ROOT ?>beleptet" class="form-group">
    <label>Felhasznalo nev:</label>
    <input type="text" name="login" class="form-control"><br>
    <label>Jelszo:</label>
    <input type="password" name="password" class="form-control"><br>
    <input type="submit">
  </form>
<a href="<?= SITE_ROOT ?>regisztracio">Regisztracio</a>
</div>
</div>