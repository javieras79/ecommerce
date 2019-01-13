<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("conectBBDD.php");
include_once("toolsCategories.php");
?>

<div id="sidebar" class="span3">
    <div id="cssmenu">
    <ul>
<?php    
    //llama a categorias para mostrarlas en el nav
   showcategories();
?>

		    <li style="border:0"> &nbsp;</li>
		    
        </ul>
        
    </div>
    <div class="well well-small" ><a href="#"><img src="img/paypal.jpg" alt="payment method paypal"></a></div>
</div>