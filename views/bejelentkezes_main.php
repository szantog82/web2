<?php
$menu = new Menu("Regisztracio");
$menu->main();

?>
<div class="container">
<h1>Bejelentkezés</h1>
<div class="container col-sm-6">
  <form method="POST" action="<?= SITE_ROOT ?>beleptet" class="form-group">
    <label>Felhasználó név:</label>
    <input type="text" name="login" class="form-control"><br>
    <label>Jelszó:</label>
    <input type="password" name="password" class="form-control"><br>
    <input type="submit" class="btn btn-success" value="Küldés">
  </form>
<a href="<?= SITE_ROOT ?>regisztracio">Regisztráció</a>
</div>
</div>