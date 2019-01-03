<?php
//cerramos sesion y volvemos a la pagina principal index.php
session_start();
session_destroy();
header("Location: index.php");
?>