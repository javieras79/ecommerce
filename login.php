<?php
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO

if (isset($_SESSION["logon"])){
    //existe la variable de sesi�n, entonces comprueba el valor
    if ($_SESSION["logon"] != "SI")
    {
        //distinto de si pintamos el formulario de LOGIN
           include("formLogin.php");

    }else{
        //en el caso de que est� logeado
        //pintamos usr y boton de LOGOUT
        echo '<ul class="nav pull-right">';
        echo '<li class="dropdown">';
        echo '<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> '.$_SESSION["usr"].' <b class="caret"></b></a>';
        echo '<div class="dropdown-menu">';
        echo '<form class="form-horizontal loginUsr" >';
        echo '<div class="control-group">';
        echo '<li class="pull-right"><a href="profile.php">Mi Cuenta</a></li>';
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