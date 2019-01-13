<?php 
include("conectBBDD.php");

$usr=$_POST["nick"];

checkNick($usr);

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

function saveUser($usr){
    $pwd=$_POST["password"];
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $direccion=$_POST["direccion"];
    $provincia=$_POST["provincia"];
    $poblacion=$_POST["poblacion"];
    $tlf=$_POST["telefono"];
        
    $con=conectar_bd();
    //id rol 1 para el rol usuario normal      
    $sql=$con->prepare('INSERT INTO usuarios (nick,password,nombre,apellidos,email,direccion,provincia,poblacion,telefono,id_rol,rellenado)
                        VALUES (:nick,:pwd,:nombre,:apellidos,:email,:direccion,:provincia,:poblacion,:telefono,1,1);');
    
    $sql->bindParam(':nick',$usr,PDO::PARAM_STR);
    $sql->bindParam(':pwd',$pwd,PDO::PARAM_STR);
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
    header("location:index.php");

}
?>