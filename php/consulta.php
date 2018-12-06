<?php
   session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['user_name'] != 'test'){
            header('location: admin.php');
        }
    } else {
        header('Location: test.php');
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prosa";    
    echo "<br/><br/>test";
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST["get_registros"])) {
        $sql = "SELECT * FROM series";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $rows = array();
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows);
        } else {
            if($conn->error){
                printf("Error: %s\n",$conn->error);
            } else{
                $cero = array("0 results");
                echo json_encode($cero);
            }
        }
    }

?>
