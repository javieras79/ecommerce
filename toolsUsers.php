<?php
include_once("conectBBDD.php");

    //funcionar que carga tabla de articulos pero del men� de mantenimiento perfil con rol 3
    function mtoUsers(){
        
        echo '<div class="span13">';
        echo '<h3> Mantenimiento de Usuarios</h3>';
        echo '<hr class="soft">';
        echo '<div class="well">';
        echo '<a class="shopBtn" href="mtoUsers.php">Nuevo Usuario</a>';
        echo '<hr class="soft">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-condensed">';
        echo '<tr class="success">';
        echo "<td><strong>";
        echo "Nick";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Pwd";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Nombre";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Apellidos";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Email";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Dirección";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Provincia";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Población";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Teléfono";
        echo "</strong></td>";   
        echo "<td><strong>";
        echo "Activo";
        echo "</strong></td>";
        echo "<td><strong>";
        echo "Rol";
        echo "</strong></td>";
        echo "</tr>";
        
        $con = conectar_bd();
        $sql = $con->prepare("select * from usuarios");
        $sql->execute();
        
        while($datos = $sql->fetch()){
            
            echo "<tr>";
            $id = $datos["id_usuario"];                
            echo "<td>";
            $nick = $datos["nick"];
            echo $nick;
            echo "</td>";
            echo "<td>";
            $pwd = $datos["password"];
            echo "******";
            echo "</td>";
            echo "<td>";
            $nombre = $datos["nombre"];
            echo $nombre;
            echo "</td>";
            echo "<td>";
            $apellidos = $datos["apellidos"];
            echo $apellidos;
            echo "</td>";
            echo "<td>";
            $email = $datos["email"];
            echo $email;
            echo "</td>";
            echo "<td>";
            $direccion = $datos["direccion"];
            echo $direccion;
            echo "</td>";
            echo "<td>";
            $provincia = $datos["provincia"];
            echo $provincia;
            echo "</td>";
            echo "<td>";
            $poblacion = $datos["poblacion"];
            echo $poblacion;
            echo "</td>";
            echo "<td>";
            $tlf = $datos["telefono"];
            echo $tlf;
            echo "</td>";        
            echo "<td>";
            echo '<div style="text-align: left">';
            $activo=$datos["activo"];
            if ($activo==0){
                $chk="";
            }else{
                $chk="checked";
            }
            echo '<center><input type="checkbox" name="checkbox[]"'. $chk .' disabled></center>';
            echo '</div>';
            echo "</td>";
            echo "<td>";
            $rol = $datos["id_rol"];
            echo $rol;
            echo "</td>";
                    
            echo "<td><center>";
            echo '<a href="mtoUsers.php?editar=SI&id='.$id.'"><span class="icon icon-edit" aria-hidden="true"></span> </a>';
            echo '<a href="toolsUsers.php?remUser=SI&id='.$id.'"><span class="icon icon-trash" aria-hidden="true"></span></a>';
            echo "</center></td>";
            echo "</tr>";
            
        }
        
        echo "</table>";
        
        //mensaje articulo a�adido
        if(isset($_GET['alta'])){
            echo "<p style='color:green;'>El usuario ha sido agregado con Éxito.</p>";
        }
        //mensaje articulo borrado
        if(isset($_GET['borra'])){
            echo "<p style='color:green;'>El usuario ha sido borrado con Éxito.</p>";
        }
        //mensaje articulo borrado
        if(isset($_GET['actualiza'])){
            echo "<p style='color:green;'>El usuario ha sido modificado con Éxito.</p>";
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    
    //Actualiza usuario
    if(isset($_GET["editUser"])){
        
        $id=$_GET['id'];
        $pwd=$_POST['pwd'];
        $pwd_enc=password_hash($pwd, PASSWORD_DEFAULT);
        $nick=$_POST['nick'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $direccion=$_POST['direccion'];
        $provincia=$_POST['provincia'];
        $poblacion=$_POST['poblacion'];
        $telefono=$_POST['telefono'];
        if(isset($_POST['activo'])){
            $activo=1;
        }else{
            $activo=0;
        }
        $rol=$_POST['rol'];
        $con=conectar_bd();
        $sql=$con->prepare('update usuarios set nick="'.$nick.'",password="'.$pwd_enc.'",nombre="'.$nombre.'",apellidos="'.$apellidos.'",
                            email="'.$email.'",direccion="'.$direccion.'",provincia="'.$provincia.'",poblacion="'.$poblacion.'",
                            telefono="'.$telefono.'",activo="'.$activo.'",id_rol="'.$rol.'" where id_usuario='.$id);
        $sql->execute();
        header("Location: listUsers.php?actualiza='ok'"); 
    }
    
    //A�ade usuario
    if(isset($_GET['addUser'])){
        
        $nick=$_POST['nick'];
        $pwd=$_POST['pwd'];
        $pwd_enc=password_hash($pwd, PASSWORD_DEFAULT);
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $direccion=$_POST['direccion'];
        $provincia=$_POST['provincia'];
        $poblacion=$_POST['poblacion'];
        $telefono=$_POST['telefono'];
        if(isset($_POST['activo'])){
            $activo=1;
        }else{
            $activo=0;
        }
        $rol=$_POST['rol'];
        $con=conectar_bd();
        $sql=$con->prepare('insert into usuarios (nick,password,nombre,apellidos,email,direccion,provincia,poblacion,telefono,activo,id_rol)
                             VALUES (:nick,:pwd,:nombre,:apellidos,:email,:direccion,:provincia,:poblacion,:telefono,:activo,:rol);');
        
        $sql->bindParam(':nick',$nick,PDO::PARAM_STR);
        $sql->bindParam(':pwd',$pwd_enc,PDO::PARAM_STR);
        $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $sql->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
        $sql->bindParam(':email',$email,PDO::PARAM_STR);
        $sql->bindParam(':direccion',$direccion,PDO::PARAM_STR);
        $sql->bindParam(':provincia',$provincia,PDO::PARAM_STR);
        $sql->bindParam(':poblacion',$poblacion,PDO::PARAM_STR);
        $sql->bindParam(':telefono',$telefono,PDO::PARAM_STR);
        $sql->bindParam(':activo',$activo,PDO::PARAM_INT);
        $sql->bindParam(':rol',$rol,PDO::PARAM_INT);
        $sql->execute();
        header("Location: listUsers.php?alta='ok'");
    }
    
    //Borra Usuario
    if(isset($_GET["remUser"])){
        $id=$_GET['id'];
        $con=conectar_bd();
        $sql=$con->prepare('delete from usuarios where id_usuario='.$id);
        $sql->execute();
        header("Location: listUsers.php?borra='ok'");
    }    
?>

