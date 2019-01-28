<?php
    include("cabecera.php");
    include("menu.php");
    include_once("toolsCategories.php");
?>
		<?php
		if(isset($_SESSION['usr'])){
            mtoCategories();
		}else{
		    echo "No dispone de permisos para acceder a este menu";
		}
        ?>
<?php
    include("pie.php");
?>