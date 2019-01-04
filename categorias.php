<?php     
    include_once("cabecera.php");
    include_once("menu.php");
    include_once("conectBBDD.php");
?>

<div id="sidebar" class="span3">
    <div class="well well-small">
    <ul class="nav nav-list">
<?php    
    $con = conectar_bd();
    $sql = $con->prepare('Select * from categorias;');
    $sql->execute();
    while($datos = $sql->fetch()){
        
        $id_cat=$datos["id_categoria"];
        $nombre_categoria=$datos["nombre_categoria"];       
        echo '<li><a href="showcategories.php?id_cat='.$id_cat.'">';
        echo "<span class='icon-chevron-right'></span>".$nombre_categoria."</a></li>";        
    }
?>
<!--     	                
            <li><a href="#"><span class="icon-chevron-right"></span>Uniformes</a></li>
            <li><a href="#"><span class="icon-chevron-right"></span>Accesorios</a></li>
            <li><a href="#"><span class="icon-chevron-right"></span>Consumibles</a></li>
            <li style="border:0"> &nbsp;</li>
            <!--<li> <a class="totalInCart" href="#"><strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;">$448.42</span></strong></a></li>
-->
		    <li style="border:0"> &nbsp;</li>
		    
        </ul>
        
    </div>
    <div class="well well-small" ><a href="#"><img src="img/paypal.jpg" alt="payment method paypal"></a></div>
</div>