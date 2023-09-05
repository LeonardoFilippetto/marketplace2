# Host: localhost:3399  (Version 5.5.5-10.4.22-MariaDB)
# Date: 2023-09-05 10:23:21
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "anuncios"
#

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `titulo_anuncio` varchar(150) DEFAULT NULL,
  `categoria_produto` varchar(45) DEFAULT NULL,
  `preco` decimal(9,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `img_princ` text DEFAULT NULL,
  `imgs_sec` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `informacoes_adicionais` text DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `vendas_registradas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "anuncios"
#

INSERT INTO `anuncios` VALUES (1,1,1,'Placa de vídeo Nvidia RTX 3090','placa_video',8300.00,10,'1682258092BQSol7cRWDzZrtHmtMV9VXw3.jpeg','1682258092BQSol7cRWDzZrtHmtMV9VXw3_0.jpeg,1682258092BQSol7cRWDzZrtHmtMV9VXw3_1.jpeg,1682258092BQSol7cRWDzZrtHmtMV9VXw3_2.jpeg','descrição','256Gbps',1,NULL),(2,3,1,'Placa-mãe ASUS ROG strix Z490-A gaming','placa_mae',2400.00,30,'1682259243l4k2OlEgLuTBTRDqU41kKgAe.png','1682259243l4k2OlEgLuTBTRDqU41kKgAe_0.png','descr','info',1,NULL),(3,4,1,'Processador Intel Core i7-10700K','processador',1800.00,15,'16822595237pekiQHIg6lxvt74hWVR2oQ1.jpeg','16822595237pekiQHIg6lxvt74hWVR2oQ1_0.jpeg','descr','info adic',1,NULL),(4,5,1,'Memória RAM HyperX Fury 16GB DDR4 3666MHz','ram',250.00,50,'1682259891m0zTD6rjjjT5SCATInv3Xq2y.jpeg','1682259891m0zTD6rjjjT5SCATInv3Xq2y_0.jpeg','descr','info',1,NULL),(5,6,1,'HD Seagate Barracuda 1TB','armazenamento',240.00,5,'1682260367yPFu5lVmNSzOSpg14Prn03m5.jpeg','1682260367yPFu5lVmNSzOSpg14Prn03m5_0.jpeg','descr','inf',1,NULL),(6,7,1,'Gabinete TGT Erion Mid Tower','gabinete',200.00,6,'1682260579nfDM5wuDvfIoUQlRO73ScfEm.jpeg','1682260579nfDM5wuDvfIoUQlRO73ScfEm_0.jpeg','descr','aaaa',1,NULL),(7,8,1,'Fonte de Alimentação Corsair 550CV 550W','fonte',300.00,9,'1682260751HB9pbPuoIBSatneomBMTWMGE.jpeg','1682260751HB9pbPuoIBSatneomBMTWMGE_0.jpeg','ddd','eee',1,NULL),(8,9,1,'Liquid Cooler DeepCool LE520','cooler',500.00,3,'1682261045q7CYGccUdtQWYejNMT8z6SMy.jpeg','1682261045q7CYGccUdtQWYejNMT8z6SMy_0.jpeg','asd','asda',1,NULL);

#
# Structure for table "avaliacoes"
#

DROP TABLE IF EXISTS `avaliacoes`;
CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `opiniao` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "avaliacoes"
#


#
# Structure for table "comentarios"
#

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_anunucio` int(11) DEFAULT NULL,
  `id_resposta` int(11) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "comentarios"
#


#
# Structure for table "produtos"
#

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_anuncio` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `barramento_encaixe_armazenamento` varchar(20) DEFAULT NULL,
  `barramento_encaixe_video` varchar(20) DEFAULT NULL,
  `barramentos_ram` int(11) DEFAULT NULL,
  `barramentos_video` varchar(100) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `condicao` varchar(5) NOT NULL,
  `consumo_energia` int(5) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `fab_comp` varchar(20) DEFAULT NULL,
  `fator_forma` varchar(20) DEFAULT NULL,
  `formato_gabinete` varchar(10) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `largura` int(11) DEFAULT NULL,
  `linha` varchar(50) DEFAULT NULL,
  `litografia` int(3) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `max_ram` int(11) DEFAULT NULL,
  `nucleos` int(11) DEFAULT NULL,
  `potencia` int(11) DEFAULT NULL,
  `quantidade_armazenamento` int(11) DEFAULT NULL,
  `quantidade_pentes` int(11) DEFAULT NULL,
  `ram_pente_individual` int(11) DEFAULT NULL,
  `ram_placa_video` int(11) DEFAULT NULL,
  `ram_total` int(11) DEFAULT NULL,
  `resfriamento` varchar(25) DEFAULT NULL,
  `soquete` varchar(25) DEFAULT NULL,
  `selo_80_plus` varchar(30) DEFAULT NULL,
  `suporta_sata` tinyint(1) DEFAULT NULL,
  `suporta_nvme` tinyint(1) DEFAULT NULL,
  `tempo_uso` varchar(10) DEFAULT NULL,
  `threads` int(3) DEFAULT NULL,
  `tipo_armazenamento` varchar(5) DEFAULT NULL,
  `tipo_ram` varchar(20) DEFAULT NULL,
  `video_integrado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

#
# Data for table "produtos"
#

INSERT INTO `produtos` VALUES (1,1,1,NULL,NULL,'x16',NULL,NULL,NULL,'novo',NULL,'1111111111111','Nvidia',NULL,NULL,NULL,1800,NULL,NULL,NULL,'RTX 3090',NULL,NULL,NULL,NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(3,2,1,NULL,NULL,NULL,4,'x16',NULL,'novo',NULL,'1111111111111','ASUS','intel','atx',NULL,3666,NULL,NULL,NULL,'ROG STRIX Z490-A GAMING',256,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'LGA1200',NULL,1,1,'0',NULL,NULL,'DDR4',NULL),(4,3,1,NULL,NULL,NULL,NULL,NULL,NULL,'novo',NULL,'1111111111112','Intel',NULL,NULL,NULL,3800,NULL,'i7',NULL,'Core i7-10700K',NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'LGA1200',NULL,NULL,NULL,'0',NULL,NULL,NULL,0),(5,4,1,NULL,NULL,NULL,NULL,NULL,NULL,'novo',NULL,'2222222222222','HyperX',NULL,NULL,NULL,3666,NULL,NULL,NULL,'Fury',NULL,NULL,NULL,NULL,1,16,NULL,16,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,'DDR4',NULL),(6,5,1,NULL,'sata',NULL,NULL,NULL,NULL,'novo',NULL,'3333333333333','Seagate',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Barracuda',NULL,NULL,NULL,1000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'SSD',NULL,NULL),(7,6,1,410,NULL,NULL,NULL,NULL,330,'novo',NULL,'9999999999999','TGT',NULL,'atx','mid',NULL,180,NULL,NULL,'Erion',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(8,7,1,NULL,NULL,NULL,NULL,NULL,NULL,'novo',NULL,'7777777777777','Corsair',NULL,'atx',NULL,NULL,NULL,NULL,NULL,'CV550',NULL,NULL,550,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'bronze',NULL,NULL,'0',NULL,NULL,NULL,NULL),(9,8,1,6,NULL,NULL,NULL,NULL,120,'novo',NULL,'8888888888888','DeepCool',NULL,NULL,NULL,NULL,300,NULL,NULL,'LE520',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'liquid',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL);

#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `razao_social` varchar(150) DEFAULT NULL,
  `tributo` varchar(20) DEFAULT NULL,
  `nome_fantasia` varchar(50) DEFAULT NULL,
  `telefone_empresa` varchar(10) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `logradouro` varchar(150) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'48425476852',NULL,'2006-01-05','(11 11111-1','filippettoleonardo@gmail.com','$2y$12$zgwPTCrYSsxV5anaiKfKaeRc0yCDJw7.Dcshkt/pncHC67BXFHJcG','Leonardo Filippetto',NULL,NULL,NULL,NULL,'11111111','rua dos aimorés','480','Apto. P13','Vila Costa e Silva','Campinas','ao lado do mercado Dia');

#
# Structure for table "vendas"
#

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `id_vendas` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprador` int(11) DEFAULT NULL,
  `ids_anuncios` text DEFAULT NULL,
  `qunatidades` text DEFAULT NULL,
  `preco_total` decimal(9,2) DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  `transportadora` varchar(40) DEFAULT NULL,
  `valor_frete` decimal(9,2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_vendas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "vendas"
#

