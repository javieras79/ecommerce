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
   showcategories();
?>
<!--     	                
            <li><a href="#"><span class="icon-chevron-right"></span>Uniformes</a></li>
            <li><a href="#"><span class="icon-chevron-right"></span>Accesorios</a></li>
            <li><a href="#"><span class="icon-chevron-right"></span>Consumibles</a></li>
            <li style="border:0"> &nbsp;</li>
            <!--<li> <a class="totalInCart" href="#"><strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;">$448.42</span></strong></a></li>
-->
		    <li style="border:0"> &nbsp;</li>
		    
        </ul>
        
    </div>
    <div class="well well-small" ><a href="#"><img src="img/paypal.jpg" alt="payment method paypal"></a></div>
</div>