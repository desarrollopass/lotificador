<?php 
    $mysqli = new mysqli('localhost','root','','prosa');
    if($mysqli -> connect_errno):
    echo "Error al conectarse a la BD".$mysqli->connect_error;
    endif;
?>