<?php
include("cabecera.php");
include("menu.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
<?php
if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
    

   if(isset($_GET["editar"])){
     $id=$_GET["id"];
     $nombre_marca=$_GET["marca"];
     $activo=$_GET["activo"];
     echo '<form class="form-horizontal" action="toolsMarcas.php?editarMarca=SI&id='.$id.'" method="POST" enctype="multipart/form-data">';
   }else{
     
     echo '<form class="form-horizontal" action="toolsMarcas.php?addMarca=SI" method="POST" enctype="multipart/form-data">';
     $activo=0;
   }
?>       
<div class="span12">

    <h3> Mantenimiento de Marcas</h3>
    <hr class="soft"/>
    <div class="well">       
    <br>
    	<div class="control-group">
    	<label class="control-label" for="marca">Marca <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="marca" placeholder="marca" name="marca" value="<?php if(isset($_GET["editar"])){echo $nombre_marca;}else{}?>" required>                      
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="baja">Estado Marca <sup>*</sup></label>
    		<div class="controls">
    		<?php 
    		  if($activo==0){
    		    echo "<input type='checkbox' id='activo' name='activo'>";
    		  }else{
    		    echo "<input type='checkbox' id='activo' name='activo' value='1' checked>";
    		  }
    		 ?>    		                   
   			</div>
    	</div>
    	 <div class="control-group">
                <div class="controls">
                    <a href="listMarcas.php" class="shopBtn btn-large">Volver</a>
                    <input type="submit" name="submitMarca" value="Guardar" class="exclusive shopBtn">                
                </div>                
            </div>        
	</div>
</div>
</form>
<?php 
}else{
    echo "No dispone de permisos para acceder a este menú.";
}
?>
<?php
    include("pie.php");
?>