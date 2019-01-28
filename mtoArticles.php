<?php
include("cabecera.php");
include("menu.php");
include_once("conectBBDD.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
<?php
if(isset($_SESSION['usr'])){

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
   }
?>  
<div class="span12">     
<h3> Mantenimiento de Articulos</h3>
    <hr class="soft"/>
</div>
<div class="span6">    
    <div class="well">       
    <br>
    	<div class="control-group">
    	<label class="control-label" for="categoria">Categoria <sup>*</sup></label>
    		<div class="controls">
    			<select name="categoria">
    				<option value="<?php if(isset($_GET["editar"])){echo $id_categoria;}else{}?>"><?php if(isset($_GET["editar"])){echo $nombre_categoria;}else{} ?></option>
            		<?php 
            		if(isset($_GET["editar"])){
            		      $id=$_GET["id"];
            		      $con = conectar_bd();
            		      $sql = $con->prepare('select distinct * from categorias where id_categoria !='.$id_categoria);
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
    	<label class="control-label" for="subcategoria">SubCategoria <sup>*</sup></label>
    		<div class="controls">
    			<select name="subcategoria">
    			    <option value="<?php if(isset($_GET["editar"])){echo $id_subcategoria;}else{}?>"><?php if(isset($_GET["editar"])){ echo $nombre_subcategoria;}else{} ?></option>
            		<?php 
            		if(isset($_GET["editar"])){
            		      $id=$_GET["id"];
            		      $con = conectar_bd();
            		      $sql = $con->prepare('select distinct * from subcategorias where id_subcategoria !='.$id_subcategoria);
            		}else{
            		    $con = conectar_bd();
            		    $sql = $con->prepare('select distinct * from subcategorias');
            		}
            		      $sql->execute();
            		      while($datos = $sql->fetch()){
            		      $nom_subcat=$datos["nombre_subcategoria"];
            		      $id_subcat=$datos["id_subcategoria"];    		                      		          
            		          echo "<option value='$id_subcat'>$nom_subcat</option>";
            		      }
            		?>
  				</select>                        
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="marca">Marca <sup>*</sup></label>
    		<div class="controls">
    			<select name="marca">
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
    	<label class="control-label" for="articulo">Nombre Articulo <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="articulo" placeholder="articulo" name="articulo" value="<?php if(isset($_GET["editar"])){echo $nombre_articulo;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="descripcion">Descripcion <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="descripcion" placeholder="descripcion" name="descripcion" value="<?php if(isset($_GET["editar"])){echo $descripcion;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="precio">Precio <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="precio" placeholder="precio" name="precio" value="<?php if(isset($_GET["editar"])){echo $precio;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="iva">Iva <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="iva" placeholder="iva" name="iva" value="<?php if(isset($_GET["editar"])){echo $iva;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="activo">Estado Articulo <sup>*</sup></label>
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
    	<label class="control-label" for="tablon">Mostrar Tablon <sup>*</sup></label>
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
    			<input type="text" id="usuario" placeholder="usuario" name="usuario" value="<?php if(isset($_GET["editar"])){echo $usuario;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="fecha">Fecha <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="fecha" placeholder="fecha" name="fecha" value="<?php if(isset($_GET["editar"])){echo $fecha;}else{}?>">                   
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
    				<span>*Para la correcta visualización el tamaño de la imagen debe ser de 800*600 pixeles</span>   				
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
                    <input type="submit" name="submitCategoria" value="Guardar" class="exclusive shopBtn">
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
