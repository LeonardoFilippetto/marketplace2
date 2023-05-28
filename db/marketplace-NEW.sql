-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Mar-2023 às 15:56
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
  `categoria_produto` varchar(45) DEFAULT NULL,
  `preco` decimal(9,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `img_princ` varchar(50) DEFAULT NULL,
  `imgs_sec` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazenamento`
--

CREATE TABLE `armazenamento` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `fator_de_forma` varchar(20) DEFAULT NULL,
  `tamanho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `coolers`
--

CREATE TABLE `coolers` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `ian` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `liquid_cooler` tinyint(4) DEFAULT NULL,
  `rpm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fontes`
--

CREATE TABLE `fontes` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `selo` varchar(30) DEFAULT NULL,
  `potencia` int(11) DEFAULT NULL,
  `fator_de_froma` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gabinetes`
--

CREATE TABLE `gabinetes` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `ian` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `fator_de_forma` varchar(20) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `conprimento` int(11) DEFAULT NULL,
  `largura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `memoria_ram`
--

CREATE TABLE `memoria_ram` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `tamanho` int(11) DEFAULT NULL,
  `quantidade_pentes` int(11) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `tipo_de_memoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `placas_de_video`
--

CREATE TABLE `placas_de_video` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `Id_anuncio` int(11) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `tamanho` int(11) DEFAULT NULL,
  `quantidade_pentes` int(11) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `tipo_memoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `placas_mae`
--

CREATE TABLE `placas_mae` (
  `id_produto` int(11) NOT NULL,
  `Id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `slots_ram` int(11) DEFAULT NULL,
  `max_espaÃ§o_ram` int(11) DEFAULT NULL,
  `soquete` varchar(25) DEFAULT NULL,
  `slots_pcie_x1` int(11) DEFAULT NULL,
  `slots_pcie_x4` int(11) DEFAULT NULL,
  `slots_pcie_x16` int(11) DEFAULT NULL,
  `slots_m2` int(11) DEFAULT NULL,
  `slots_sata` int(11) DEFAULT NULL,
  `tipo_memoria` varchar(20) DEFAULT NULL,
  `fator_de_forma` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processadores`
--

CREATE TABLE `processadores` (
  `id_produto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `soquete` varchar(25) DEFAULT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `nucelo` int(11) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `video_integrado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Índices para tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  ADD PRIMARY KEY (`id_produto`);

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
-- Índices para tabela `coolers`
--
ALTER TABLE `coolers`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `fontes`
--
ALTER TABLE `fontes`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `gabinetes`
--
ALTER TABLE `gabinetes`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `memoria_ram`
--
ALTER TABLE `memoria_ram`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `placas_de_video`
--
ALTER TABLE `placas_de_video`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `placas_mae`
--
ALTER TABLE `placas_mae`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `processadores`
--
ALTER TABLE `processadores`
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
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `coolers`
--
ALTER TABLE `coolers`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fontes`
--
ALTER TABLE `fontes`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gabinetes`
--
ALTER TABLE `gabinetes`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `memoria_ram`
--
ALTER TABLE `memoria_ram`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `placas_de_video`
--
ALTER TABLE `placas_de_video`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `placas_mae`
--
ALTER TABLE `placas_mae`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `processadores`
--
ALTER TABLE `processadores`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_vendas` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
