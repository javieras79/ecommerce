<?php
include("cabecera.php");
include("menu.php");
include_once("toolsArticles.php");
?>
		<?php
		if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
		        mtoArticles();
		    }else{
		        echo "No dispone de permisos para consultar este menú.";
		    }      
        ?>
<?php
    include("pie.php");
?>