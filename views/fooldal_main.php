<?php
$menu = new Menu("Fooldal");
$menu->main();

$d = new Database;
$conn = $d->get_connection();
$query = "select * from bejegyzes";

    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='container-fluid'>";
    echo "<div class='jumbotron text-center col-lg-9 bg-primary'>";
foreach ($conn->query($query) as $q) {
    $query2 = "select cegnev_normalized from ceg where Id=" . $q["ceg_id"];
    $cegnev_normalized = $conn->query($query2)->fetchColumn();
    echo "<div style='margin-bottom: 70px;'>";
    echo "<h1><a href=" . $_SERVER['REQUEST_URI'] . "blog/" . $cegnev_normalized . "/" . $q["Id"] . ">" . $q["cim"] . "</a></h1>";
    if (is_null($q["felhasznalo_id"])){
               $user = "torolt felhasznalo";
        } else {
               $user = $conn->query("select nev from felhasznalok where Id=" . $q["felhasznalo_id"])->fetchColumn(0);
        }
    echo "<h5 class='text-left' style='color: DarkRed; font-style: italic;'>" . $user . " - " . $q["datum"] . "</h5>";
    echo $q["szoveg"];
    echo "</div>";
}

?>
</div>
<div class="jumbotron text-center col col-lg-3 bg-primary">
    <?php $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://date.nager.at/api/v2/publicholidays/2017/AT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    ?>
    <script>
        $(document).ready(function () {
        var output = <?php echo $output;?>;
       // $("#aaa").text(output[0].date);
});
        
    </script>
          <h4 id="aaa">Regisztralt cegek</h4>
          <?php
          $options = array(
            "location" => SITE_ROOT . "server/soap.php",
            "uri" => SITE_ROOT . "server/soap.php",
            'keep_alive' => false,
            array('encoding'=>'UTF-8'),
           // 'trace' =>true,
           // 'connection_timeout' => 5000,
           // 'cache_wsdl' => WSDL_CACHE_NONE
        );		
        try {
	        $kliens = new SoapClient(null, $options);
	        $data = $kliens->getCompanies();
	        echo "<ul>";
	        foreach ($data as $d)
	            echo "<li>" . $d .  "</li>";
            } catch (SoapFault $e) {
		        var_dump($e);
            }
            echo "</ul>";
   ?>

        </div>

</div>