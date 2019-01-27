<?php
//session_start();
include("cabecera.php");
include("menu.php");
include_once("conectBBDD.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->	
<?php
   if(isset($_GET["editar"])){
     $id=$_GET["id"];
     $con = conectar_bd();
     //$sql = $con->prepare('Select * from articulos;');
     $sql = $con->prepare("select * from usuarios where id_usuario=".$id);
     $sql->execute();
     while($datos = $sql->fetch()){
         
         $id=$datos["id_usuario"];
         $nick=$datos["nick"];
         $nombre=$datos["nombre"];
         $apellidos=$datos["apellidos"];
         $email=$datos["email"];
         $direccion=$datos["direccion"];
         $provincia=$datos["provincia"];
         $poblacion=$datos["poblacion"];
         $telefono=$datos["telefono"];         
         $activo=$datos["activo"];
         $rol=$datos["id_rol"];         
     }     
     echo '<form class="form-horizontal" action="toolsUsers.php?editUser=SI&id='.$id.'" method="POST" enctype="multipart/form-data">';
   }else{     
     echo '<form class="form-horizontal" action="toolsUsers.php?addUser=SI" method="POST" enctype="multipart/form-data">';
     $activo=0;     
   }
?>  
<div class="span12">     
<h3> Mantenimiento de Usuarios</h3>
    <hr class="soft"/>
</div>
<div class="span12">    
    <div class="well">       
    <br>
    	<div class="control-group">
    	<label class="control-label" for="nick">Nick <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="nick" placeholder="nick" name="nick" value="<?php if(isset($_GET["editar"])){echo $nick;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="nombre">Nombre <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="nombre" placeholder="nombre" name="nombre" value="<?php if(isset($_GET["editar"])){echo $nombre;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="apellidos">Apellidos <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="apellidos" placeholder="apellidos" name="apellidos" value="<?php if(isset($_GET["editar"])){echo $apellidos;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="email">Email <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="email" placeholder="email" name="email" value="<?php if(isset($_GET["editar"])){echo $email;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="direccion">Direccion <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="direccion" placeholder="direccion" name="direccion" value="<?php if(isset($_GET["editar"])){echo $direccion;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="provincia">Provincia <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="provincia" placeholder="provincia" name="provincia" value="<?php if(isset($_GET["editar"])){echo $provincia;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="poblacion">Poblacion <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="poblacion" placeholder="poblacion" name="poblacion" value="<?php if(isset($_GET["editar"])){echo $poblacion;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="telefono">Telefono <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="telefono" placeholder="telefono" name="telefono" value="<?php if(isset($_GET["editar"])){echo $telefono;}else{}?>">                   
   			</div>
    	</div>
    	<div class="control-group">
    	<label class="control-label" for="activo">Activo <sup>*</sup></label>
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
    	<label class="control-label" for="rol">Rol <sup>*</sup></label>
    		<div class="controls">
    			<input type="text" id="rol" placeholder="rol" name="rol" value="<?php if(isset($_GET["editar"])){echo $rol;}else{}?>">                   
   			</div>
    	</div>
	</div>
</div>
<div class="span12">
  <div class="well">  
        	 <div class="control-group">
                <div>
                    <center><a href="listUsers.php" class="shopBtn btn-large">Volver</a>
                    <input type="submit" name="submitCategoria" value="Guardar" class="exclusive shopBtn">
                    </center>                
                </div>                
            </div>  
   </div>
</div>
</form>

<?php
    include("pie.php");
?>
