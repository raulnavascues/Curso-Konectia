CREATE DATABASE IF NOT EXISTS konectia DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS provincias(
	id INT(3) AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(255) NOT NULL DEFAULT ''
);

CREATE TABLE IF NOT EXISTS clientes(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fecha_alta DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos dado de alta el registro',
	fecha_modificacion DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos modificado el registro',
	nif VARCHAR (9) NOT NULL COMMENT 'Numero de identificacion fiscal del cliente',
	nombre VARCHAR(50) NOT NULL DEFAULT '' COMMENT'Nombre del cliente al que se le va a realizar el trabajo',
	puntuacion INT(10) NOT NULL DEFAULT '0' COMMENT'Puntuacion total de los trabajos realizados',
	telefono VARCHAR(20) NOT NULL DEFAULT '+0000000000' COMMENT'Telefono del cliente',
	consumido FLOAT(16,2) NOT NULL DEFAULT '0.00',
	direccion VARCHAR(255) NULL DEFAULT '' COMMENT'Direccion del cliente',
	localidad VARCHAR(50) NULL DEFAULT '' COMMENT'Localidad del cliente',
	provincia INT(3),
	cp VARCHAR(10) NULL DEFAULT '' COMMENT'Codigo postal del cliente',
	email VARCHAR(255) NULL DEFAULT '' COMMENT 'Email del cliente',
	activo BIT(1) NOT NULL DEFAULT 1,
	FOREIGN KEY (provincia) REFERENCES konectia.provincias(id)
);


CREATE TABLE IF NOT EXISTS proveedores(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
	fecha_alta DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos dado de alta el registro',
	fecha_modificacion DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos modificado el registro',
	nif VARCHAR (9) NOT NULL COMMENT'Numero de identificacion fiscal del proveedor',
	nombre VARCHAR(50) NOT NULL DEFAULT 'Nombre del cliente' ,
	telefono VARCHAR(20) NOT NULL DEFAULT '+0000000000' COMMENT'Telefono del proveedor',
	direccion VARCHAR(255) NULL COMMENT'Direccion del proveedor', 
	localidad VARCHAR(50) NULL DEFAULT '' COMMENT'Localidad del proveedor',
	cp VARCHAR(10) NULL DEFAULT '' COMMENT'Codigo postal del proveedor',
	provincia INT(3),
	email VARCHAR(255) NULL DEFAULT '' COMMENT 'Email del proveedor',
	activo BIT(1) NOT NULL DEFAULT 1,
	FOREIGN KEY (provincia) REFERENCES konectia.provincias(id)
);

CREATE TABLE IF NOT EXISTS tipo_trabajo(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	fecha_alta DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos dado de alta el registro',
	fecha_modificacion DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos modificado el registro',
	clave VARCHAR(5) NOT NULL DEFAULT '' COMMENT 'Clave del tipo de trabajo para identificarlo',
	nombre VARCHAR (100) NOT NULL DEFAULT '' COMMENT 'Nombre o descripcion de la categoria o tipo de trabajo a realizar ',
	activo BIT(1) NOT NULL DEFAULT 1,
	alta  BOOLEAN DEFAULT TRUE 
);

CREATE TABLE tipos_trabajo_puntuacion(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	tipo_trabajo INT(11) NOT NULL,
	fecha_alta DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos dado de alta el registro',
	fecha_modificacion DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos modificado el registro',
	fecha_desde DATE NOT NULL,
	fecha_hasta DATE NOT NULL,
	puntuacion INT(5) NOT NULL DEFAULT 0,
	activo BIT(1) NOT NULL DEFAULT 1,
	FOREIGN KEY(tipo_trabajo) REFERENCES konectia.tipo_trabajo(id)
);
	
CREATE TABLE IF NOT EXISTS trabajos(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	fecha_alta DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos dado de alta el registro',
	fecha_modificacion DATE NULL COMMENT 'Fecha que nos sirve para conocer en que fecha hemos modificado el registro',
	cliente INT(11) COMMENT 'Clave foranea referente a la tabla de clientes',
	proveedor INT(11) COMMENT 'Clave foranea referente a la tabla de proveedores',
	tipo_trabajo INT(11) COMMENT 'Clave foranea referente a la tabla de tipos de trabajos',
	puntuacion INT(3) NULL DEFAULT 0 COMMENT'Puntuacion del trabajo en cuestion por si en algun momento se cambia en la tabla correspondiente',
	fecha DATE NULL COMMENT 'Fecha en la cual se ha realizado el trabajo',
	descripcion TEXT COMMENT 'Descripcion del cliente',
	activo BIT(1) NOT NULL DEFAULT 1,
	FOREIGN KEY (cliente) REFERENCES konectia.clientes(id),
	FOREIGN KEY (proveedor) REFERENCES konectia.proveedores(id),
	FOREIGN KEY (tipo_trabajo) REFERENCES konectia.tipo_trabajo(id)
);

INSERT INTO provincias VALUES 
							(0, 'Araba'),
							(0, 'Albacete'),
							(0, 'Alacant'),
							(0, 'Almería'),
							(0, 'Ávila'),
							(0, 'Badajoz'),
							(0, 'Balears'),
							(0, 'Barcelona'),
							(0, 'Burgos'),
							(0, 'Cáceres'),
							(0, 'Cádiz'),
							(0, 'Castellón de la Plana'),
							(0, 'Ciudad Real'),
							(0, 'Córdoba'),
							(0, 'A Coruña'),
							(0, 'Cuenca'),
							(0, 'Girona'),
							(0, 'Granada'),
							(0, 'Guadalajara'),
							(0, 'Gipuzkoa'),
							(0, 'Huelva'),
							(0, 'Huesca'),
							(0, 'Jaén'),
							(0, 'León'),
							(0, 'Lleida'),
							(0, 'La Rioja'),
							(0, 'Lugo'),
							(0, 'Madrid'),
							(0, 'Málaga'),
							(0, 'Murcia'),
							(0, 'Navarra'),
							(0, 'Ourense'),
							(0, 'Asturies'),
							(0, 'Palencia'),
							(0, 'Las Palmas'),
							(0, 'Pontevedra'),
							(0, 'Salamanca'),
							(0, 'S.C.Tenerife'),
							(0, 'Cantabria'),
							(0, 'Segovia'),
							(0, 'Sevilla'),
							(0, 'Soria'),
							(0, 'Tarragona'),
							(0, 'Teruel'),
							(0, 'Toledo'),
							(0, 'Valencia'),
							(0, 'Valladolid'),
							(0, 'Bizkaia'),
							(0, 'Zamora'),
							(0, 'Zaragoza'),
							(0, 'Ceuta'),
							(0, 'Melilla'),
							(0,'desconocida');