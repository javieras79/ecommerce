<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("toolsCart.php");
?>

<!--
contenido de la p�gina
-->

<div class="span12">
    <div class="well well-small">

            <?php 
                  loadCart();
                  showCart();
            ?>
</div>

</div>

<?php
include("pie.php");
?>

