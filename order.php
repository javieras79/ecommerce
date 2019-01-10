<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("toolsCart.php");
?>

<!--
contenido de la página
-->

<div class="span12">
    <div class="well well-small">

            <?php 
                  loadCart();
            ?>
</div>

</div>

<?php
include("pie.php");
?>
