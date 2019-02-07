<?php 
include_once("conectBBDD.php");

$usr=$_POST["nick"];

checkNick($usr);
//Chequea si el usuario existe y redirecciona si encuentra
function checkNick($usr){    
    $con=conectar_bd();
    $sql=$con->prepare("select nick from usuarios where nick='".$usr."'");
    $sql->execute();
    
    if ($sql->fetchColumn(0)){
        //El nick está ocupado reenvio a Login para que cambie los datos.
        header ("Location: registro.php?usr=$usr&existeusr=SI");
    }else{
        saveUser($usr);
    }
}
//funcion que inserta un registro de usuario y posteriormente inicia una sesion
function saveUser($usr){
    $pwd=$_POST["password"];
    $pwd_enc=password_hash($pwd, PASSWORD_DEFAULT);
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $direccion=$_POST["direccion"];
    $provincia=$_POST["provincia"];
    $poblacion=$_POST["poblacion"];
    $tlf=$_POST["telefono"];
        
    $con=conectar_bd();
    //id rol 1 para el rol usuario normal      
    $sql=$con->prepare('INSERT INTO usuarios (nick,password,nombre,apellidos,email,direccion,provincia,poblacion,telefono,id_rol)
                        VALUES (:nick,:pwd,:nombre,:apellidos,:email,:direccion,:provincia,:poblacion,:telefono,1);');
    
    $sql->bindParam(':nick',$usr,PDO::PARAM_STR);
    $sql->bindParam(':pwd',$pwd_enc,PDO::PARAM_STR);
    $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $sql->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
    $sql->bindParam(':email',$email,PDO::PARAM_STR);
    $sql->bindParam(':direccion',$direccion,PDO::PARAM_STR);
    $sql->bindParam(':provincia',$provincia,PDO::PARAM_STR);
    $sql->bindParam(':poblacion',$poblacion,PDO::PARAM_STR);
    $sql->bindParam(':telefono',$tlf,PDO::PARAM_STR);
    $sql->execute();
    
    session_start();
    $_SESSION["logon"]= "SI";
    $_SESSION["usr"]= $usr;
    
    $sql=$con->prepare("select * from usuarios where nick='".$usr."'");
    $sql->execute();
    
    while($res = $sql->fetch()){
        $usuario = $res["nick"];
        $id_usr = $res["id_usuario"];
        $id_rol = $res["id_rol"];
        $pwd_bd=$res["password"];
    }
    
    $_SESSION["logon"]= "SI";
    $_SESSION["usr"]= $usuario;
    $_SESSION["id_usr"]=$id_usr;
    $_SESSION["rol"]= $id_rol;
    header("location:index.php");

}

?>