<?php
include_once("conectBBDD.php");
if(isset($_POST['cat']))//comprobamos si exite el id
{
    $id = (int)$_POST['cat']; // hacemos un cating a intero porque nuestra base de datos sus id son enteros
    $hijas = getSubcategoria($id); //llamamos a la funcion esa que devuelve los hijos de cada categoria padre
    
    echo json_encode($hijas);//convertimos el array a un json
    
    exit();//salimos de aqui;
}
/**
 * funcion para devolver todos los hijos de una categoria padre
 * @param $id int identificador de la categoria padre
 * @return array lista de categorias hijas
 */
function getSubcategoria($id)
{
    $idsub=$id;
    $con=conectar_bd();
    $sql=$con->prepare('select id_subcategoria,nombre_subcategoria from subcategorias where id_categoria='.$idsub);
    $sql->execute();
    $sub_categorias = [];
    while ($data = $sql->fetch(PDO::FETCH_OBJ)){
        $sub_categorias[] = $data;
    }
    return $sub_categorias;
}
?>