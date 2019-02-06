<?php
include("cabecera.php");
include("menu.php");
include_once("toolsMarcas.php");
?>
		<?php
		if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
            mtoMarcas();
		}else{
		    echo "No dispone de permisos para acceder a este menú.";
		}
        ?>
<?php
    include("pie.php");
?>