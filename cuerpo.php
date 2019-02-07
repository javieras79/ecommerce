<?php
include "getTablon.php";
?>
<?php
$tab_art = preparaTablon();
shuffle($tab_art);
?>
<?php 
if(empty($tab_art)){    
    echo '<div class="span9">';    
    echo '<div class="well">';    
    echo '<img style="width: 100%" src="img/sin_resultados_tablon.jpg" alt="">';					
    echo '</div>';
    echo '</div>';
}else{    
?>
<div class="span9">
	<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
			<div class="carousel-inner">
				<div class="item">
					<img style="width: 100%" src="img/articulos/<?php echo $tab_art[10]->imagen;?>" alt="">
					<div class="carousel-caption">
						<h4>Oferta en replicas 2018</h4>
						<p>
							<span>Descuentos y promociones</span>
						</p>
					</div>
				</div>
				<div class="item">
					<img style="width: 100%"
						src="img/articulos/<?php echo $tab_art[4]->imagen;?>" alt="">
					<div class="carousel-caption">
						<h4>Ofertas</h4>
						<p>
							<span>Últimos descuentos</span>
						</p>
					</div>
				</div>
				<div class="item active">
					<img style="width: 100%"
						src="img/articulos/<?php echo $tab_art[5]->imagen;?>" alt="">
					<div class="carousel-caption">
						<h4>Ofertas</h4>
						<p>
							<span>Últimos descuentos</span>
						</p>
					</div>
				</div>
				<div class="item">
					<img style="width: 100%"
						src="img/articulos/<?php echo $tab_art[6]->imagen;?>" alt="">
					<div class="carousel-caption">
						<h4>Ofertas</h4>
						<p>
							<span>Últimos descuentos</span>
						</p>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div>
	<!--
New Products
-->
	<div class="well well-small">
		<h3>Nuevos productos</h3>
		<hr class="soften" />

		<div class="row-fluid">
			<ul class="thumbnails">
				<li class="span4">
					<div class="thumbnail">
						<?php echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$tab_art[1]->imagen.'" title="add to cart"><span class="icon-search"></span> Click para ver</a> <a href="articuloDetalle.php?imagen='.$tab_art[1]->imagen.'">';?>
						<img src="img/articulos/<?php echo $tab_art[1]->imagen;?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $tab_art[1]->nombre_articulo;?></p>
							<p>
								<strong><?php echo $tab_art[1]->precio;?></strong>
							</p>
						<?php echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$tab_art[1]->id_articulo.'&cantidad=1" title="Añadir carro"> Añadir</a></h4>';?>
                        <br class="clr">
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
						<?php echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$tab_art[2]->imagen.'" title="add to cart"><span class="icon-search"></span> Click para ver</a> <a href="articuloDetalle.php?imagen='.$tab_art[2]->imagen.'">';?>
						<img src="img/articulos/<?php echo $tab_art[2]->imagen;?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $tab_art[2]->nombre_articulo;?></p>
							<p>
								<strong><?php echo $tab_art[2]->precio;?></strong>
							</p>
					    <?php echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$tab_art[2]->id_articulo.'&cantidad=1" title="Añadir carro"> Añadir</a></h4>';?>                     
                        <br class="clr">
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
					<?php echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$tab_art[3]->imagen.'" title="add to cart"><span class="icon-search"></span> Click para ver</a> <a href="articuloDetalle.php?imagen='.$tab_art[3]->imagen.'">';?>
						<img src="img/articulos/<?php echo $tab_art[3]->imagen;?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $tab_art[3]->nombre_articulo;?></p>
							<p>
								<strong><?php echo $tab_art[3]->precio;?></strong>
							</p>
    					<?php echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$tab_art[3]->id_articulo.'&cantidad=1" title="Añadir carro"> Añadir</a></h4>';?>
                        <br class="clr">
						</div>
					</div>
				</li>
		</div>
		<div class="row-fluid">
				<li class="span4">
					<div class="thumbnail">
					<?php echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$tab_art[7]->imagen.'" title="add to cart"><span class="icon-search"></span> Click para ver</a> <a href="articuloDetalle.php?imagen='.$tab_art[7]->imagen.'">';?>
						<img src="img/articulos/<?php echo $tab_art[7]->imagen;?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $tab_art[7]->nombre_articulo;?></p>
							<p>
								<strong><?php echo $tab_art[7]->precio;?></strong>
							</p>
 					    <?php echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$tab_art[7]->id_articulo.'&cantidad=1" title="Añadir carro"> Añadir</a></h4>';?>
                        <br class="clr">
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
					<?php echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$tab_art[8]->imagen.'" title="add to cart"><span class="icon-search"></span> Click para ver</a> <a href="articuloDetalle.php?imagen='.$tab_art[8]->imagen.'">';?>
						<img src="img/articulos/<?php echo $tab_art[8]->imagen;?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $tab_art[8]->nombre_articulo;?></p>
							<p>
								<strong><?php echo $tab_art[8]->precio;?></strong>
							</p>                        
                        <?php echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$tab_art[8]->id_articulo.'&cantidad=1" title="Añadir carro"> Añadir</a></h4>';?>
                        <br class="clr">
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
					<?php echo '<a class="zoomTool" href="articuloDetalle.php?imagen='.$tab_art[9]->imagen.'" title="add to cart"><span class="icon-search"></span> Click para ver</a> <a href="articuloDetalle.php?imagen='.$tab_art[8]->imagen.'">';?>
						<img src="img/articulos/<?php echo $tab_art[9]->imagen;?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $tab_art[9]->nombre_articulo;?></p>
							<p>
								<strong><?php echo $tab_art[9]->precio;?></strong>
							</p>                        
                        <?php echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$tab_art[9]->id_articulo.'&cantidad=1" title="Añadir carro"> Añadir</a></h4>';?>
                        <br class="clr">
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<hr>
</div>
<?php 
}
?>