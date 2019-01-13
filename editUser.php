<?php
include_once("conectBBDD.php");

//recibe la variable del menu de navegacion y consulta los valores para introducirlos en el formulario de registro
if(isset($_GET['cuenta'])){
  
    $usr=$_SESSION["usr"];
    $con=conectar_bd();
    $sql=$con->prepare("select * from usuarios where nick='".$usr."'");
    $sql->execute();
    
    while($rst=$sql->fetch()){
        
    $nombre=$rst["nombre"];
    $apellidos=$rst["apellidos"];
    $email=$rst["email"];
    $nick=$rst["nick"];
    $pwd=$rst["password"];   
    $direccion=$rst["direccion"];
    $provincia=$rst["provincia"];
    $poblacion=$rst["poblacion"];
    $tlf=$rst["telefono"];
    }
}
//recibe la variable del form en su opcion editar
if(isset($_GET['edit'])){
    
    $nick=$_POST['nick'];
    $pwd=$_POST["password"];
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $email=$_POST["email"];    
    $direccion=$_POST["direccion"];
    $provincia=$_POST["provincia"];
    $poblacion=$_POST["poblacion"];
    $tlf=$_POST["telefono"];
    $con=conectar_bd();
    $sql=$con->prepare("update usuarios set nick='".$nick."',password='".$pwd."',nombre='".$nombre."',apellidos='".$apellidos."',
                        email='".$email."',direccion='".$direccion."',provincia='".$provincia."',poblacion='".$poblacion."',telefono='".$tlf."' where nick='".$nick."'");      
    $sql->execute();                        
    header("location:index.php");
}
?>