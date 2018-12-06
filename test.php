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
         <script src="js/main.js"></script>
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
        <div id="contenedor">
           <h1>Asignador de Lotes</h1>
            <div class="row">
               <div id="renglon" class="row">
                   <div id="columna" class="col-md-1"><h2>PP</h2></div>
                   <div id="columna" style="margin-left: 80px;" class="col-md-3">
                   <h2 id="PP_SER">
                       <?php
                        $sql = "select PP_SER from series ORDER BY PP_SER DESC limit 1";
                        $result = $conn -> query($sql);
                        if ($result -> num_rows >0){
                            $rows = array();
                            while($row = $result->fetch_assoc()) {
                                $seriePP = $row["PP_SER"];
                            }
                            echo $seriePP;
                           // echo json_encode($rows[0]);
                        } else {
                            if ($conn->error) {
                            printf("Error: %s\n", $conn->error);
                            } else {
                            $cero = array("0 results");
                            echo json_encode($cero);
                            }                            
                        }
                       ?>
                   </h2>
                   </div>                    
                   <div id="columna" class="col-md-3"><button type="button" id="asignaPP" style="margin-left: 50px" class="btn btn-primary">Asignar</button></div>
               </div>
               <div id="renglon" class="row">
                   <div id="columna" class="col-md-1"><h2>ME</h2></div>
                   <div id="columna" style="margin-left: 80px;" class="col-md-3">
                   <h2 id="ME_SER">
                       <?php
                        $sql = "select ME_SER from series ORDER BY ME_SER DESC limit 1";
                        $result = $conn -> query($sql);
                        if ($result -> num_rows >0){
                            $rows = array();
                            while($row = $result->fetch_assoc()) {
                                $serieME = $row["ME_SER"];
                            }
                            echo $serieME;
                           // echo json_encode($rows[0]);
                        } else {
                            if ($conn->error) {
                            printf("Error: %s\n", $conn->error);
                            } else {
                            $cero = array("0 results");
                            echo json_encode($cero);
                            }
                        }
                       ?>
                   </h2>
                   </div> 
                   <div id="columna" class="col-md-3"><button type="button" id="asignaME" style="margin-left: 50px" class="btn btn-primary">Asignar</button></div>
               </div>
               <div id="renglon" class="row">
                   <div id="columna" class="col-md-1"><h2>MP</h2></div>
                   <div id="columna" style="margin-left: 80px;" class="col-md-3">
                   <h2 id="MP_SER">
                       <?php
                        $sql = "select MP_SER from series ORDER BY MP_SER DESC limit 1";
                        $result = $conn -> query($sql);
                        if ($result -> num_rows >0){
                            $rows = array();
                            while($row = $result->fetch_assoc()) {
                                $serieMP = $row["MP_SER"];
                            }
                            echo $serieMP;
                           // echo json_encode($rows[0]);
                        } else {
                            if ($conn->error) {
                            printf("Error: %s\n", $conn->error);
                            } else {
                            $cero = array("0 results");
                            echo json_encode($cero);
                            }
                        }
                       ?>
                   </h2>
                   </div> 
                   <div id="columna" class="col-md-3"><button type="button" id="asignaMP" style="margin-left: 50px" class="btn btn-primary">Asignar</button></div>
               </div>
               <div id="renglon" class="row">
                   <div id="columna" class="col-md-1"><h2>LM</h2></div>
                   <div id="columna" style="margin-left: 80px;" class="col-md-3">
                   <h2 id="LM_SER">
                       <?php
                        $sql = "select LM_SER from series ORDER BY LM_SER DESC limit 1";
                        $result = $conn -> query($sql);
                        if ($result -> num_rows >0){
                            $rows = array();
                            while($row = $result->fetch_assoc()) {
                                $serieLM = $row["LM_SER"];
                            }
                            echo $serieLM;
                           // echo json_encode($rows[0]);
                        } else {
                            if ($conn->error) {
                            printf("Error: %s\n", $conn->error);
                            } else {
                            $cero = array("0 results");
                            echo json_encode($cero);
                            }
                        }
                       ?>
                   </h2>
                   </div> 
                   <div id="columna" class="col-md-3"><button type="button" id="asignaLM" style="margin-left: 50px" class="btn btn-primary">Asignar</button></div>
               </div>
               <div id="renglon" class="row">
                   <div id="columna" class="col-md-1"><h2>NUMÉRICO</h2></div>
                   <div id="columna" style="margin-left: 80px;" class="col-md-3">
                   <h2 id="numerico">
                        <?php
                        $sql = "select numerico from series ORDER BY numerico DESC limit 1";
                        $result = $conn -> query($sql);
                        if ($result -> num_rows >0){
                            $rows = array();
                            while($row = $result->fetch_assoc()) {
                                $serieNUM = $row["numerico"];
                            }
                            echo $serieNUM;
                           // echo json_encode($rows[0]);
                        } else {
                            if ($conn->error) {
                            printf("Error: %s\n", $conn->error);
                            } else {
                            $cero = array("0 results");
                            echo json_encode($cero);
                            }
                        }
                       ?>
                   </h2>
                   </div>
                   <div id="columna" class="col-md-3"><button type="button" id="asignaNUM" style="margin-left: 50px" class="btn btn-primary">Asignar</button></div>
            </div>
        </div>
        <h2 id="host" class="hidden"><?php $host = gethostname(); echo $host  ?> </h2>       
        <script src="js/bootstrap.js"></script>
        <!--<script>            
            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
            var f=new Date();
            var miFecha = diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + " a las  " + f.getHours() + ":" + f.getMinutes() + ":" + f. getSeconds();
            var pp_ser = $("#PP_SER").text(); 
            
            document.write(miFecha+ pp_ser.substring());
            
        </script> -->
    </body>
</html>