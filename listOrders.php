<?php
include("cabecera.php");
include("menu.php");
include_once("toolsOrders.php");
?>
		<?php
		if(isset($_SESSION['usr'])){
		    $user=$_SESSION['usr'];
		    showOrders($user);
		}else{
		    echo "No tiene permisos para acceder a este menu";
		}
           
        ?>
<?php
    include("pie.php");
?>