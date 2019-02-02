<?php
function getCategorias_padres()
{
  $con=conectar_bd();
  $sql=$con->prepare('select id_categoria,nombre_categoria from categorias');    
  $sql->execute();
  $categorias = [];
  while ($data = $sql->fetch(PDO::FETCH_OBJ)){
    $categorias[] = $data;
  }
  return $categorias;
}

function getCategorias_padresCat($id_cat)
{
    $con=conectar_bd();
    $sql=$con->prepare('select c.id_categoria,c.nombre_categoria,s.id_subcategoria,s.nombre_subcategoria
                         from categorias c INNER JOIN subcategorias s ON
                         c.id_categoria=s.id_categoria where c.id_categoria='.$id_cat);
    $sql->execute();
    $categorias = [];
    while ($data = $sql->fetch(PDO::FETCH_OBJ)){
        $categorias[] = $data;
    }
    return $categorias;
}


