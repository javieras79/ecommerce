<?php
include("cabecera.php");
include("menu.php");
include_once("conectBBDD.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
<?php
if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
    

   if(isset($_GET["editar"])){
       
     $id=$_GET["id"];
     $nombre_subcategoria=$_GET["subcategoria"];
     $activo=$_GET["activo"];
     $idcat=$_GET["idcat"];
     if($idcat!=""){
         $con=conectar_bd();
         $sql=$con->prepare('select nombre_categoria from categorias where id_categoria='.$idcat);
         $sql->execute();
         $nombre_categoria=$sql->fetchColumn(0);
     }
     echo '<form class="form-horizontal" action="toolsSubCategories.php?editarSubCategoria=SI&id='.$id.'" method="POST" enctype="multipart/form-data">';
   }else{
     
     echo '<form class="form-horizontal" action="toolsSubCategories.php?addSubCategoria=SI" method="POST" enctype="multipart/form-data">';
     $activo=0;
   }
?>       
<div class="span12">

    <h3> Mantenimiento de SubCategorías</h3>
    <hr class="soft"/>
    <div class="well">       
    <br>
    <div class="control-group">
    	<label class="control-label" for="categoria">Categoría Principal<sup>*</sup></label>
    		<div class="controls">
		
    		<select name="categoria" id="categoria" required>
    				<option value="<?php if(isset($_GET["editar"])&& $idcat!=""){echo $id_categoria;}else{}?>"><?php if(isset($_GET["editar"]) && $idcat!=""){echo $nombre_categoria;}else{} ?></option>
            		<?php 
            		if(isset($_GET["editar"]) && $idcat!=""){
            		    
            		      $id=$_GET["idcat"];
            		      $con = conectar_bd();
            		      $sql = $con->prepare('select distinct * from categorias where id_categoria !='.$id);
            		}else{
            		    $con = conectar_bd();
            		    $sql = $con->prepare('select distinct * from categorias');
            		}
            		      $sql->execute();
            		      while($datos = $sql->fetch()){
            		      $nom_cat=$datos["nombre_categoria"];
            		      $id_cat=$datos["id_categoria"];    		                      		          
            		          echo "<option value='$id_cat'>$nom_cat</option>";
            		      }            		
            		?>
  				</select>    			    				              			    			
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="subcategoria">SubCategoría <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="subcategoria" placeholder="subcategoria" name="subcategoria" value="<?php if(isset($_GET["editar"])){echo $nombre_subcategoria;}else{}?>" required>                      
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="baja">Estado SubCategoría <sup>*</sup></label>
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
                    <a href="listSubCategories.php" class="shopBtn btn-large">Volver</a>
                    <input type="submit" name="submitsubCategoria" value="Guardar" class="exclusive shopBtn">                
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