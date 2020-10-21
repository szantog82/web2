<?php
class Menu
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function main($blogszam = - 1)
    {
        $d = new Database;
        $conn = $d->get_connection();
?>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@900&display=swap');
         @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    
        img
        { 
            max-width: 600px;
            max-height: 480px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .jumbotron p {
            font-size: 18x;
            text-align: justify;
            margin-left: 60px;
            margin-right: 60px;
            line-height: 1.5;
            font-family: 'Open Sans', sans-serif;
        }
        
        .h2, h2 {
            font-size: 20px;
        }
        
        .h1, h1 {
            font-family: 'Arima Madurai', cursive;
        }
        
        h6 {
           font-size: 15px;
           margin: 20px;
        }
        
       .navbar-inverse .navbar-nav > li > a {
            color: white;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            font-size: 12px;
        }
        
        .container .navbar-brand, .navbar > .container-fluid .navbar-brand {
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
            color: white;
            font-weight: 600;
        }
        
    </style>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
  <title>Növénytermesztők oldala</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  <?php if ($this->page == "Blog")
        { 
  //
  //Blog oldalra vonatkozo php script
  //
        
        ?>
  <script>
     $(document).ready(function() {
         document.getElementById("comment").value = "";
     });
     
     function Comment(text, blog_id){
       this.text = text;
       this.blog_id = blog_id;
       
       this.addToDOM = function(){
           var d = new Date();
           var dateString = d.getUTCFullYear() + "-" + (d.getUTCMonth() + 1) + "-" + d.getUTCDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
           $("#comment_section").append("<div class='d-lg-inline-block bg-success'><h6 class='text-justify text-left'>" + this.text + "</h6><h6 class='text-right' style='font-weight: bold;'>" + "<?php echo $_SESSION["nev"]; ?>" + ": " + dateString + "</h6></div>");       
       }
       this.upload = function(){
           $.post("<?= SITE_ROOT ?>komment_feltolt", {comment: this.text, blog_id: this.blog_id});
       }
     };
     
      function commentSubmitValidate() {
      var valid = true;
      var comment = $("#comment").val();
      if (comment.length < 2) {
        alert("Hianyzik a szoveg!");
        valid = false;
      }
       if (valid){
           const newComment = new Comment($("#comment").val(), <?php echo $blogszam; ?>);
            newComment.addToDOM();
            newComment.upload();
            $("#comment").val("");
      }
      return false;
    }
  </script>
  <?php
  //
  //Blog oldalra vonatkozo php script vege
  //
          }
          
  //
  //Blogfeltoltes oldalra vonatkozo php script
  //
        else if ($this->page == "Blogfeltoltes")
        { ?>
     <script> 
          function blogSubmitValidate() {
      var valid = true;
      var title = $("#blog_cim").val();
      var text = CKEDITOR.instances["blog_text"].getData();
      if (title.length < 2) {
        alert("Hiányzik a cím!");
        valid = false;
      }
      if (text.length < 2) {
        alert("Hiányzik a szöveg!");
        valid = false;
      }
      return valid;
    }
</script><?php
  //
  //Blogfeltoltes oldalra vonatkozo php script vege
  //


        }
        
  //
  //Admin oldalra vonatkozo php script
  //    
        
        else if ($this->page == "Admin")
        { ?>
    <script>
    $(document).ready(function() {
        $('input').change(function(){
            if(this.classList[0] == "felhasznalo"){
                $.post("<?= SITE_ROOT ?>felhasznalo_valt", {felhasznalo_id: this.name, uj_ertek: this.value}, function(result){
                });
            }
        });
        $(".torles").click(function(){
            if (confirm("Biztos, hogy toroljuk?")) {
                $.ajax({
                    type: "DELETE",
                    url:"<?= SITE_ROOT ?>felhasznalo_valt",
                    data: {felhasznalo_id: this.id},
                    success: function(data){
                    console.log(data);
                    }
                });
            $(this).parent().parent().fadeOut(300);
            }
        });
        });
    </script>
            
            
        <?php
        
   //
  //Admin oldalra vonatkozo php script vege
  //    
        } ?>

  <style>
      .dropdown:hover > .dropdown-menu {
    display: block;
    margin-top: 0;
 }

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}
</style>
  </style>
</head>


<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header" style="margin-left: 10%"><a href="/" class="navbar-brand">Novenytermesztok</a>
      </div>

      <ul class="nav navbar-nav">
          
          
          <?php
        $Id_s = Array();

        $query = "select * from menu";
        $results = $conn->query($query)->fetchAll();
        foreach ($results as $result)
        {
            $query2 = "select * from menu where szulo=" . $result["Id"];
            $results2 = $conn->query($query2)->fetchAll();
            if (count($results2) < 1 && !in_array($result["Id"], $Id_s))
            {
                echo "<li><a href='" . SITE_ROOT . ltrim($result["link"], '/') . "'>" . $result["cimke"] . "</a></li>\n";
                array_push($Id_s, $result["Id"]);
            }
            else if (!in_array($result["Id"], $Id_s))
            {
                echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='" . SITE_ROOT . ltrim($result["link"], '/') . "'>" . $result["cimke"] . "<span class='caret'></span></a>\n";
                echo "<ul class='dropdown-menu'>\n";
                array_push($Id_s, $result["Id"]);

                foreach ($results2 as $result2)
                {
                    $query3 = "select * from menu where szulo=" . $result2["Id"];
                    $results3 = $conn->query($query3)->fetchAll();

                    if (count($results3) !== 0 && !in_array($result2["Id"], $Id_s))
                    {
                        echo "<li class='dropdown-submenu'><a href='" . SITE_ROOT . ltrim($result2["link"], '/') . "' class='dropdown-toggle' data-toggle='dropdown'>" . $result2["cimke"] . "</a>\n";
                        echo "<ul class='dropdown-menu'>\n";
                        array_push($Id_s, $result2["Id"]);
                        foreach ($results3 as $result3)
                        {
                            echo "<li><a href='" . SITE_ROOT . ltrim($result3["link"], '/') . "'>" . $result3["cimke"] . "</a></li>\n";
                            array_push($Id_s, $result3["Id"]);
                        }
                        echo "</ul>\n";
                        echo "</li>\n";
                    } else if (!in_array($result2["Id"], $Id_s)){
                        echo "<li><a href='" . SITE_ROOT . ltrim($result2["link"], '/') . "'>" . $result2["cimke"] . "</a></li>";
                        array_push($Id_s, $result2["Id"]);
                    }

                }
                echo "</ul>\n";
                echo "</li>\n";
            }
        }

?>
       
      </ul>

      <ul class="nav navbar-nav navbar-right" style="margin-right: 10%">
          <?php
        if (isset($_SESSION["jogosultsag_id"]) && $_SESSION["jogosultsag_id"] == 1)
        {
            echo "<li><a href='" . SITE_ROOT . "admin'><span class='glyphicon glyphicon-tasks'></span> Admin</a></li>";
        }
?>
        <?php
        if (isset($_SESSION["nev"]) && !empty($_SESSION["nev"]))
        {
            echo "<li><a href='#' style='color: yellow; font-style: italic;'>Üdvözöllek, " . $_SESSION["nev"]  . "</a></li>";
            if ($_SESSION["jogosultsag_id"] < 3){
             echo "<li><a href='" . SITE_ROOT . "blogfeltoltes'>Új blogbejegyzés</a></li>";
            }

            echo "<li><a href='" . SITE_ROOT . "kijelentkezes'><span class='glyphicon glyphicon-log-out'></span> Kijelentkezés</a></li>";
        }
        else
        {
            echo "<li><a href='#' style='color: yellow; font-style: italic;'>Vendég</a></li>";
            echo "<li><a href='" . SITE_ROOT . "bejelentkezes'><span class='glyphicon glyphicon-log-in'></span> Bejelentkezés</a></li>";
        }
?>
      </ul>
    </div>
  </nav>
 
<?php
    }

}

?>
