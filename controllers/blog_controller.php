<?php

class Blog_controller{

public function main($vars){
    include_once (SERVER_ROOT. '/models/blog_view_model.php');
    $model = new Blog_view_model($vars);
}

}

?>			