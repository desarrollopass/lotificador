<?php
     session_start();  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prosa";
    $user = $_SESSION['usuario']['user_name'];    

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //variables-->
    $fecha = utf8_decode($_POST["miFecha"]);
    $host = utf8_decode($_POST["host"]);
    $PPinsert = utf8_decode($_POST["PPinsert"]);
    $MEinsert = utf8_decode($_POST["MEinsert"]);
    $MPinsert = utf8_decode($_POST["MPinsert"]);
    $LMinsert = utf8_decode($_POST["LMinsert"]);
    $NUMinsert = utf8_decode($_POST["NUMinsert"]);

    $sql = "INSERT INTO series (PP_SER,ME_SER,MP_SER,LM_SER,usuario,equipo,fecha,numerico) VALUES ('$PPinsert','$MEinsert','$MPinsert','$LMinsert','$user','$host','$fecha','$NUMinsert')";

    if ($conn->query($sql) === TRUE) {
    echo "Has insertado la serie: ".$PPinsert.$MEinsert.$MPinsert.$LMinsert.$NUMinsert;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>




