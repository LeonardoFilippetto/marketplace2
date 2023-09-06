-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06-Set-2023 às 03:22
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marketplace`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL,
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
  `vendas_registradas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `id_produto`, `id_vendedor`, `titulo_anuncio`, `categoria_produto`, `preco`, `estoque`, `img_princ`, `imgs_sec`, `descricao`, `informacoes_adicionais`, `ativo`, `vendas_registradas`) VALUES
(1, 1, 1, 'Placa de vídeo Nvidia RTX 3090', 'placa_video', 8300.00, 10, '1682258092BQSol7cRWDzZrtHmtMV9VXw3.jpeg', '1682258092BQSol7cRWDzZrtHmtMV9VXw3_0.jpeg,1682258092BQSol7cRWDzZrtHmtMV9VXw3_1.jpeg,1682258092BQSol7cRWDzZrtHmtMV9VXw3_2.jpeg', 'descrição', '256Gbps', 1, NULL),
(2, 3, 1, 'Placa-mãe ASUS ROG strix Z490-A gaming', 'placa_mae', 2400.00, 30, '1682259243l4k2OlEgLuTBTRDqU41kKgAe.png', '1682259243l4k2OlEgLuTBTRDqU41kKgAe_0.png', 'descr', 'info', 1, NULL),
(3, 4, 1, 'Processador Intel Core i7-10700K', 'processador', 1800.00, 15, '16822595237pekiQHIg6lxvt74hWVR2oQ1.jpeg', '16822595237pekiQHIg6lxvt74hWVR2oQ1_0.jpeg', 'descr', 'info adic', 1, NULL),
(4, 5, 1, 'Memória RAM HyperX Fury 16GB DDR4 3666MHz', 'ram', 250.00, 50, '1682259891m0zTD6rjjjT5SCATInv3Xq2y.jpeg', '1682259891m0zTD6rjjjT5SCATInv3Xq2y_0.jpeg', 'descr', 'info', 1, NULL),
(5, 6, 1, 'HD Seagate Barracuda 1TB', 'armazenamento', 240.00, 5, '1682260367yPFu5lVmNSzOSpg14Prn03m5.jpeg', '1682260367yPFu5lVmNSzOSpg14Prn03m5_0.jpeg', 'descr', 'inf', 1, NULL),
(6, 7, 1, 'Gabinete TGT Erion Mid Tower', 'gabinete', 200.00, 6, '1682260579nfDM5wuDvfIoUQlRO73ScfEm.jpeg', '1682260579nfDM5wuDvfIoUQlRO73ScfEm_0.jpeg', 'descr', 'aaaa', 1, NULL),
(7, 8, 1, 'Fonte de Alimentação Corsair 550CV 550W', 'fonte', 300.00, 9, '1682260751HB9pbPuoIBSatneomBMTWMGE.jpeg', '1682260751HB9pbPuoIBSatneomBMTWMGE_0.jpeg', 'ddd', 'eee', 1, NULL),
(8, 9, 1, 'Liquid Cooler DeepCool LE520', 'cooler', 500.00, 3, '1682261045q7CYGccUdtQWYejNMT8z6SMy.jpeg', '1682261045q7CYGccUdtQWYejNMT8z6SMy_0.jpeg', 'asd', 'asda', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `opiniao` text DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_anunucio` int(11) DEFAULT NULL,
  `id_resposta` int(11) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpu`
--

CREATE TABLE `cpu` (
  `modelo` varchar(512) DEFAULT NULL,
  `familia` varchar(512) DEFAULT NULL,
  `linha` varchar(512) DEFAULT NULL,
  `plataformas` varchar(512) DEFAULT NULL,
  `nucleos` int(11) DEFAULT NULL,
  `threads` int(11) DEFAULT NULL,
  `clock` varchar(512) DEFAULT NULL,
  `overclock` varchar(512) DEFAULT NULL,
  `desbloqueado` varchar(512) DEFAULT NULL,
  `nanometros` varchar(512) DEFAULT NULL,
  `versao_pci` varchar(512) DEFAULT NULL,
  `cooler_incluso` varchar(512) DEFAULT NULL,
  `temperatura_maxima` varchar(512) DEFAULT NULL,
  `placa_integrada` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cpu`
--

INSERT INTO `cpu` (`modelo`, `familia`, `linha`, `plataformas`, `nucleos`, `threads`, `clock`, `overclock`, `desbloqueado`, `nanometros`, `versao_pci`, `cooler_incluso`, `temperatura_maxima`, `placa_integrada`) VALUES
('AMD Ryzen™ 9 7950X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Processors', 'Desktop', 16, 32, '4.5GHz', 'Até5.7GHz', 'Sim', '5nm', 'PCIe 5.0', 'Not included', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 9 7900X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Processors', 'Desktop', 12, 24, '4.7GHz', 'Até5.6GHz', 'Sim', '5nm', 'PCIe 5.0', 'Not included', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 9 7900', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Processors', 'Desktop', 12, 24, '3.7GHz', 'Até5.4GHz', 'Sim', '5nm', 'PCIe 5.0', 'AMD Wraith Prism', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 9 5950X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Desktop Processors', 'Desktop', 16, 32, '3.4GHz', 'Até4.9GHz', 'Sim', '7nm', 'PCIe 4.0', 'Not included', '90°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 7 7700X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 Processors', 'Desktop', 8, 16, '4.5GHz', 'Até5.4GHz', 'Sim', '5nm', 'PCIe 5.0', 'Not included', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 9 5900X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Desktop Processors', 'Desktop', 12, 24, '3.7GHz', 'Até4.8GHz', 'Sim', '7nm', 'PCIe 4.0', 'Not included', '90°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 7 7700', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 Processors', 'Desktop', 8, 16, '3.8GHz', 'Até5.3GHz', 'Sim', '5nm', 'PCIe 5.0', 'AMD Wraith Prism', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 7 5800X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 Desktop Processors', 'Desktop', 8, 16, '3.8GHz', 'Até4.7GHz', 'Sim', '7nm', 'PCIe 4.0', 'Not included', '90°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 7600X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Processors', 'Desktop', 6, 12, '4.7GHz', 'Até5.3GHz', 'Sim', '5nm', 'PCIe 5.0', 'Not included', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 7 5700X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 Desktop Processors', 'Desktop', 8, 16, '3.4GHz', 'Até4.6GHz', 'Sim', '7nm', 'PCIe 4.0', 'Not included', '90°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 7 5700G', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 5000 G-Series Desktop Processors with Radeon™ Graphics', 'Desktop', 8, 16, '3.8GHz', 'Até4.6GHz', 'Sim', '7nm', 'PCIe 3.0', 'Wraith Stealth', '95°C', 'Radeon™  Graphics'),
('AMD Ryzen™ 5 7600', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Processors', 'Desktop', 6, 12, '3.8GHz', 'Até5.1GHz', 'Sim', '5nm', 'PCIe 5.0', 'AMD Wraith Stealth', '95°C', 'AMD Radeon™ Graphics'),
('AMD Ryzen™ 5 7500F', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.7GHz', 'Até5.0GHz', 'Sim', '5nm', 'PCIe 5.0', 'AMD Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 5600X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.7GHz', 'Até4.6GHz', 'Sim', '7nm', 'PCIe 4.0', 'Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 5600G', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 5000 G-Series Desktop Processors with Radeon™ Graphics', 'Desktop', 6, 12, '3.9GHz', 'Até4.4GHz', 'Sim', '7nm', 'PCIe 3.0', 'Wraith Stealth', '95°C', 'Radeon™  Graphics'),
('AMD Ryzen™ 9 3900XT', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Desktop Processors', 'Desktop', 12, 24, '3.8GHz', 'Até4.7GHz', 'Sim', '7nm', 'PCIe 4.0', 'Not included', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 5600', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.5GHz', 'Até4.4GHz', 'Sim', '7nm', 'PCIe 4.0', 'AMD Wraith Stealth', '90°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 5500', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.6GHz', 'Até4.2GHz', 'Sim', '7nm', 'PCIe 3.0', 'AMD Wraith Stealth', '90°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 7 3800XT', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 Desktop Processors', 'Desktop', 8, 16, '3.9GHz', 'Até4.7GHz', 'Sim', '7nm', 'PCIe 4.0', 'Not included', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 4500', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.6GHz', 'Até4.1GHz', 'Sim', '7nm', 'PCIe 3.0', 'AMD Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 3600XT', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.8GHz', 'Até4.5GHz', 'Sim', '7nm', 'PCIe 4.0', 'Wraith Spire', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 9 3950X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 9 Desktop Processors', 'Desktop', 16, 32, '3.5GHz', 'Até4.7GHz', 'Sim', '7nm', 'PCIe 4.0', 'Cooler Not Included, Liquid Cooling Recommended', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 7 3700X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 Desktop Processors', 'Desktop', 8, 16, '3.6GHz', 'Até4.4GHz', 'Sim', '7nm', 'PCIe 4.0 x16', 'Wraith Prism with RGB LED', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 3 4100', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 3 Desktop Processors', 'Desktop', 4, 8, '3.8GHz', 'Até4.0GHz', 'Sim', '7nm', 'PCIe 3.0', 'AMD Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 7 5700GE', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 7 5000 G-Series Desktop Processors with Radeon™ Graphics', 'Desktop', 8, 16, '3.2GHz', 'Até4.6GHz', 'Sim', '7nm', 'PCIe 3.0', 'Wraith Stealth', '95°C', 'Radeon™  Graphics'),
('AMD Ryzen™ 5 3600X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.8GHz', 'Até4.4GHz', 'Sim', '7nm', 'PCIe 4.0 x16', 'Wraith Spire', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 5600GE', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 5000 G-Series Desktop Processors with Radeon™ Graphics', 'Desktop', 6, 12, '3.4GHz', 'Até4.4GHz', 'Sim', '7nm', 'PCIe 3.0', 'Wraith Stealth', '95°C', 'Radeon™  Graphics'),
('AMD Ryzen™ 5 3600', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 Desktop Processors', 'Desktop', 6, 12, '3.6GHz', 'Até4.2GHz', 'Sim', '7nm', 'PCIe 4.0 x16', 'Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 3 3300X', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 3 Desktop Processors', 'Desktop', 4, 8, '3.8GHz', 'Até4.3GHz', 'Sim', '7nm', 'PCIe 4.0', 'Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 3 3100', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 3 Desktop Processors', 'Desktop', 4, 8, '3.6GHz', 'Até3.9GHz', 'Sim', '7nm', 'PCIe 4.0', 'Wraith Stealth', '95°C', 'Exige cartão gráfico discreto'),
('AMD Ryzen™ 5 4600G', 'AMD Ryzen™ Processors', 'AMD Ryzen™ 5 4000 G-Series Desktop Processors with Radeon™ Graphics', 'Desktop', 6, 12, '3.7GHz', 'Até4.2GHz', 'Sim', '7nm', 'PCIe 3.0', 'Wraith Stealth', '95°C', 'Radeon™  Graphics');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gpu`
--

CREATE TABLE `gpu` (
  `modelo` varchar(512) DEFAULT NULL,
  `familia` varchar(512) DEFAULT NULL,
  `linha` varchar(512) DEFAULT NULL,
  `tipo` varchar(512) DEFAULT NULL,
  `nucleos` int(11) DEFAULT NULL,
  `frequencia_base` varchar(512) DEFAULT NULL,
  `frequencia_boost` varchar(512) DEFAULT NULL,
  `alimentacao` varchar(512) DEFAULT NULL,
  `memoria_maxima` varchar(512) DEFAULT NULL,
  `tipo_memoria` varchar(512) DEFAULT NULL,
  `porta_monitor` varchar(512) DEFAULT NULL,
  `hdmi` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gpu`
--

INSERT INTO `gpu` (`modelo`, `familia`, `linha`, `tipo`, `nucleos`, `frequencia_base`, `frequencia_boost`, `alimentacao`, `memoria_maxima`, `tipo_memoria`, `porta_monitor`, `hdmi`) VALUES
('AMD Radeon™ RX 480', 'Radeon™ 400 Series', 'Radeon™ RX 400 Series', 'Desktop', 36, '1120 MHz', '1266 MHz', '150 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('AMD Radeon™ RX 5300', 'AMD Radeon™ 5300 Series', 'AMD Radeon™ RX 5300 Series', 'Desktop', 22, '2600 MHz', '1645 MHz', '100 W', '3GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 5500', 'AMD Radeon™ 5500 Series', 'AMD Radeon™ RX 5500 Series', 'Desktop', 22, '1845 MHz', '1845 MHz', '150 W', '4GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 5500 XT', 'AMD Radeon™ 5500 Series', 'AMD Radeon™ RX 5500 Series', 'Desktop', 22, '1845 MHz', '1845 MHz', '130 W', '8GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 5600', 'AMD Radeon™ 5600 Series', 'AMD Radeon™ RX 5600 Series', 'Desktop', 32, '1375 MHz', '1560 MHz', '150 W', '6GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 5600 XT', 'AMD Radeon™ 5600 Series', 'AMD Radeon™ RX 5600 Series', 'Desktop', 36, '1375 MHz', '1560 MHz', '150 W', '6GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 5700', 'AMD Radeon™ 5700 Series', 'AMD Radeon™ RX 5700 Series', 'Desktop', 36, '1465 MHz', '1725 MHz', '180 W', '8GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 5700 XT', 'AMD Radeon™ 5700 Series', 'AMD Radeon™ RX 5700 Series', 'Desktop', 40, '1605 MHz', '1905 MHz', '225 W', '8GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 6400', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6400 Series', 'Desktop', 12, '2039 MHz', '2321 MHz', '53 W', '4GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6500 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6500 Series', 'Desktop', 16, '2650 MHz', '2815 MHz', '113 W', '8GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6600', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6600 Series', 'Desktop', 28, '2044 MHz', '2491 MHz', '132 W', '8GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6600 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6600 Series', 'Desktop', 32, '2359 MHz', '2589 MHz', '160 W', '8GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6650 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6600 Series', 'Desktop', 32, '2055 MHz', '2635 MHz', '180 W', '8GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 6700', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6700 Series', 'Desktop', 36, '1941 MHz', '2450 MHz', '175 W', '10GB', 'GDDR6', '1.4a', '4K120Hz/8K60Hz VRR as specified in HDMI 2.1'),
('AMD Radeon™ RX 6700 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6700 Series', 'Desktop', 40, '2321 MHz', '2581 MHz', '230 W', '12GB', 'GDDR6', '1.4a', '4K120Hz/8K60Hz VRR as specified in HDMI 2.1'),
('AMD Radeon™ RX 6750 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6700 Series', 'Desktop', 40, '2150 MHz', '2600 MHz', '250 W', '12GB', 'GDDR6', '1.4a', '4K120Hz/8K60Hz VRR as specified in HDMI 2.1'),
('AMD Radeon™ RX 6800', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6800 Series', 'Desktop', 60, '1815 MHz', '2105 MHz', '250 W', '16GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6800 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6800 Series', 'Desktop', 72, '2015 MHz', '2250 MHz', '300 W', '16GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6900 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6900 Series', 'Desktop', 80, '2015 MHz', '2250 MHz', '300 W', '16GB', 'GDDR6', '1.4a', 'HDMI™ 2.1 VRR and FRL'),
('AMD Radeon™ RX 6950 XT', 'AMD Radeon™ RX 6000 Series', 'AMD Radeon™ RX 6900 Series', 'Desktop', 80, '1890 MHz', '2310 MHz', '335 W', '16GB', 'GDDR6', '1.4a', '4K60 Support'),
('AMD Radeon™ RX 7600', 'AMD Radeon™ RX 7000 Series', 'AMD Radeon™ RX 7600 Series', 'Desktop', 32, '2250 MHz', '2655 MHz', '165 W', '8GB', 'GDDR6', 'Up to 2.1', '2.1'),
('Radeon™ RX 460', 'Radeon™ 400 Series', 'Radeon™ RX 400 Series', 'Desktop', 14, '1090 MHz', '1200 MHz', '70 W', '2GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 470', 'Radeon™ 400 Series', 'Radeon™ RX 400 Series', 'Desktop', 32, '926 MHz', '1206 MHz', '120 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 540X', 'Radeon™ 500 Series', 'Radeon™ RX 500X Series', 'Desktop ', 8, '1219 MHz', '1219 MHz', '50 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 550', 'Radeon™ 500 Series', 'Radeon™ RX 500 Series', 'Desktop', 0, '1071 MHz', '1183 MHz', '50 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 550X', 'Radeon™ 500 Series', 'Radeon™ RX 500X Series', 'Desktop ', 8, '1100MHz', '1287 MHz', '50 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 560', 'Radeon™ 500 Series', 'Radeon™ RX 500 Series', 'Desktop', 14, '1175 MHz', '1275 MHz', '60-80 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 560X', 'Radeon™ 500 Series', 'Radeon™ RX 500X Series', 'Desktop ', 14, '1175 MHz', '1275 MHz', '75 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 570', 'Radeon™ 500 Series', 'Radeon™ RX 500 Series', 'Desktop', 32, '1168 MHz', '1244 MHz', '150 W', '8GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 570X', 'Radeon™ 500 Series', 'Radeon™ RX 500X Series', 'Desktop ', 32, '1168 MHz', '1244 MHz', '150 W', '8GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 580', 'Radeon™ 500 Series', 'Radeon™ RX 500 Series', 'Desktop', 36, '1257 MHz', '1340 MHz', '185 W', '8GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 580X', 'Radeon™ 500 Series', 'Radeon™ RX 500X Series', 'Desktop ', 36, '1257 MHz', '1340 MHz', '185 W', '8GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 590', 'Radeon™ 500 Series', 'Radeon™ RX 500 Series', 'Desktop', 36, '1469 MHz', '1545 MHz', '175 W', '8GB', 'GDDR5', '1.4 HDR', '4K60 Support'),
('Radeon™ RX 640', 'Radeon™ 600 Series', 'Radeon™ 600 Series', 'Desktop ', 8, '1082 MHz', '1287 MHz', '50 W', '4GB', 'GDDR5', '1.4 HDR', '4K60 Support');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
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
  `video_integrado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_anuncio`, `id_vendedor`, `altura`, `barramento_encaixe_armazenamento`, `barramento_encaixe_video`, `barramentos_ram`, `barramentos_video`, `comprimento`, `condicao`, `consumo_energia`, `ean`, `fabricante`, `fab_comp`, `fator_forma`, `formato_gabinete`, `frequencia`, `largura`, `linha`, `litografia`, `modelo`, `max_ram`, `nucleos`, `potencia`, `quantidade_armazenamento`, `quantidade_pentes`, `ram_pente_individual`, `ram_placa_video`, `ram_total`, `resfriamento`, `soquete`, `selo_80_plus`, `suporta_sata`, `suporta_nvme`, `tempo_uso`, `threads`, `tipo_armazenamento`, `tipo_ram`, `video_integrado`) VALUES
(1, 1, 1, NULL, NULL, 'x16', NULL, NULL, NULL, 'novo', NULL, '1111111111111', 'Nvidia', NULL, NULL, NULL, 1800, NULL, NULL, NULL, 'RTX 3090', NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
(3, 2, 1, NULL, NULL, NULL, 4, 'x16', NULL, 'novo', NULL, '1111111111111', 'ASUS', 'intel', 'atx', NULL, 3666, NULL, NULL, NULL, 'ROG STRIX Z490-A GAMING', 256, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LGA1200', NULL, 1, 1, '0', NULL, NULL, 'DDR4', NULL),
(4, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'novo', NULL, '1111111111112', 'Intel', NULL, NULL, NULL, 3800, NULL, 'i7', NULL, 'Core i7-10700K', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LGA1200', NULL, NULL, NULL, '0', NULL, NULL, NULL, 0),
(5, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'novo', NULL, '2222222222222', 'HyperX', NULL, NULL, NULL, 3666, NULL, NULL, NULL, 'Fury', NULL, NULL, NULL, NULL, 1, 16, NULL, 16, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 'DDR4', NULL),
(6, 5, 1, NULL, 'sata', NULL, NULL, NULL, NULL, 'novo', NULL, '3333333333333', 'Seagate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Barracuda', NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'SSD', NULL, NULL),
(7, 6, 1, 410, NULL, NULL, NULL, NULL, 330, 'novo', NULL, '9999999999999', 'TGT', NULL, 'atx', 'mid', NULL, 180, NULL, NULL, 'Erion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
(8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'novo', NULL, '7777777777777', 'Corsair', NULL, 'atx', NULL, NULL, NULL, NULL, NULL, 'CV550', NULL, NULL, 550, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bronze', NULL, NULL, '0', NULL, NULL, NULL, NULL),
(9, 8, 1, 6, NULL, NULL, NULL, NULL, 120, 'novo', NULL, '8888888888888', 'DeepCool', NULL, NULL, NULL, NULL, 300, NULL, NULL, 'LE520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'liquid', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
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
  `referencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cpf`, `cnpj`, `data_nasc`, `celular`, `email`, `senha`, `nome`, `razao_social`, `tributo`, `nome_fantasia`, `telefone_empresa`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `referencia`) VALUES
(1, '48425476852', NULL, '2006-01-05', '(11 11111-1', 'filippettoleonardo@gmail.com', '$2y$12$zgwPTCrYSsxV5anaiKfKaeRc0yCDJw7.Dcshkt/pncHC67BXFHJcG', 'Leonardo Filippetto', NULL, NULL, NULL, NULL, '11111111', 'rua dos aimorés', '480', 'Apto. P13', 'Vila Costa e Silva', 'Campinas', 'ao lado do mercado Dia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_vendas` int(11) NOT NULL,
  `id_comprador` int(11) DEFAULT NULL,
  `ids_anuncios` text DEFAULT NULL,
  `qunatidades` text DEFAULT NULL,
  `preco_total` decimal(9,2) DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  `transportadora` varchar(40) DEFAULT NULL,
  `valor_frete` decimal(9,2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_vendas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_vendas` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
