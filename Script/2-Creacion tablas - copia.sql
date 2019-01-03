drop table if exists articulos;
drop table if exists categorias;
drop table if exists subcategorias;
drop table if exists marcas;
drop table if exists tiendas;
drop table if exists roles;
drop table if exists usuarios;
drop table if exists pedido;
drop table if exists pedidoDetalle;
drop table if exists subcategorias;
drop table if exists estadoPedido;


create table articulos (
	id_articulo int not null auto_increment,
	id_categoria int,
	id_subcategoria int,
	id_marca int,
	nombre_articulo varchar(170) not null,
	descripcion varchar(250) not null,
	precio decimal (7,2),
	iva decimal (2,2),
	baja bool not null default 0,
	carrousel bool not null default 0,
	usr_modif varchar(50),
	fecha_modif date not null,
	primary key (id_articulo)
	) engine = innodb;

create table usuarios (
	id_usuario int not null auto_increment,
	nick VARCHAR(15) not null,
	password varchar(32) not null,
	nombre varchar(25) not null,
	apellidos char(30) not null,
	email varchar(30) not null,
	direccion varchar(100),
	provincia varchar(100),
	poblacion varchar(50),
	telefono varchar(15),
	rellenado bool not null default 0,
	baja bool not null default 0,
	id_rol int,	
    primary key (id_usuario)
	) engine = innodb;

create table pedido (
	id_pedido int not null auto_increment,
	FechaPedido date not null,
	id_tienda int,
	id_usuario int,
	id_estado int,
	baja bool not null default 0,
	primary key (id_pedido)
	) engine = innodb;

create table pedidoDetalle (
	
	id_detalle int not null auto_increment,
	id_pedido int,
	id_articulo int,
	precio decimal (7,2),
	iva decimal (2,2),
	cantidad int,
	baja bool not null default 0,
	primary key (id_detalle)
	) engine = innodb;
	
create table tiendas (
	id_tienda int,
	nombre varchar(50),
	direccion varchar (100),
	cif varchar(15),
	telf varchar(15),
	pais varchar(15),
	provincia varchar(15),
	ciudad varchar(25),
	email varchar(30),
	baja bool not null default 0,
	primary key (id_tienda)
	
	)	engine = innodb;
 
create table categorias (
	id_categoria int not null auto_increment,
	nombre_categoria varchar(50),
	baja bool not null default 0,
	primary key (id_categoria)
	) engine = innodb;
	
create table subcategorias (
	id_subcategoria int not null auto_increment,
	nombre_subcategoria varchar(50),
	baja bool not null default 0,
	primary key (id_subcategoria)
	) engine = innodb;
	
create table marcas (
	id_marca int not null auto_increment,
	nombre_marca varchar(50),
	baja bool not null default 0,
	primary key (id_marca)
	) engine = innodb;
	
create table roles (
	id_rol int not null auto_increment,
	rol varchar(50),
	baja bool not null default 0,
	primary key (id_rol)
	) engine = innodb;
	
create table estadoPedido (
	id_estado int not null auto_increment,
	estado varchar(50),
	baja bool not null default 0,
	primary key (id_estado)
	) engine = innodb;












