<?php     
    include_once("cabecera.php");
    include_once("menu.php");
    include_once("conectBBDD.php");
?>

<div id="sidebar" class="span3">
    <div id="cssmenu">
    <ul>
<?php    
    $con = conectar_bd();
    //$sql = $con->prepare('Select * from categorias;');
    $sql = $con->prepare('Select a.nombre_categoria,a.id_categoria,s.nombre_subcategoria,s.id_subcategoria
                          from categorias a INNER JOIN subcategorias s ON a.id_categoria =s.id_categoria;');
    $sql->execute();
    $controla_duplicados=1;
    $controlUL=true;
    while($datos = $sql->fetch()){
        
        $id_cat=$datos["id_categoria"];
        $id_scat=$datos["id_subcategoria"];        
        $nombre_categoria=$datos["nombre_categoria"];
        $nombre_subcategoria=$datos["nombre_subcategoria"];
        
        if($controla_duplicados == $id_cat){       
            if($controlUL){
                echo '<li class="active has-sub"><a href="showcategories.php?id_cat='.$id_cat.'">';
                echo $nombre_categoria."</a>";
                echo "<ul>";                
                $controlUL=false;
            }
               echo '<li class="has-sub"><a href="showcategories.php?id_scat='.$id_scat.'&id_cat='.$id_cat.'">';
               echo $nombre_subcategoria."</a></li>";
        }else{
               $controlUL=true;
               echo "</ul>";
            echo "</li>";
            echo '<li class="active has-sub"><a href="showcategories.php?id_cat='.$id_cat.'">';
            echo $nombre_categoria."</a>";
               echo "<ul>";
               echo '<li class="has-sub"><a href="showcategories.php?id_scat='.$id_scat.'&id_cat='.$id_cat.'">';
               echo $nombre_subcategoria."</a></li>";
            $controla_duplicados = $id_cat;
        }        
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