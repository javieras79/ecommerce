<?php
include("cabecera.php");
include("menu.php");
include_once("toolsArticles.php");
?>
		<?php
		    if(isset($_SESSION['usr'])){
		        mtoArticles();
		    }else{
		        echo "No dispone de permisos para consultar este menu.";
		    }      
        ?>
<?php
    include("pie.php");
?>