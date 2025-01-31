-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2023 às 00:16
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoinfo`
--
CREATE DATABASE IF NOT EXISTS `bancoinfo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bancoinfo`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` int(8) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `logado` varchar(1) NOT NULL,
  `statuss` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nome`, `email`, `senha`, `cep`, `cpf`, `logado`, `statuss`) VALUES
(1, 'cliente1', 'cliente123@gmail.com', '$2y$10$w8WDcYPlEVo6z/C7RbJURO5ZfkAak750wSuJgJO0WckvJJrjGHUWm', 12345678, '12345678910', 'S', 'ativo'),
(2, 'Pedro Bueno', 'pedrobueno@gmail.com', '$2y$10$7T8WB7qt0Lzag1IPpdCqgOtyM/.AFgYHUKULH1iS9xTVIGqynuA0e', 2147483647, '39820004837', 'S', 'ativo'),
(3, 'Gustavo Costa', 'gustavocosta@gmail.com', '$2y$10$OLeP1isdVmrVA3VMmerybeftcOer8DxgPg.8x/mDnj9eMZ7.Bm1fO', 2147483647, '64647836453', 'S', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `idproduto` int(3) NOT NULL,
  `preco` int(6) NOT NULL,
  `qtd_estoque` int(5) NOT NULL,
  `tamanho` int(3) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idproduto`, `preco`, `qtd_estoque`, `tamanho`, `descricao`, `imagem`, `categoria`) VALUES
(1, 180, 200, 15, 'Gawr Gura', 'gura_figure.png', 'Vtubers'),
(27, 150, 150, 12, 'Gojo Satoru', 'gojo_jujutsu_kaisen.png', 'Jujutsu Kaisen'),
(64, 150, 83, 20, 'Majin Buu', 'majin_buu_figure.png', 'Dragon Ball'),
(125, 180, 100, 23, 'Hatsune Miko Chibi', 'hatsune_chibi.png', 'Vocaloids'),
(130, 200, 50, 20, 'Hatsune Miko', 'hatsune_figure.png', 'Vocaloids'),
(234, 260, 43, 35, 'Klee ', 'klee_figure.png', 'Genshin'),
(274, 230, 47, 10, 'Anya Forger', 'anya_figure.jpg', 'Spy X Family'),
(358, 190, 48, 22, 'Bakugou', 'bakugou_figure.png', 'Boku No Hero Academy'),
(400, 170, 160, 15, 'Gengar Halloween', 'gengar_figure.png', 'Pokémon'),
(475, 145, 39, 20, 'Eren Yeager', 'eren_figure.png', 'Attack On Titan'),
(555, 250, 108, 25, 'Levi Ackerman', 'levi_figure.png', 'Attack On Titan'),
(666, 155, 120, 12, 'Sukuna', 'sukuna_jujutsu_kaisen.png', 'Jujutsu Kaisen'),
(777, 210, 104, 23, 'Deku', 'deku_figure.png', 'Boku No Hero Academy'),
(785, 200, 150, 13, 'Pokémons Iniciais', 'iniciais_figure.png', 'Pokémon'),
(893, 150, 76, 15, 'Son Goku', 'goku_figure.png', 'Dragon Ball'),
(910, 499, 96, 30, 'Ningguang', 'ningguang_figure.png', 'Genshin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE `registros` (
  `idregistro` int(3) NOT NULL,
  `idprod` int(5) NOT NULL,
  `qtd_compra` int(11) NOT NULL,
  `data_ped` date NOT NULL,
  `idcli` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `registros`
--

INSERT INTO `registros` (`idregistro`, `idprod`, `qtd_compra`, `data_ped`, `idcli`, `cpf`) VALUES
(353, 358, 2, '2023-11-12', 2, '39820004837'),
(354, 666, 4, '2023-11-12', 2, '39820004837'),
(355, 910, 1, '2023-11-12', 2, '39820004837'),
(356, 27, 1, '2023-11-12', 3, '64647836453'),
(357, 666, 3, '2023-11-12', 3, '64647836453'),
(358, 475, 2, '2023-11-13', 3, '64647836453'),
(359, 130, 1, '2023-11-13', 3, '64647836453'),
(360, 125, 2, '2023-11-13', 3, '64647836453'),
(361, 893, 1, '2023-11-13', 2, '39820004837'),
(362, 274, 2, '2023-11-13', 2, '39820004837'),
(363, 27, 1, '2023-11-13', 2, '39820004837');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idproduto`);

--
-- Índices de tabela `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`idregistro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `idregistro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
