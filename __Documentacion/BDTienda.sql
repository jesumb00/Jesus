CREATE DATABASE tienda;

USE tienda;

/*  tabla usuario   */

CREATE TABLE `producto` (
  `id` int(2) AUTO_INCREMENT,
  `denominacion` varchar(30) NOT NULL,
  `precioUnidad` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  PRIMARY KEY (id)
) ;

CREATE TABLE `ticket` (
  `id` int(3)  AUTO_INCREMENT ,
  `apertura` DATETIME  NOT NULL,
  `cierre` DATETIME ,
  `empleadoId` int(2),
  PRIMARY KEY (id)
);

CREATE TABLE `puesto` (
  `id` int(3) NOT NULL PRIMARY KEY,
  `denominacion` varchar(40)  NOT NULL
);


CREATE TABLE `linea` (
  `ticketId` int(3)  AUTO_INCREMENT ,
  `productoId` int(3)  NOT NULL ,
  `unidades` int(3)  NOT NULL,
  `precioUnidad` DECIMAL(5,2)  NOT NULL,
   FOREIGN KEY (ticketId) REFERENCES ticket(id),
   FOREIGN KEY (productoId) REFERENCES producto(id)
);

CREATE TABLE `traza` (
  `idUsuario` int(2) NOT NULL,
  `localizacion` varchar(30) NOT NULL,
  `hecho` varchar(30) NOT NULL,
  `posibleId` int(3) ,
  `fecha` varchar(3)
) ;

INSERT INTO producto VALUES (1,'Patatas'    ,0.99 , 29),
                            (2,'Pizza'      ,1.99 , 9),
                            (3,'Lechuga'    ,0.49 , 8),
                            (4,'Pimiento'   ,0.52 , 4),
                            (5,'Fresas'     ,2.00 , 40),
                            (6,'Napolitana' ,0.99 , 60),
                            (7,'Chocolate'  ,1.50 , 45),
                            (8,'Manzana'    ,0.88 , 50),
                            (9,'Pera'       ,1.30 , 29);

INSERT INTO ticket VALUES (1, '2021/04/15 16:00:00' ,  '2021/04/15 20:30:00' , 4),
                          (2, '2021/04/15 16:01:55' ,  '2021/04/15 20:30:00' , 2),
                          (3, '2021/04/15 16:01:56' , '2021/04/15 20:30:00'  , 2),
                          (4, '2021/04/15 16:03:01' ,  '2021/04/15 20:30:00' , 5),
                          (5, '2021/04/15 15:00:00' ,  '2021/04/15 20:30:00' , 7),
                          (6, '2021/04/15 17:00:00' ,  '2021/04/15 20:30:00' , 8),
                          (7, '2021/04/15 18:00:00' ,  '2021/04/15 20:30:00' , 1);

INSERT INTO puesto VALUES (1, 'Cajero' ),
                          (2, 'Reponedor' ),
                          (3, 'Encargado' ),
                          (4, 'Mozo almacén' ),
                          (5, 'Dueño' ),
                          (6, 'Auditor' );
        
INSERT INTO linea VALUES (1, 2 , 55 , 4.99),
                          (2, 4 , 3  , 2.45),
                          (3, 1 , 34 , 1.90),
                          (4, 5 , 54 , 5),
                          (5, 7 , 23 , 7.89),
                          (6, 6 , 12 , 5.99),
                          (7, 2 , 11 , 1.50);
 


