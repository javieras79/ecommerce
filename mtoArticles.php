<?php
include("cabecera.php");
include("menu.php");
include_once("conectBBDD.php");
require_once 'functions.php';
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
<?php
if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){

    if(isset($_GET["editar"])){
     $id=$_GET["id"];
     $con = conectar_bd();
     //$sql = $con->prepare('Select * from articulos;');
     $sql = $con->prepare("select a.id_articulo,a.nombre_articulo,a.descripcion , a.id_categoria,a.id_subcategoria,a.id_marca,a.imagen,c.nombre_categoria,s.nombre_subcategoria,m.nombre_marca,a.precio, a.iva,a.activo,a.tablon,a.usr_modif,a.fecha_modif
                          from articulos as a
                          left join categorias as c on a.id_categoria=c.id_categoria
                          left join marcas as m on a.id_marca=m.id_marca
                          left join subcategorias as s on a.id_subcategoria=s.id_subcategoria where a.id_articulo=".$id);
     $sql->execute();
     while($datos = $sql->fetch()){
         
         $id_categoria=$datos["id_categoria"];
         $nombre_categoria=$datos["nombre_categoria"];
         $id_subcategoria=$datos["id_subcategoria"];
         $nombre_subcategoria=$datos["nombre_subcategoria"];
         $id_marca=$datos["id_marca"];
         $nombre_marca=$datos["nombre_marca"];
         $nombre_articulo=$datos["nombre_articulo"];
         $descripcion=$datos["descripcion"];
         $precio=$datos["precio"];
         $iva=$datos["iva"];
         $activo=$datos["activo"];
         $tablon=$datos["tablon"];
         $usuario=$datos["usr_modif"];
         $fecha=$datos["fecha_modif"];       
         $imagen=$datos["imagen"];
     }     
     echo '<form class="form-horizontal" action="toolsArticles.php?editArticle=SI&id='.$id.'" method="POST" enctype="multipart/form-data">';
   }else{     
     echo '<form class="form-horizontal" action="toolsArticles.php?addArticle=SI" method="POST" enctype="multipart/form-data">';
     $activo=0;
     $tablon=0;
     $todayh = getdate(); //monday week begin reconvert
     $d = $todayh['mday'];
     $m = $todayh['mon'];
     $y = $todayh['year'];
   }
?>  
<div class="span12">     
<h3> Mantenimiento de Artículos</h3>
    <hr class="soft"/>
</div>
<div class="span6">    
    <div class="well">       
    <br>

<?php
if(isset($_GET['catsdisabled'])){       
    echo "<div class='control-group'>";
    echo "<label class='control-label' for='categoria'>Categoría <sup>*</sup></label>";
    echo "<div class='controls'>";
    echo "<input type='hidden' id='categ' placeholder='categ' name='categ' value='".$id_categoria."'>";
    echo "<input type='text' disabled id='categoria' placeholder='categoria' name='categoria' value='".$nombre_categoria."' required>";
    echo '<a href="mtoArticles.php?editar=SI&id='.$id.'"><span class="icon icon-edit" aria-hidden="true"></a>';
    echo "</div>";
    echo "</div>";
    echo "<div class='control-group'>";
    echo "<label class='control-label' for='subcat'>Subcategoría <sup>*</sup></label>";
    echo "<div class='controls'>";
    echo "<input type='hidden' id='subcateg' placeholder='subcateg' name='subcateg' value='".$id_subcategoria."'>";
    echo "<input type='text' disabled id='subcategoria' placeholder='subcategoria' name='subcategoria' value='".$nombre_subcategoria."' required>";
    echo '<a href="mtoArticles.php?editar=SI&id='.$id.'"><span class="icon icon-edit" aria-hidden="true"></a>';
    echo "</div>";
    echo "</div>";
}else{
    $categorias = getCategorias_padres();?>
    <div class='control-group'>
    <label class='control-label' for='categoria'>Categoría <sup>*</sup></label>
    	<div class="controls">
    		<select class="form-control" name="cat" id="cat" required>
    			<option value=''></option>
    <?php foreach ($categorias as $categoria):
    echo "<option value='".$categoria->id_categoria."'>".$categoria->nombre_categoria."</option>";
    endforeach;?>
    		</select>
 	   </div>
    </div>
    <div class='control-group' id='load'>
    <label class='control-label' for='subcategoria'>SubCategoría <sup>*</sup></label>
    <div class='controls'>
  		  <select name='subcat' class='form-control' id='subcat' required>    
  		  </select>
    </div>
    </div>
<?php }
?>
    <div class="control-group">
    	<label class="control-label" for="marca">Marca <sup>*</sup></label>
    		<div class="controls">
    			<select name="marca" required>
    			    <option value="<?php if(isset($_GET["editar"])){echo $id_marca;}else{}?>"><?php if(isset($_GET["editar"])){echo $nombre_marca;}else{} ?></option>
            		<?php 
            		if(isset($_GET["editar"])){
            		      $id=$_GET["id"];
            		      $con = conectar_bd();
            		      $sql = $con->prepare('select distinct * from marcas where id_marca !='.$id_marca);
            		}else{
            		    $con = conectar_bd();
            		    $sql = $con->prepare('select distinct * from marcas');
            		}
            		      $sql->execute();
            		      while($datos = $sql->fetch()){
            		      $nom_marca=$datos["nombre_marca"];
            		      $id_marca=$datos["id_marca"];    		                      		          
            		          echo "<option value='$id_marca'>$nom_marca</option>";
            		      }
            		?>
  				</select>                        
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="articulo">Nombre Artículo <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="articulo" placeholder="articulo" name="articulo" value="<?php if(isset($_GET["editar"])){echo $nombre_articulo;}else{}?>" required>                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="descripcion">Descripción <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="descripcion" placeholder="descripcion" name="descripcion" value="<?php if(isset($_GET["editar"])){echo $descripcion;}else{}?>" required>                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="precio">Precio <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="precio" placeholder="precio" name="precio" value="<?php if(isset($_GET["editar"])){echo $precio;}else{}?>" required>                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="iva">Iva <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="iva" placeholder="iva" name="iva" value="<?php if(isset($_GET["editar"])){echo $iva;}else{}?>" required>                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="activo">Estado Artículo <sup>*</sup></label>
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
    	<label class="control-label" for="tablon">Mostrar Tablón <sup>*</sup></label>
    		<div class="controls">
    		<?php 
    		  if($tablon==0){
    		    echo "<input type='checkbox' id='tablon' name='tablon'>";
    		  }else{
    		    echo "<input type='checkbox' id='tablon' name='tablon' value='1' checked>";
    		  }
    		 ?>    		                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="usuario">Usuario <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="usuario" placeholder="usuario" name="usuario" readonly value="<?php if(isset($_GET["editar"])){echo $usuario;}else{echo $_SESSION["usr"];}?>" required>                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="fecha">Fecha <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="fecha" placeholder="fecha" name="fecha" readonly value="<?php if(isset($_GET["editar"])){echo $fecha;}else{echo $y."/".$m."/".$d;}?>">                   
   			</div>
    	</div>    	      
	</div>
</div>
<div class="span6">
    
    <div class="well">       
    <br>
    	 <div class="control-group">
    	 	<label for="imagen">Imagen <sup>*</sup>
    				<input type="file" id="imagen" placeholder="imagen" name="imagen" value="">
    				<br> 
    				<span class="badge badge-secondary">*Para la correcta visualización el tamaño de la imagen debe ser de 800*600 pixeles</span>   				
    		</label>        
    		<?php if(isset($_GET["editar"])){echo "<img src='./img/articulos/".$imagen."'>";}else{}?>              				
   		 </div>
    </div>
</div>
<div class="span12">
  <div class="well">  
        	 <div class="control-group">
                <div>
                    <center><a href="listArticles.php" class="shopBtn btn-large">Volver</a>
                    <?php if(isset($_GET["editar"])){?>
                    <input type="submit" name="submitCategoria" value="Modificar" class="exclusive shopBtn" onclick="return validarArticuloEdicion()">
                    <?php }else{?>
                    <input type="submit" name="submitCategoria" value="Guardar" class="exclusive shopBtn" onclick="return validarArticulo()">
                    <?php }?>
                    </center>                
                </div>                
            </div>  
   </div>
</div>
</form>

<?php 
}else{
    echo "No tiene permisos para consultar este menú.";
}
?>
<?php
    include("pie.php");
?>
