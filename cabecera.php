<?php 
include("toolsCart.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Airsoft Javier Aznar</title>
    <meta name="description" content="Tienda online de Airsoft">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="js/validaciones.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> -->
    <script src="js/main.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="ico/favicon.ico">
</head>
<body>

<!-- 
	Upper Header Section 
-->
<?php 
loadCart();
?>	
<!--
Cabecera común a todas las paginas
-->
<div class="container">
    <div id="gototop"> </div>
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="index.php">
                        <img src="img/logo-tienda.png" alt="shop">
                    </a>
                </h1>
            </div>
            <div class="span8 alignR">
                <p><br> <strong> Contacto: (24/7) :  666 222 444 </strong><br><br></p>
                <p style="color: darkred; font-size: 20px"><br> <strong> Tienda On-line de Airsoft</strong><br><br></p>
            </div>
        </div>
    </header>

