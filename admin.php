<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['user_name'] != 'admin'){
            header('location: test.php');
        }
    } else {
        header('Location: admin.php');
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prosa";    

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
         <script src="js/jquery-3.3.1.min.js"></script>
         <script src="js/jquery.js"></script>
         <script src="js/lista-series.js"></script>
         <!-- Bootstrap Core CSS -->
         <link href="css/bootstrap.min.css" rel="stylesheet">

         <!-- Date Time Picker CSS -->        
         <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

         <!-- Main Style CSS -->
         <link href="css/style.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Administrador</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
               <a class="navbar-brand logo" href="#">
                <!--<img src="img/LOGO.png" alt="Logo BIO">-->
               </a>               
                <div id="navheader">                
                    <ul class="list-inline" id="userLogin">
                        <li class="nav-item">
                        <a class="nav-link" href="#"><span id="span-header">Bienvenido: <?php echo $_SESSION['usuario']['user_name']?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/logout.php" id="span-header">Cerrar Sesión</a>
                    </li>   
                    </ul>
                </div>           
            </div>        
        </nav>
        <?php
            if($conn == TRUE){
                $sql = "SELECT * FROM series";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    $rows = array();
                    $table = "<table id='table_registro'>\n<thead>\n<tr>\n";
                    $table .= '<th>PP_SER</th><th>ME_SER</th><th>MP_SER</th><th>LM_SER</th><th>USUARIO</th><th>EQUIPO</th><th>FECHA</th><th>NUMERICO</th></tr></thead>';
                    $table .= '<tbody>';
                    
                    while ($row = $result->fetch_assoc()) {
                        $table .= '<tr><td>'.$row["PP_SER"].'</td><td>'.$row["ME_SER"].'</td><td>'.$row["MP_SER"].'</td><td>'.$row["LM_SER"].'</td><td>'.$row["usuario"].'</td><td>'.$row["equipo"].'</td><td>'.$row["fecha"].'</td><td>'.$row["numerico"].'</td></tr>';
                    }
                    $table .= '</tbody>';
                    echo $table .= '</table>';
                } else {
                    if ($conn->error) {
                        printf("Error: %s\n", $conn->error);
                    } else{
                        $cero = array("0 results");
                        echo json_encode($cero);
                    }
                }
            }else{
                echo "Error con la BD";
            }
        ?>
        <!--<div class="table-responsive" id="clieTable">
           <table class="table_reg" id="table_registro">
               <thead>
                   <tr>
                     <th width="20%">PP_SER</th>                     
                     <th width="35%">ME_SER</th>
                     <th width="15%">MP_SER</th>
                     <th width="10%">LM_SER</th>                
                     <th width="10%">Usuario</th>                
                     <th width="10%">Equipo</th>                
                     <th width="10%">Fecha</th>                
                     <th width="10%">Numérico</th>                
                   </tr>
               </thead>
               <tbody class="list">
               </tbody>
           </table>
           <ul id="cliepag" class="pagination"></ul>
        </div> -->
    </body>
</html>