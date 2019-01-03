   <?php 
   
   function listarCategorias(){
       
   echo '<div class="span12">';
       echo '<h3> Mantenimiento de Categorias</h3>';
           echo '<hr class="soft">';
                echo '<div class="well">';
                        echo '<a class="shopBtn" href="gCategorias.php">Nueva Categoria</a>';
                echo '<hr class="soft">';
                    echo '<div class="table-responsive">';
                        echo '<table class="table table-condensed">';
                            echo '<tr class="success">';
                                echo "<td>";
                                    echo "Id Categoria";
                                echo "</td>";
                                echo "<td>";
                                    echo "Nombre Categoria";
                                echo "</td>";
                                echo "<td>";
                                    echo "Baja";
                                echo "</td>";  
                        echo "</table>";
              echo '</div>';
        echo '</div>';
   echo '</div>';
   }
?>