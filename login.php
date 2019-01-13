<?php
//chequea si el usuario esta autenticado

if (isset($_SESSION["logon"])){
    //comprueba el valorr
    if ($_SESSION["logon"] != "SI")
    {
        //Si no lo esta dibujamos formulario de login
           include("formLogin.php");

    }else{
        //en el caso de que esté logeado
        //pintamos usr y boton de LOGOUT
        echo '<ul class="nav pull-right">';
        echo '<li class="dropdown">';
        echo '<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> '.$_SESSION["usr"].' <b class="caret"></b></a>';
        echo '<div class="dropdown-menu">';
        echo '<form class="form-horizontal loginUsr" >';
        echo '<div class="control-group">';
        echo '<li class="pull-right"><a href="registro.php?cuenta=SI">Mi Cuenta</a></li>';
        echo '</div>';
        echo '<div class="control-group">';
        echo '<li class="pull-right"><a class="shopBtn btn-block" href="logout.php">LogOUT</a></li>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</li>';
        echo '</ul>';
    }
}else{
    include("formLogin.php");
}
?>