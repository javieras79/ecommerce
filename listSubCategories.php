<?php
include("cabecera.php");
include("menu.php");
include_once("toolsSubCategories.php");
?>
		<?php
		if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
            mtoSubCategories();
		}else{
		    echo "No dispone de permisos para acceder a este menu";
		}
        ?>
<?php
    include("pie.php");
?>