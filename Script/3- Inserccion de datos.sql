insert into roles (rol) values ('usuario');
insert into roles (rol) values ('adm');
insert into roles (rol) values ('empleado');

INSERT INTO usuarios (`nick`, `password`, `nombre`, `apellidos`, `email`, `direccion`, `provincia`, `poblacion`, `telefono`, `activo`, `id_rol`) VALUES ('javieras', 'jame47l', 'Javier', 'Aznar Serna', 'javieras79@gmail.com', 'Doctor Gregorio Marañon 25', 'Alicante', 'Elche', '680415480', '', '1');
INSERT INTO usuarios (`nick`, `password`, `nombre`, `apellidos`, `email`, `direccion`, `provincia`, `poblacion`, `telefono`, `id_rol`) VALUES ('admjavieras', 'jame47l', 'Javier', 'Aznar Serna', 'javieras79@gmail.com', 'Doctor Gregorio Marañon 25', 'Alicante', 'Elche', '680415480', '2');

INSERT INTO marcas (`nombre_marca`, `activo`) VALUES ('Ging-Gong', '1');
INSERT INTO marcas (`nombre_marca`, `activo`) VALUES ('D-Boys', '1');
INSERT INTO marcas (`nombre_marca`, `activo`) VALUES ('Marui', '1');
INSERT INTO marcas (`nombre_marca`, `activo`) VALUES ('Star', '1');
INSERT INTO marcas (`nombre_marca`, `activo`) VALUES ('Cyma', '1');

INSERT INTO categorias (`nombre_categoria`, `activo`) VALUES ('Replicas', '1');
INSERT INTO categorias (`nombre_categoria`, `activo`) VALUES ('Accesorios', '1');
INSERT INTO categorias (`nombre_categoria`, `activo`) VALUES ('Consumibles', '1');

INSERT INTO subcategorias (`id_categoria`, `nombre_subcategoria`, `activo`) VALUES ('1', 'Fusiles', '1');
INSERT INTO subcategorias (`id_categoria`, `nombre_subcategoria`, `activo`) VALUES ('1', 'Subfusiles', '1');
INSERT INTO subcategorias (`id_categoria`, `nombre_subcategoria`, `activo`) VALUES ('1', 'Pistolas', '1');
INSERT INTO subcategorias (`id_categoria`, `nombre_subcategoria`, `activo`) VALUES ('3', 'Bolas', '1');
INSERT INTO subcategorias (`id_categoria`, `nombre_subcategoria`, `activo`) VALUES ('2', 'Ropa', '1');

INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '1', '1', 'G36', 'Fusil de Asalto', '125.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '1', '2', 'M4', 'Fusil de Asalto', '130.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '1', '3', 'M16 A2', 'Fusil de Asalto', '115.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '2', '4', 'Mp5', 'Subfusil de Asalto', '110.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`) VALUES ('1', '3', '5', 'P226', 'Pistola', '90.00', '21.00', '', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '3', '3', 'Beretta', 'Pistola', '130.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('1', '2', '3', 'S635', 'Subfusil de Asalto', '120.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('2', '5', '2', 'Chaqueta', 'Camuflaje Woodland', '35.00', '21.00', '1');
INSERT INTO articulos (`id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `tablon`) VALUES ('3', '4', '3', 'Bolas', '0.20mm recycled', '12.00', '21.00', '1');
INSERT INTO articulos (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`, `usr_modif`, `fecha_modif`) VALUES (NULL, '1', '1', '2', 'Sig Sauer 556 Shorty CQB', 'Fusil de Asalto', '416.27', '21.00', '0', '1', NULL, '');
INSERT INTO articulos (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`, `usr_modif`, `fecha_modif`) VALUES (NULL, '1', '1', '3', 'Go 999RAS rifle replica GBB', 'Fusil de Asalto', '411.91', '21.00', '0', '1', NULL, '');
INSERT INTO articulos (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`, `usr_modif`, `fecha_modif`) VALUES (NULL, '1', '1', '4', 'LCK74MN NV', 'Fusil de Asalto', '401.43', '21.00', '0', '1', NULL, '');
INSERT INTO articulos (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`, `usr_modif`, `fecha_modif`) VALUES (NULL, '1', '1', '3', 'Ak 47', 'Fusil de Asalto', '114.84', '21.00', '0', '1', NULL, '');
INSERT INTO articulos (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`, `usr_modif`, `fecha_modif`) VALUES (NULL, '1', '1', '1', 'Srt-09', 'Fusil de Asalto', '116.15', '21.00', '0', '1', NULL, '');

INSERT INTO estadopedido (estado,activo) values ("cerrado",0);
INSERT INTO estadopedido (estado,activo) values ("Abierto",1);
INSERT INTO estadopedido (estado,activo) values ("En curso",2);
INSERT INTO estadopedido (estado,activo) values ("Tramitado",3);
