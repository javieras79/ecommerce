<?php
    session_start();
    include("cabecera.php");
    include("menu.php");
    include_once("toolsCategories.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
		<?php
            if(isset($_GET["editar"])){
                $id=$_GET["id"];                
                echo '<form class="form-horizontal" action="gestionCategorias.php?editar=SI&id='.$id.'" method="POST" onsubmit="return validarArticulos();" enctype="multipart/form-data">';
            }else{
                echo '<form class="form-horizontal" action="gestionCategorias.php" method="POST" onsubmit="return validarArticulos();" enctype="multipart/form-data">';
                $id=0;
            }
            listCategories();
        ?>
<?php
    include("pie.php");
?>