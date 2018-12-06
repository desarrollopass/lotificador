<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    require 'conexion.php';
    sleep(2);
    session_start();
    $mysqli -> set_charset('utf8');
    $usuario = $mysqli -> real_escape_string($_POST['inputUser']);
    $pass = $mysqli -> real_escape_string($_POST['inputPassword']);
    
    if($nueva_consulta = $mysqli -> prepare("SELECT user_name, user_password FROM usuarios WHERE user_name = ? AND user_password = ?")){
        $nueva_consulta -> bind_param('ss',$usuario,$pass);
        $nueva_consulta -> execute();
        $resultado = $nueva_consulta -> get_result();
        
        if($resultado -> num_rows == 1){
            $datos = $resultado -> fetch_assoc();
            $_SESSION['usuario'] = $datos;
            echo json_encode(array('error' => false, 'tipo' => $datos['user_name']));
        } else{
            echo json_encode(array('error' => true));
        }
        $nueva_consulta -> close();
    }
}

$mysqli -> close();

?>