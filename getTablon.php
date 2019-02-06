<?php

function preparaTablon(){
    $con=conectar_bd();
    $sql=$con->prepare('select * from articulos where imagen!="sin_resultados.jpg" and tablon=1 and activo=1;');
    $sql->execute();
    $rst=$sql->rowCount();
    $tab_art= [];
    
    while($rst = $sql->fetch(PDO::FETCH_OBJ)){
        $tab_art[]=$rst;
    }
    if(empty($tab_art)){       
        return $tab_art;
        exit();
    }
        return $tab_art;        
}
