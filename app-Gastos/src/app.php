<!-- aqui validamos para hacer el sistema de ruteo 
    si existe la variable view, entonces la variable view es igual a la variable $_GET["view"]
    y llama a require"src/{$view}.php"; si no, lo manda al home

-->
<?php

if(isset($_GET["view"])){
    $view = $_GET["view"];
    
    require"src/{$view}.php";

}else{
    require"src//home.php";
}