<?php 
    }    
    //Borra linea del carrito
    if(isset($_GET['borrar'])){
            setcookie("cart[$id_articulo]",$cantidad,time()+1800);
        }
        $con=conectar_bd();
        $precio=$sql->fetchColumn(0);
        return $precio;
    }
    //Dibuja la tabla del carrito con los detalles de la compra
        $totalCesta=0;
        echo '<h3> Carrito Compra</h3>';
            foreach($_COOKIE["cart"] as $id => $valor){
        }else{
            echo '<div class="alert alert-danger" role="alert">';
        $con=conectar_bd();
        while($rst=$sql->fetch()){
            $totalCesta=$totalCesta+$rst["precio"];
        return $totalCesta;