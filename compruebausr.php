<?php
include("conectBBDD.php");

$usr=$_POST["usuario"];
$psw=$_POST["inputPassword"];

$con=conectar_bd();
$sql= $con->prepare("Select * from usuarios where nick='" . $usr ."' and password='". $psw ."'");
$sql->execute();

    while($res = $sql->fetch()){    
        $usuario = $res["nick"];
        $id_rol = $res["id_rol"];
    }
if ($usuario){    
        //El usuario existe
        session_start();
        $_SESSION["logon"]= "SI";
        $_SESSION["usr"]= $usuario;
        $_SESSION["rol"]= $id_rol;
        header ("Location: index.php");

}else{
    //El usuario no esta dado de alta y lo reenvio a la pagina de alta.
    header ("Location: registro.php?usr=$usr");
}

?>