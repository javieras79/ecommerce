insert into roles (rol) values ('usuario');
insert into roles (rol) values ('adm');
insert into roles (rol) values ('empleado');

INSERT INTO `onlineshop`.`usuarios` (`nick`, `password`, `nombre`, `apellidos`, `email`, `direccion`, `provincia`, `poblacion`, `telefono`, `baja`, `id_rol`) VALUES ('javieras', 'jame47l', 'Javier', 'Aznar Serna', 'javieras79@gmail.com', 'Doctor Gregorio Marañon 25', 'Alicante', 'Elche', '680415480', '', '1');
INSERT INTO `onlineshop`.`usuarios` (`nick`, `password`, `nombre`, `apellidos`, `email`, `direccion`, `provincia`, `poblacion`, `telefono`, `id_rol`) VALUES ('admjavieras', 'jame47l', 'Javier', 'Aznar Serna', 'javieras79@gmail.com', 'Doctor Gregorio Marañon 25', 'Alicante', 'Elche', '680415480', '2');

INSERT INTO `onlineshop`.`marcas` (`nombre_marca`, `baja`) VALUES ('Ging-Gong', '1');
INSERT INTO `onlineshop`.`marcas` (`nombre_marca`, `baja`) VALUES ('D-Boys', '1');
INSERT INTO `onlineshop`.`marcas` (`nombre_marca`, `baja`) VALUES ('Marui', '1');
INSERT INTO `onlineshop`.`marcas` (`nombre_marca`, `baja`) VALUES ('Star', '1');
INSERT INTO `onlineshop`.`marcas` (`nombre_marca`, `baja`) VALUES ('Cyma', '1');

INSERT INTO `onlineshop`.`categorias` (`nombre_categoria`, `baja`) VALUES ('Replicas', '1');
INSERT INTO `onlineshop`.`categorias` (`nombre_categoria`, `baja`) VALUES ('Accesorios', '1');
INSERT INTO `onlineshop`.`categorias` (`nombre_categoria`, `baja`) VALUES ('Consumibles', '1');

INSERT INTO `onlineshop`.`subcategorias` (`id_categoria`, `nombre_subcategoria`, `baja`) VALUES ('1', 'Fusiles', '1');
INSERT INTO `onlineshop`.`subcategorias` (`id_categoria`, `nombre_subcategoria`, `baja`) VALUES ('1', 'Subfusiles', '1');
INSERT INTO `onlineshop`.`subcategorias` (`id_categoria`, `nombre_subcategoria`, `baja`) VALUES ('1', 'Pistolas', '1');
INSERT INTO `onlineshop`.`subcategorias` (`id_categoria`, `nombre_subcategoria`, `baja`) VALUES ('3', 'Bolas', '1');
INSERT INTO `onlineshop`.`subcategorias` (`id_categoria`, `nombre_subcategoria`, `baja`) VALUES ('2', 'Ropa', '1');

INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '1', '1', 'G36', 'Fusil de Asalto', '125.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '1', '2', 'M4', 'Fusil de Asalto', '130.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '1', '3', 'M16 A2', 'Fusil de Asalto', '115.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '2', '4', 'Mp5', 'Subfusil de Asalto', '110.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `baja`, `tablon`) VALUES ('1', '3', '5', 'P226', 'Pistola', '90.00', '21.00', '', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '3', '3', 'Beretta', 'Pistola', '130.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '2', '3', 'S635', 'Subfusil de Asalto', '120.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('2', '5', '2', 'Chaqueta', 'Camuflaje Woodland', '35.00', '21.00', '1');
INSERT INTO `onlineshop`.`articulos` (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('3', '4', '3', 'Bolas', '0.20mm recycled', '12.00', '21.00', '1');

