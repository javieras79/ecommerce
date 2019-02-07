<?php
include("conectBBDD.php");
//consulta de usuarios registrados si existe arranca session sino se envia al formulario de registro
$usr=$_POST["usuario"];
$pwd=$_POST["inputPassword"];
$usuario="";
$con=conectar_bd();
$sql= $con->prepare("Select * from usuarios where nick='". $usr."'");
$sql->execute();

    while($res = $sql->fetch()){    
        $usuario = $res["nick"];
        $id_usr = $res["id_usuario"];
        $id_rol = $res["id_rol"];
        $pwd_bd=$res["password"];
        $activo=$res["activo"];
    }
    
    if ($usuario && password_verify($pwd, $pwd_bd) && $activo){    
        //El usuario existe

        session_start();
        $_SESSION["logon"]= "SI";
        $_SESSION["usr"]= $usuario;
        $_SESSION["id_usr"]=$id_usr;
        $_SESSION["rol"]= $id_rol;
        header ("Location: index.php");
    
}else{
    //El usuario no esta dado de alta y lo reenvio a la pagina de alta.
    header ("Location: registro.php?usr=$usr");
}

?>
