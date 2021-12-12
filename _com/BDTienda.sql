CREATE DATABASE tienda;

USE tienda;

/*  tabla usuario   */

CREATE TABLE `producto` (
  `id` int(2) NOT NULL,
  `denominacion` varchar(30) NOT NULL,
  `precioUnidad` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  PRIMARY KEY (id)
) ;

CREATE TABLE `ticket` (
  `id` int(3) NOT NULL AUTO_INCREMENT ,
  `apertura` DATETIME  NOT NULL,
  `cierre` DATETIME  NOT NULL,
  `empleado_id` DECIMAL(5,2),
  PRIMARY KEY (id)
);

CREATE TABLE `puesto` (
  `id` int(3) NOT NULL PRIMARY KEY,
  `denominacion` varchar(40)  NOT NULL
);


CREATE TABLE `linea` (
  `ticket_id` int(3) NOT NULL AUTO_INCREMENT ,
  `producto_id` int(3)  NOT NULL ,
  `unidades` int(3)  NOT NULL,
  `precioUnidad` DECIMAL(5,2)  NOT NULL,
   FOREIGN KEY (ticket_id) REFERENCES ticket(id),
   FOREIGN KEY (producto_id) REFERENCES producto(id)
);

