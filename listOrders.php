<?php
include("cabecera.php");
include("menu.php");
include_once("toolsOrders.php");
?>
		<?php
		if(isset($_SESSION['usr'])){
		    $user=$_SESSION['usr'];
		    showOrders($user);
		}
           
        ?>
<?php
    include("pie.php");
?>