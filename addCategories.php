<?php
session_start();
include("cabecera.php");
include("menu.php");
include_once("toolsCategories.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
		<?php
            if(isset($_GET["editar"])){
                $id=$_GET["id"];
                $nombre_categoria=$_GET["categoria"];
                $baja=$_GET["baja"];
                echo '<form class="form-horizontal" action="toolsCategories.php?editar=SI&id='.$id.'" method="POST" onsubmit="return validarArticulos();" enctype="multipart/form-data">';
            }else{
                echo '<form class="form-horizontal" action="toolsCategories.php" method="POST" onsubmit="return validarArticulos();" enctype="multipart/form-data">';
                $id=0;
            }
        ?>
        
<div class="span12">
    <h3> Mantenimiento de Categorias</h3>
    <hr class="soft"/>
    <div class="well">       
    <br>
    	<div class="control-group">
    	<label class="control-label" for="categoria">Nombre Categoria <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="categoria" placeholder="categoria" name="categoria" value='<?php echo $nombre_categoria;?>'>                      
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="baja">Estado Categoria <sup>*</sup></label>
    		<div class="controls">
    		<?php 
    		  if($baja=0){
    		    echo "<input type='checkbox' id='baja' name='baja'>";
    		  }else{
    		    echo "<input type='checkbox' id='baja' name='baja' checked>";
    		  }
    		 ?>    		                   
   			</div>
    	</div>
    	 <div class="control-group">
                <div class="controls">
                    <input type="submit" name="submitCategoria" value="Guardar" class="exclusive shopBtn">
                </div>
            </div>        
	</div>
</div>
</form>

<?php
    include("pie.php");
?>