<?php 
session_start();
include_once("conectBBDD.php");

    //comprueba si llega datos de articulos
    if(isset($_GET['id_articulo']) && isset($_GET['cantidad'])){
        $id_articulo=$_GET['id_articulo'];
        $cantidad=$_GET['cantidad'];
        addCart($id_articulo,$cantidad);
    }else{
        
    }
    
    //añade al carrito y le establece media hora de permanencia
    function addCart($id_articulo,$cantidad){
        if(isset($_COOKIE["cart"]["$id_articulo"])){
            $cantsuma=$_COOKIE["cart"]["id_articulo"]; 
            setcookie("cart['$id_articulo']",$cantsuma + $cantidad,time()+1800);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }else{
            setcookie("cart['$id_articulo']",$cantidad,time()+1800);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
    
    function loadCart(){
        if(isset($_COOKIE["cart"])){
            $totalUnidades=0;
            $total=0;
            foreach($_COOKIE["cart"] as $id => $valor){                
                $total=$total+(checkPrice($id)*$valor[0]);
                $totalUnidades=$totalUnidades+$valor[0];
            }
            echo "<div class='navbar navbar-inverse navbar-fixed-top'>";
            echo "<div class='topNav'>";
            echo "<div class='container'>";
            echo "<div class='alignR'>";
            echo "<div class='pull-left socialNw'>";
            echo "<a href='#'><span class='icon-twitter'></span></a>";
            echo "<a href='#'><span class='icon-facebook'></span></a>";
            echo "<a href='#'><span class='icon-youtube'></span></a>";
            echo "<a href='#'><span class='icon-tumblr'></span></a>";
            echo "</div>";
            echo "<a href='index.php'> <span class='icon-home'></span> Home</a>";
            echo "<a href='#'><span class='icon-user'></span> My Account</a>";
            echo "<a href='registro.php'><span class='icon-edit'></span> Free Register </a>";
            echo "<a href='contact.html'><span class='icon-envelope'></span> Contact us</a>";
            echo'<a href="shopCart.php"><span class="icon-shopping-cart"></span> '.$totalUnidades.' Artículos - <span class="badge badge-warning icon-euro"> '.$total.'</span></a>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            
        }else{
            
            echo "<div class='navbar navbar-inverse navbar-fixed-top'>";
            echo "<div class='topNav'>";
            echo "<div class='container'>";
            echo "<div class='alignR'>";
            echo "<div class='pull-left socialNw'>";
            echo "<a href='#'><span class='icon-twitter'></span></a>";
            echo "<a href='#'><span class='icon-facebook'></span></a>";
            echo "<a href='#'><span class='icon-youtube'></span></a>";
            echo "<a href='#'><span class='icon-tumblr'></span></a>";
            echo "</div>";
            echo "<a href='index.php'> <span class='icon-home'></span> Home</a>";
            echo "<a href='#'><span class='icon-user'></span> My Account</a>";
            echo "<a href='registro.php'><span class='icon-edit'></span> Free Register </a>";
            echo "<a href='contact.html'><span class='icon-envelope'></span> Contact us</a>";
            echo'<a href="shopCart.php"><span class="icon-shopping-cart"></span> 0 Artículos - <span class="badge badge-warning icon-euro"> 0.00</span></a>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    
    function checkPrice($id){
       
        $con=conectar_bd();
        $sql=$con->prepare("select precio from articulos where id_articulo=".$id);
        $sql->execute();
        
        $precio=$sql->fetchColumn(0);
        return $precio;
    }

?>