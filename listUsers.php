<?php
include("cabecera.php");
include("menu.php");
include_once("toolsUsers.php");
?>
		<?php
		if(isset($_SESSION['usr']) && $_SESSION['rol'] == 3){
            mtoUsers();
		}else{
		    echo "No dispone de permisos para acceder a este menu.";
		}
        ?>
<?php
    include("pie.php");
?>