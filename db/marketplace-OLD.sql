# Host: localhost:3399  (Version 5.5.5-10.4.22-MariaDB)
# Date: 2023-02-27 11:46:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "anuncios"
#

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendedor` int(11) NOT NULL,
  `nome_prod` varchar(255) NOT NULL,
  `tipo_prod` varchar(60) NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `imagem_princ` varchar(255) NOT NULL,
  PRIMARY KEY (`id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

#
# Data for table "anuncios"
#

INSERT INTO `anuncios` VALUES (1,1,'processador intel core i7-8700F','Processador',1500.00,'proc_1.png'),(2,2,'Placa de vídeo Nvidea RTX 2060','Placa de vídeo',1800.00,'gpu_1.png'),(3,3,'Placa mãe ASUS ROG STRIX Z490-E','Placa mãe',1100.00,'placa_mae_1.png'),(4,4,'Fonte Corsair RM850x 850W','Fonte',930.00,'fonte_1.png'),(5,5,'Memória RAM HyperX 16GB','RAM',400.00,'ram_1.png'),(6,6,'SSD Seagate Barracuda 1TB NVMe','Ssd',650.00,'ssd_1.png'),(7,7,'Water cooler Deepcool L360 RGB','Water cooler',650.00,'water_cooler_1.png'),(8,8,'Gabinete Redragon Grapple Branco Gc-607wh','Gabinete',390.00,'gabinete_1.png'),(9,9,'Cooler Corsair CO-9050071-WW RGB','Cooler',200.00,'cooler_1.png'),(10,10,'HD Western Digital Blue 4TB','Hd',460.00,'hd_1.png');
