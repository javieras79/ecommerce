<!--
Men� de navegaci�n
-->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="index.php">Home	</a></li>
                    <?php
                    //COMPROBAR AUTENTIFICACION DE USUARIO
                    if (isset($_SESSION["logon"])){
                    //comprueba variable sesion y valida
                        if ($_SESSION["logon"] == "SI")
                            {
                                if($_SESSION["rol"]==2 || $_SESSION["rol"]==3 ){
                                    echo'<li class="dropdown">';
                                    echo'<a href="#" data-toggle="dropdown" class="dropdown-toggle">Mantenimiento <b class="caret"></b></a>';
                                    echo'<ul class="dropdown-menu">';
                                    echo'<li><a href="listArticles.php">Artículos</a></li>';
                                    echo'<li><a href="listCategories.php">Categorías</a></li>';
                                    echo'<li><a href="listSubCategories.php">SubCategorías</a></li>';
                                    echo'<li><a href="listMarcas.php">Marcas</a></li>';
                                    echo'<li><a href="listOrders.php">Pedidos Clientes</a></li>';
                                    echo'<li class="divider"></li>';
                                        if($_SESSION["rol"]==3){
                                            echo'<li><a href="listUsers.php">Usuarios</a></li>';
                                        }
                                    echo'</ul>';
                                    echo'</li>';
                                }else{
                                    //clientes
                                    echo'<li class="dropdown">';
                                    echo'<a href="#" data-toggle="dropdown" class="dropdown-toggle">Usuario <b class="caret"></b></a>';
                                    echo'<ul class="dropdown-menu">';
                                    echo'<li><a href="registro.php?cuenta=SI">Mi Cuenta</a></li>';
                                    echo'<li><a href="listOrders.php">Pedidos Abiertos</a></li>';
                                    echo'<li><a href="listOrders.php?historico=si">Histórico Pedidos</a></li>';
                                    echo'</ul>';
                                    echo'</li>';
                                }
                            }
                    }else{
                        echo'<li class=""><a href="registro.php">Regístrarme</a></li>';
                    }
                    ?>
                </ul>

                <!--Mostrar datos del login.-->
                <?php include("login.php");
                //TODO Gestionar menu roles
                ?>
                <form action="#" class="navbar-search pull-right">
                    <input type="text" placeholder="Search" class="search-query span2">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">


