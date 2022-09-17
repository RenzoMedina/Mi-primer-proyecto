DROP DATABASE IF EXISTS camones;
CREATE DATABASE camones;
USE camones;

CREATE TABLE cliente(
                    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
                    rut_cliente INT(15) NOT NULL,
                    nombre_cliente VARCHAR(200) NOT NULL
);

CREATE TABLE proveedor (
                        id_proveedor INT PRIMARY KEY AUTO_INCREMENT,
                        rut_proveedor INT (15) NOT NULL,
                        nombre_proveedor VARCHAR(100) NOT NULL,
                        direccion VARCHAR(250) NOT NULL,
                        sucursal_sede VARCHAR(250) NOT NULL,
                        INDEX(nombre_proveedor)
);

CREATE TABLE productos(
                        codigo_producto INT PRIMARY KEY,
                        nombre_producto VARCHAR(80) NOT NULL,
                        categoria VARCHAR(80) NOT NULL,
                        cantidad INT NOT NULL,
                        precio_costo FLOAT NOT NULL,
                        precio_venta FLOAT NOT NULL,
                        proveedor_nombre VARCHAR(100) NOT NULL,
                        fecIngreso VARCHAR (80) NOT NULL,
                        FOREIGN KEY (proveedor_nombre) REFERENCES proveedor (nombre_proveedor) ON DELETE CASCADE ON UPDATE CASCADE,
                        INDEX(nombre_producto)
);

CREATE TABLE ventas(
                    id_ventas INT PRIMARY KEY AUTO_INCREMENT,
                    codigo INT NOT NULL,
                    descripcion VARCHAR(100) NOT NULL,
                    valor_venta INT NOT NULL,
                    cantidad INT NOT NULL,
                    total INT NOT NULL,
                    FOREIGN KEY (codigo) REFERENCES productos (codigo_producto) ON DELETE CASCADE ON UPDATE CASCADE

);
CREATE TABLE sucursal(
                        codigo INT PRIMARY KEY AUTO_INCREMENT,
                        nombre_sede VARCHAR(100) NOT NULL,
                        dirección_sede VARCHAR(250) NOT NULL,
                        INDEX(nombre_sede)

);

CREATE TABLE personal (
                        id_personal INT PRIMARY KEY AUTO_INCREMENT ,
                        rut INT(15) NOT NULL,
                        nombre VARCHAR(40) NOT NULL,
                        apellido VARCHAR (70) NOT NULL,
                        correo VARCHAR(70) NOT NULL,
                        contraseña VARCHAR(8) NOT NULL,
                        repetir_contraseña VARCHAR(8) NOT NULL,
                        cargo VARCHAR(40) NOT NULL,
                        sucursal_sede VARCHAR(250) NOT NULL,
                        estado VARCHAR(20) NOT NULL,
                        FOREIGN KEY (sucursal_sede) REFERENCES sucursal (nombre_sede) ON DELETE CASCADE ON UPDATE CASCADE
                        
);

/* esta tabla queda pendiente
CREATE TABLE sucursal_reporte(
                            codigo_sucursal INT NOT NULL,
                            producto_codigo INT NOT NULL,
                            nombre_producto VARCHAR(100) NOT NULL,
                            ventas_id INT NOT NULL,
                            personal_id INT NOT NULL

);


/*Llave foranea a la tabla sucursal _reporte
ALTER TABLE sucursal_reporte ADD FOREIGN KEY (codigo_sucursal) REFERENCES sucursal(codigo) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sucursal_reporte ADD FOREIGN KEY (producto_codigo) REFERENCES productos(codigo_producto) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sucursal_reporte ADD FOREIGN KEY (nombre_producto) REFERENCES productos(nombre_producto) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sucursal_reporte ADD FOREIGN KEY (ventas_id) REFERENCES ventas(id_ventas) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sucursal_reporte ADD FOREIGN KEY (personal_id) REFERENCES personal(id_personal) ON DELETE CASCADE ON UPDATE CASCADE;

*/
/*Insertamos datos para poder logear en la aplicación*/
INSERT INTO sucursal (nombre_sede,dirección_sede) VALUES ('Sede Lampa', 'Av. Lampa S/N - Lampa');
INSERT INTO personal (rut,nombre, apellido,correo, contraseña, repetir_contraseña,cargo,sucursal_sede,estado) VALUES(123456789,'Administrador','Usuario demo','aOperaciones@camones.cl','1234','1234','Administrador','Sede Lampa','Vigente');










