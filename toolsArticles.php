<?php
include_once("conectBBDD.php");
require_once 'functions.php';

//actualizar articulo
if(isset($_GET["editArticle"])){
    $id=$_GET["id"];
    $id_categoria=$_POST["cat"];
    $id_subcategoria=$_POST["subcat"];
    $id_marca=$_POST["marca"];
    $nombre_articulo=$_POST["articulo"];
    $descripcion=$_POST["descripcion"];
    $precio=$_POST["precio"];
    $iva=$_POST["iva"];
    
    //actualiza imagen
    if($_FILES["imagen"]["tmp_name"]){
        $old_img=selImage($id);
        unlink("./img/articulos/".$old_img);
        $temp = $_FILES["imagen"]["tmp_name"];
        $nom_img=$_FILES["imagen"]["name"];
        $file=getimagesize($temp);
        if($file[2] == 2 ){
            $valor="./img/articulos/".$nom_img;
            $destino = (string)$valor;
            move_uploaded_file($temp, $destino);
        }
    }else{
        $nom_img=selImage($id);
    }
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }    
    if(isset($_POST["tablon"])){
        $tablon=1;
    }else{
        $tablon=0;
    }
    $usuario=$_POST["usuario"];
    $fecha=$_POST["fecha"];
    $con=conectar_bd();
    $sql=$con->prepare('update articulos set id_categoria="'.$id_categoria.'",id_subcategoria="'.$id_subcategoria.'",id_marca="'.$id_marca.'",
                        nombre_articulo="'.$nombre_articulo.'",descripcion="'.$descripcion.'",precio="'.$precio.'",iva="'.$iva.'",activo="'.$activo.'",
                        tablon="'.$tablon.'",usr_modif="'.$usuario.'",fecha_modif="'.$fecha.'",imagen="'.$nom_img.'" where id_articulo='.$id);
    $sql->execute();
    header("Location: listArticles.php?actualiza='ok'"); 
}
/*
//Actualiza subcategorias
if(isset($_POST['id_categoria'])){
    $idsub=(int)$_POST['id_categoria'];
    $con=conectar_bd();
    $sql=$con->prepare('select id_subcategoria,nombre_subcategoria from subcategorias where id_subcategoria='.$idsub);
    $sub_array=array();
    while($rst=$sql->fetch(PDO::FETCH_OBJ)){
        $sub_array=$rst;
    }
    echo json_encode($sub_array);
}
*/

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

//Añade articulo
if(isset($_GET["addArticle"])){
    $id_categoria=$_POST["cat"];
    $subcat=var_dump($_POST["id_subcategoria"]);
    $id_marca=$_POST["marca"];
    $nombre_articulo=$_POST["articulo"];
    $descripcion=$_POST["descripcion"];
    $precio=$_POST["precio"];
    $iva=$_POST["iva"];
    //inserta imagen nueva        
        if($_FILES["imagen"]["tmp_name"]){
            $temp = $_FILES["imagen"]["tmp_name"];
            $nom_img=$_FILES["imagen"]["name"];
            $file=getimagesize($temp);
            if($file[2] == 2 ){
                $valor="./img/articulos/".$nom_img;
                $destino = (string)$valor;
                move_uploaded_file($temp, $destino);
            }
        }else{
        $nom_img="sin_resultados.jpg";
        }
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    if(isset($_POST["tablon"])){
        $tablon=1;
    }else{
        $tablon=0;
    }
    $usuario=$_POST["usuario"];
    $fecha=$_POST["fecha"];
    $con=conectar_bd();
    $sql=$con->prepare('Insert into articulos (id_categoria,id_subcategoria,id_marca,nombre_articulo,descripcion,precio,iva,activo,tablon,usr_modif,fecha_modif,imagen) VALUES (:id_categoria,:id_subcategoria,:id_marca,:nombre_articulo,:descripcion,:precio,:iva,:activo,:tablon,:usuario,:fecha,:imagen);');
    
    $sql->bindParam(':id_categoria',$id_categoria,PDO::PARAM_INT);
    $sql->bindParam(':id_subcategoria',$subcat,PDO::PARAM_INT);
    $sql->bindParam(':id_marca',$id_marca,PDO::PARAM_INT);
    $sql->bindParam(':nombre_articulo',$nombre_articulo,PDO::PARAM_STR);
    $sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
    $sql->bindParam(':precio',$precio,PDO::PARAM_INT);
    $sql->bindParam(':iva',$iva,PDO::PARAM_INT);
    $sql->bindParam(':activo',$activo,PDO::PARAM_INT);
    $sql->bindParam(':tablon',$tablon,PDO::PARAM_INT);
    $sql->bindParam(':usuario',$usuario,PDO::PARAM_STR);
    $sql->bindParam(':fecha',$fecha,PDO::PARAM_STR);
    $sql->bindParam(':imagen',$nom_img,PDO::PARAM_STR);
    $sql->execute();
    header("Location: listArticles.php?alta='ok'");    
}  

//Seleccion imagen antigua
function selImage($id_articulo){
    $con=conectar_bd();
    $sql=$con->prepare('select imagen from articulos where id_articulo='.$id_articulo);
    $sql->execute();
    $imagen=$sql->fetchColumn(0);
    return $imagen;
}

//Borra articulo
if(isset($_GET["remArticle"])){
    $id=$_GET['id'];
    $con=conectar_bd();
    $sql=$con->prepare('delete from articulos where id_articulo='.$id);
    $sql->execute();
    header("Location: listArticles.php?borra='ok'");
}

//muestra en el cuerpo la lista de articulos de la categoria seleccionada
function articuloslista($cat,$scat,$desplazamiento){
    
    $con = conectar_bd();    
    $sql = $con->prepare('select a.id_articulo,a.nombre_articulo,a.descripcion,a.precio,a.imagen,m.nombre_marca,c.id_categoria,c.nombre_categoria,s.id_subcategoria,s.nombre_subcategoria from articulos a INNER JOIN marcas m ON a.id_marca = m.id_marca
                            INNER JOIN categorias c ON a.id_categoria = c.id_categoria
                            INNER JOIN subcategorias s ON a.id_subcategoria = s.id_subcategoria where a.id_categoria='.$cat.' and a.id_subcategoria='.$scat.' and a.activo=1 limit 0,'.$desplazamiento.';');
    $sql->execute();  
    $reg=$sql->rowCount();
    $count=0;
    $count2=3;
    

    if($reg==0){
        echo "<div class='row-fluid'>";
        echo "<ul class='thumbnails'>";   
        echo "<img src='img/sin_resultados.jpg' WIDTH=240 HEIGHT=310 BORDER=0 ALT='Un beb&eacute;' ALIGN='right'>";
        echo "</ul>";
        echo "</div>";
    }
    //va sumando de 3 en 3 con $count y $count2 para que las imagenes se listen en filas de 3 imagenes por fila
    while($rst = $sql->fetch()){
        if($count==$count2){
            echo "</ul>";
            echo "</div>";
            echo "<div class='row-fluid'>";
            echo "<ul class='thumbnails'>";
            $count2=$count2+3;
        }
        echo "<li class='span4'>";
        echo "<div class='thumbnail'>";
        echo "<a href='product_details.html' class='overlay'></a>";
        echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$rst['imagen'].'" title="quick view"><span class="icon-search"></span> QUICK VIEW</a>';
        echo '<a href="articuloDetalle.php?imagen='.$rst['imagen'].'">';
        echo "<img src='img/articulos/".$rst["imagen"]."' alt=''></a>";
        echo "<div class='caption cntr'>";
        echo "<p>".$rst['descripcion']."</p>";
        echo "<p>".$rst['nombre_articulo']."</p>";
        echo "<p><strong>".$rst['precio']."</strong></p>";        
        echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$rst['id_articulo'].'&cantidad=1" title="add to cart"> Add to cart </a></h4>';
        echo "<br class='clr'>";
        echo "</div>";
        echo "</div>";
        echo "</li>";

        $count++;
    }
}

//funcionar que carga tabla de articulos pero del menú de mantenimiento perfil con rol 2
function mtoArticles(){
    
    echo '<div class="span12">';
    echo '<h3> Mantenimiento de Articulos</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="mtoArticles.php">Nuevo Articulo</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Id Articulo";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Categoria";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "SubCategoria";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Marca";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Nombre Articulo";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Descripcion";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Precio";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Iva";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Activado";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Tablon";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "User";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Fecha alta";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Accion";
    echo "</strong></td>";    
    echo "</tr>";
    
    $con = conectar_bd();
    //$sql = $con->prepare('Select * from articulos;');
    $sql = $con->prepare("select a.id_articulo,a.nombre_articulo,a.descripcion , a.id_categoria,a.id_subcategoria,a.id_marca,c.nombre_categoria,s.nombre_subcategoria,m.nombre_marca,a.precio, a.iva,a.activo,a.tablon,a.usr_modif,a.fecha_modif
                          from articulos as a
                          left join categorias as c on a.id_categoria=c.id_categoria
                          left join marcas as m on a.id_marca=m.id_marca
                          left join subcategorias as s on a.id_subcategoria=s.id_subcategoria");
    $sql->execute();
    
    while($datos = $sql->fetch()){
        
        echo "<tr>";
        echo "<td>";
        $id = $datos["id_articulo"];
        echo $id;
        echo "</td>";
        echo "<td>";
        $nombre_categoria = $datos["nombre_categoria"];        
        echo $nombre_categoria;
        echo "</td>";
        echo "<td>";
        $nombre_subcategoria = $datos["nombre_subcategoria"];
        echo $nombre_subcategoria;
        echo "</td>";
        echo "<td>";
        $nombre_marca = $datos["nombre_marca"];
        echo $nombre_marca;
        echo "</td>";
        echo "<td>";
        $nombre_articulo = $datos["nombre_articulo"];
        echo $nombre_articulo;
        echo "</td>";
        echo "<td>";
        $descripcion = $datos["descripcion"];
        echo $descripcion;
        echo "</td>";
        echo "<td>";
        $precio = $datos["precio"];
        echo $precio;
        echo "</td>";
        echo "<td>";
        $iva = $datos["iva"];
        echo $iva;
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
        echo '<div style="text-align: left">';
        $tablon=$datos["tablon"];
        if ($tablon==0){
            $chk="";
        }else{
            $chk="checked";
        }
        echo '<center><input type="checkbox" name="checkbox[]"'. $chk .' disabled></center>';
        echo '</div>';
        echo "</td>";
        echo "<td>";
        $usuario = $datos["usr_modif"];
        echo $usuario;
        echo "</td>";
        echo "<td>";
        $fecha = $datos["fecha_modif"];
        echo $fecha;
        echo "</td>";
        
        echo "<td><center>";
        echo '<a href="mtoArticles.php?editar=SI&catsdisabled=SI&id='.$id.'"><span class="icon icon-edit" aria-hidden="true"></span> </a>';
        echo '<a href="toolsArticles.php?remArticle=SI&id='.$id.'"><span class="icon icon-trash" aria-hidden="true"></span></a>';
        echo "</center></td>";        
        echo "</tr>";
        
    }
    
    echo "</table>";

    //mensaje articulo añadido
    if(isset($_GET['alta'])){
        echo "<p style='color:green;'>El artículo ha sido agregado con éxito.</p>";
    }    
    //mensaje articulo borrado
    if(isset($_GET['borra'])){
        echo "<p style='color:green;'>El artículo ha sido borrado con éxito.</p>";
    }
    //mensaje articulo borrado
    if(isset($_GET['actualiza'])){
        echo "<p style='color:green;'>El artículo ha sido modificado con éxito.</p>";
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>
