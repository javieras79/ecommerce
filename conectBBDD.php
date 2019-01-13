<?php
include_once("appSettings.php");
    //Método para abrir una conexión a la base de datos
    function conectar_bd() {
        
        $con = new PDO('mysql:host=localhost;dbname=onlineshop','usr_shp','JaMe47l',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $con;
    }

    //Metodo para cerrar una conexión
    function cerrar_conexion($con) {
        $con=null;         
    }

?>