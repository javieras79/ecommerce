<?php
    include("cabecera.php");
    include("menu.php");
    include_once("toolsCategories.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
		<?php
            mtoCategories();
        ?>
<?php
    include("pie.php");
?>