<?php
include("cabecera.php");
include("menu.php");
include("principal.php");
include_once("toolsCart.php");

?>

<!--
contenido de la p�gina
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

