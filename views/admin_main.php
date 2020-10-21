<?php

$menu = new Menu("Admin");
        $menu->main();
        $d = new Database;
        $conn = $d->get_connection();
?>


<div class="container">
<h3>Admin oldal</h3>
<div class="container-block bg-success">
    <h4 style="color: darkred;">Felhasználók kezelése</h4>
    <table class="table">
      <thead>
      <tr>
        <th>Név</th>
        <th>Email</th>
        <th>Cég</th>
        <th>Jogosultság</th>
        <th>Aktív-e</th>
        <th>Törlés</th>
      </tr>
    </thead>
    <tbody>
<?php
$felhaszn_query = "select * from felhasznalok";
$result = $conn->query($felhaszn_query);
foreach ($result as $r){
    echo "<tr>";
    echo "<td>" . $r["nev"] . "</td>\n";
    echo "<td>" . $r["email"] . "</td>\n";
    if ($r["ceg_id"] == ""){
     $ceg_result = "null";
    } else{
    $ceg_query = "select cegnev from ceg where Id=" . $r["ceg_id"];
    $ceg_result = $conn->query($ceg_query)->fetchColumn();
    }
    echo "<td>" . $ceg_result . "</td>\n";
    $jog_query = "select leiras from jogosultsag where Id=" . $r["jogosultsag_id"];
    $jog_result = $conn->query($jog_query)->fetchColumn();
    echo "<td>" . $jog_result . "</td>\n";
    echo "<td>";
    if ($r["aktiv"] == 1){
        $aktiv_checked = "checked";
        $disabled_checked = "";
    } else {
        $aktiv_checked = "";
        $disabled_checked = "checked";
    }
    echo "<label class='radio-inline'><input type='radio' class='felhasznalo' name='" . $r["Id"] . "' value='1' " . $aktiv_checked . ">Aktiv</label>\n";
    echo "<label class='radio-inline'><input type='radio' class='felhasznalo' name='" . $r["Id"] . "' value='0' " . $disabled_checked . ">Letiltva</label>\n";
    echo "</td>"; 
    echo "<td><button class='btn btn-danger torles' id='" . $r["Id"] . "'>Törlés</Button>\n";
    echo"</tr>";
}

?>
     </tbody>
    </table>
  </div>
    <div class="container-block bg-success">
    <h4 style="color: darkred;">Cégek kezelése</h4>
    <table class="table">
      <thead>
      <tr>
        <th>Cégnev</th>
      </tr>
    </thead>
    <tbody id="ceg_table_body">
        <?php
    $ceg_query = "select * from ceg";
    $result = $conn->query($ceg_query);
    foreach ($result as $r){
     echo "<tr>";
     echo "<td>" . $r["cegnev"] . "</td>";
     echo "</tr>";
    } ?>
     </tbody>
    </table>
      </div>
    <div>
      <label>Új cég neve:</label>
      <input type="text" name="uj_ceg" id="uj_ceg">
      <button class="btn btn-success" id="ceg_hozzaad_btn">Hozzáad</button>
    </div>
 </div>

<script>
    $("#ceg_hozzaad_btn").click(function(){
        $.post('<?= SITE_ROOT ?>ceg_hozzaad', {cegnev: $("#uj_ceg").val()});
        $("#ceg_table_body").append("<tr> <td>" +  $("#uj_ceg").val() +  "</td></tr>");
        $("#uj_ceg").val("");
    });
    
</script>