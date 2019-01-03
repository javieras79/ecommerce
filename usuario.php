<?php
include("conectBBDD.php");
$usr=$_POST["nick"];
$psw=$_POST["password"];
$email=$_POST["email"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$direccion=$_POST["direccion"];
$provincia=$_POST["provincia"];
$poblacion=$_POST["poblacion"];
$tel=$_POST["telefono"];

compruebaNick($usr,$email,$psw,$nombre,$apellidos,$direccion,$provincia,$poblacion,$tel);

function compruebaNick($usr,$email,$psw,$nombre, $apellidos, $direccion, $provincia, $poblacion, $tel){
    $con=conectar_bd();
    $sql="select * from usuarios where nick='" .$usr . "'";
    $res=mysqli_query($con,$sql);
    if (mysqli_num_rows($res)>0){
        //El nick está ocupado reenvio a Login para que cambie los datos.
        header ("Location: registro.php?usr=$usr&existeusr=SI");
    }else{
        guardaUsuario($usr,$email,$psw,$nombre, $apellidos, $direccion, $provincia, $poblacion, $tel);
    }
}

function guardaUsuario($nick,$email,$psw,$nombre,$apellidos,$direccion,$provincia,$poblacion, $telef){
    $con=conectar_bd();
    //id rol 1 para el rol usuario normal
    $sql= "Insert into usuarios (nick, password, nombre, apellidos, email, direccion, provincia, poblacion, telefono, id_rol, rellenado )
           values ('". $nick ."','". $psw ."','". $nombre ."','". $apellidos ."','".$email ."','".$direccion."','".$provincia."','" . $poblacion ."','". $telef ."',1,1)";
    $res=mysqli_query($con,$sql);

    session_start();
    $_SESSION["logonBROS"]= "SI";
    $_SESSION["usr"]= $nick;
    header("location:index.php");

}

