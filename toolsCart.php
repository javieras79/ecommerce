<?php session_start();include_once("conectBBDD.php");        //comprueba si llega datos de articulos y a�ade al carrito    if(isset($_GET['id_articulo']) && isset($_GET['cantidad'])){        $id_articulo=$_GET['id_articulo'];        $cantidad=$_GET['cantidad'];        addCart($id_articulo,$cantidad);    }else{      
    }        //Validar usuario para gestion de pedido solicitado    if(isset($_GET['confirmOrder'])){        if(isset($_SESSION['usr'])){            sysOrder();        }else{            header("Location: registro.php");        }            }
    //Borra linea del carrito
    if(isset($_GET['borrar'])){        $id=$_GET['borrar'];        $cantidad=$_COOKIE["cart"][$id];                if($cantidad == 1){            setcookie("cart[$id]",0,time()-1800);            header("Location: " . $_SERVER['HTTP_REFERER']);        }else{            setcookie("cart[$id]",$cantidad-1,time()+3600);            header("Location: " . $_SERVER['HTTP_REFERER']);        }           }    //A�ade al carrito y le establece media hora de permanencia    function addCart($id_articulo,$cantidad){        if(isset($_COOKIE["cart"][$id_articulo])){                      $cantsuma=$_COOKIE["cart"][$id_articulo];             setcookie("cart[$id_articulo]",$cantsuma + $cantidad,time()+1800);            header("Location: " . $_SERVER['HTTP_REFERER']);        }else{   
            setcookie("cart[$id_articulo]",$cantidad,time()+1800);            header("Location: " . $_SERVER['HTTP_REFERER']);
        }    }    //Actualiza cabecera del carrito    function loadCart(){        if(isset($_COOKIE["cart"])){            $totalUnidades=0;            $total=0;            foreach($_COOKIE["cart"] as $id => $valor){                                $total=$total+(checkPrice($id)*$valor[0]);                $totalUnidades=$totalUnidades+$valor[0];            }            echo "<div class='navbar navbar-inverse navbar-fixed-top'>";            echo "<div class='topNav'>";            echo "<div class='container'>";            echo "<div class='alignR'>";            echo "<div class='pull-left socialNw'>";            echo "<a href='#'><span class='icon-twitter'></span></a>";            echo "<a href='#'><span class='icon-facebook'></span></a>";            echo "<a href='#'><span class='icon-youtube'></span></a>";            echo "<a href='#'><span class='icon-tumblr'></span></a>";            echo "</div>";            echo "<a href='index.php'><span class='icon-home'></span> Home</a>";            echo "<a href='#'><span class='icon-user'></span> My Account</a>";            echo "<a href='registro.php'><span class='icon-edit'></span> Free Register </a>";            echo "<a href='contact.html'><span class='icon-envelope'></span> Contact us</a>";            echo'<a href="shopCart.php"><span class="icon-shopping-cart"></span> '.$totalUnidades.' Artículos - <span class="badge badge-warning icon-euro"> '.$total.'</span></a>';            echo "</div>";            echo "</div>";            echo "</div>";            echo "</div>";                    }else{                        echo "<div class='navbar navbar-inverse navbar-fixed-top'>";            echo "<div class='topNav'>";            echo "<div class='container'>";            echo "<div class='alignR'>";            echo "<div class='pull-left socialNw'>";            echo "<a href='#'><span class='icon-twitter'></span></a>";            echo "<a href='#'><span class='icon-facebook'></span></a>";            echo "<a href='#'><span class='icon-youtube'></span></a>";            echo "<a href='#'><span class='icon-tumblr'></span></a>";            echo "</div>";            echo "<a href='index.php'> <span class='icon-home'></span> Home</a>";            echo "<a href='#'><span class='icon-user'></span> My Account</a>";            echo "<a href='registro.php'><span class='icon-edit'></span> Free Register </a>";            echo "<a href='contact.html'><span class='icon-envelope'></span> Contact us</a>";            echo'<a href="shopCart.php"><span class="icon-shopping-cart"></span> 0 Artículos - <span class="badge badge-warning icon-euro"> 0.00</span></a>';            echo "</div>";            echo "</div>";            echo "</div>";            echo "</div>";        }    }    //Chequea el precio del articulo    function checkPrice($id){    
        $con=conectar_bd();        $sql=$con->prepare("select precio from articulos where id_articulo=".$id);        $sql->execute();      
        $precio=$sql->fetchColumn(0);
        return $precio;
    }
    //Dibuja la tabla del carrito con los detalles de la compra    function showCart(){       
        $totalCesta=0;        $totalArticulos=0;                if(isset($_COOKIE['cart'])){         
        echo '<h3> Carrito Compra</h3>';        echo '<hr class="soft">';        echo '<div class="well">';           echo '<hr class="soft">';        echo '<div class="table-responsive">';        echo '<table class="table table-condensed">';        echo '<tr class="success">';        echo "<td><strong>Uds.</strong></td>";                echo "<td><strong>Id Art.</strong></td>";        echo "<td><strong>Articulo</strong></td>";        echo "<td><strong>Descripcion</strong></td>";        echo "<td><strong>Precio</strong></td>";        echo "<td><center><strong>Borra</strong></center></td>";        echo "</tr>";              
            foreach($_COOKIE["cart"] as $id => $valor){                $totalCesta+=loadArticleCart($id,$valor);                $totalArticulos=$totalArticulos+$valor;            }                        echo "</table>";                        echo '<table class="table table-condensed">';            echo '<tr class="success">';            echo "<td><strong>Total Unidades</strong></td><td><strong>".$totalArticulos."</strong></td>";             echo "<td></td>";            echo "<td></td>";            echo "<td><strong>Total:</strong></td><td><strong>".$totalCesta.".00 euros</strong></td>";            echo "</tr>";                        echo "<tr><td><a class='shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Volver</a>  ";            echo "<a class='shopBtn' href='toolsCart.php?confirmOrder=SI'>Confirmar Pedido</a>  ";            echo "<a class='shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Seguir Comprando</a></td></tr>";            echo "</table>";                        echo "</div>";            echo "</div>";   
        }else{
            echo '<div class="alert alert-danger" role="alert">';            echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';            echo 'No existen articulos en el carrito';            echo '</div>';            echo'<a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Sequir Comprando </a>';        }        return;            }    //Carga los detalles del carrito en el dibujo de la tabla    function loadArticleCart($id,$valor){       
        $con=conectar_bd();        $sql=$con->prepare('select * from articulos where id_articulo='.$id);        $sql->execute();        $totalCesta=0;        
        while($rst=$sql->fetch()){
            $totalCesta=$totalCesta+$rst["precio"];            echo '<tr>';            echo "<td>";            echo $valor;            echo "</td>";            echo "<td>";            echo $rst["id_articulo"];            echo "</td>";            echo "<td>";            echo $rst["nombre_articulo"];;            echo "</td>";            echo "<td>";            echo $rst["descripcion"];            echo "</td>";            echo "<td>";            echo $rst["precio"];            echo "</td>";            echo "<td>";            echo '<center><a href="toolsCart.php?borrar='.$rst['id_articulo'].'">Borrar</a></center>';            echo "</td>";            echo "</tr>";                                    }       
        return $totalCesta;    }    //Gestiona pedido    function sysOrder(){        $usuario=$_SESSION["usr"];        $rol=$_SESSION["rol"];                if(isset($_COOKIE['cart'])){            $id_usuario=checkUser($usuario);            $pedido=addOrder($id_usuario);            echo "Pedido registrado";             }else{                    }            }        //Devuelve el usuario logado en sesion    function checkUser($usuario){        $con=conectar_bd();        //$sql= $con->prepare("Select * from usuarios where nick='" . $usr ."' and password='". $psw ."'");        $sql=$con->prepare("Select id_usuario from usuarios where nick='".$usuario."'");        $sql->execute();        $id_usuario=$sql->fetchColumn(0);        //cerrar_conexion($con);        return $id_usuario;    }    //Añade Pedido    function addOrder($id_usuario){        $con=conectar_bd();        $sql=$con->prepare("INSERT INTO pedido (id_usuario,id_estado,FechaPedido,id_tienda,activo) VALUES (:id_usuario,1,now(),1,0);");        $sql->bindParam(':id_usuario', $id_usuario,PDO::PARAM_INT);        $sql->execute();        $sql=$con->prepare("select max(id_pedido) as pedido from pedido where id_usuario=".$id_usuario);        $sql->execute();        $reg=$sql->fetch();      //  cerrar_conexion($con);        return $reg['pedido'];    }?>