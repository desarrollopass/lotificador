<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['user_name'] == 'test'){
            header('location: test.php');
        } else if($_SESSION['usuario']['user_name'] == 'admin'){
            header('location: admin.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
   <title>LOGIN</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/jquery.js"></script>
   <script src="js/main.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Date Time Picker CSS -->        
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
	
	<!-- Main Style CSS -->
	<link href="css/style.css" rel="stylesheet">
   
</head>
<body id="LoginForm" >
    <div class="container">
       <div class="error">
           <span>Datos de Ingreso no válidos</span>
       </div>    
        <div class="card card-container">
            <div class="main-div">
               <div class="panel">
               <h1>Lotificador</h1>
               
               </div>
               <form id="Login" class="form-signin" action="">                
               <input type="text" id="inputVendedor" name="inputUser" pattern="[A-Za-z0-9_-]{1,20}" class="form-control" placeholder="Clave" required autofocus>
               <input type="password" id="inputPassword" name="inputPassword" pattern="[A-Za-z0-9_-]{1,20}" class="form-control" placeholder="Contraseña" required>                
               <input type="submit" class="botonlg" value="iniciar"/>
               <!-- <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>-->
               </form>
               <!--<form id="Login" action="php/login.php" method="post">
                   <div class="form-group">
                       <input type="text" class="form-control" id="inputVendedor" name="inputVendedor" placeholder="Vendedor">
                   </div>
                   <div class="form-group">
                       <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña">
                   </div>                   
                   <button type="submit" class="btn btn-primary">Entrar</button>
               </form>-->
               </div>
        
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <span>Desarrollado por: <a href="http://www.pass.com.mx" target="_blank">PASS Consultores</a></span>
        </div>
    </footer>    
</body>
</html>