-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2021 às 15:44
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `firma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `css`
--

CREATE TABLE `css` (
  `id` int(11) NOT NULL,
  `cod_css` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `css`
--

INSERT INTO `css` (`id`, `cod_css`) VALUES
(1, '_css/painel.css');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo` int(11) NOT NULL,
  `codigo_produto` decimal(50,0) DEFAULT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `ultima_entrada` date DEFAULT NULL,
  `ultima_saida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `codigo_produto`, `nome_produto`, `preco`, `quantidade`, `ultima_entrada`, `ultima_saida`) VALUES
(123, '78923454', 'Placa Mãe', '135.80', 40, '2021-05-24', '2021-05-24'),
(125, '7891350034622', 'Fonte ATX 500 Wats', '280.00', 22, '2021-05-20', '2021-05-23'),
(126, '7896058257663', 'Cooler Zalma', '119.00', 16, '2021-05-20', '2021-05-23'),
(131, '4719331308216', 'Placa de vídeo ati radeon 1Gb', '230.00', 11, '2021-05-21', '2021-05-21'),
(132, '7895315013127', 'HD SSD 1TB', '380.00', 21, '2021-05-21', '2021-05-23'),
(133, '4005900398598', 'Gabinete Preto', '160.00', 12, '2021-05-21', '2021-05-23'),
(136, '10822829', 'Teclado gamer', '116.50', 20, '2021-05-24', '2021-05-23'),
(137, '2072227', 'Mouse wirwless', '78.00', 35, '2021-05-24', '2021-05-24'),
(138, '7891010099473', 'Caixa de som com sub', '186.00', 7, '2021-05-21', '2021-05-21'),
(139, '226249504745', 'Caixinha bluetoth 50 watts', '48.00', 14, '2021-05-21', '2021-05-23'),
(140, '7897256243717', 'Pendrive 16Gb', '48.00', 25, '2021-05-21', '2021-05-23'),
(141, '7898543383574', 'Roteador Wi-Fi', '260.00', 14, '2021-05-21', '2021-05-23'),
(142, '7898005717466', 'Impressora jato de tinta', '450.00', 5, '2021-05-21', '2021-05-21'),
(143, '18101978', 'Notebook I5 8Gb', '2635.00', 10, '2021-05-23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `total_geral`
--

CREATE TABLE `total_geral` (
  `id` int(11) NOT NULL,
  `cod_produto` decimal(50,0) DEFAULT NULL,
  `tl_vendas` decimal(10,2) DEFAULT NULL,
  `dt_venda` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `total_geral`
--

INSERT INTO `total_geral` (`id`, `cod_produto`, `tl_vendas`, `dt_venda`) VALUES
(30, '78923454', '271.60', '2021-05-01'),
(31, '78923454', '135.80', '2021-05-01'),
(32, '7898005717466', '450.00', '2021-05-01'),
(33, '2072227', '74.99', '2021-05-03'),
(34, '10822829', '116.50', '2021-05-03'),
(35, '4719331308216', '230.00', '2021-05-04'),
(36, '7895315013127', '760.00', '2021-05-04'),
(37, '7891010099473', '372.00', '2021-05-04'),
(38, '7898543383574', '260.00', '2021-05-04'),
(39, '78923454', '271.60', '2021-05-05'),
(40, '7891350034622', '280.00', '2021-05-05'),
(41, '7896058257663', '119.00', '2021-05-05'),
(42, '7895315013127', '380.00', '2021-05-05'),
(43, '4005900398598', '160.00', '2021-05-06'),
(44, '226249504745', '48.00', '2021-05-06'),
(45, '7897256243717', '96.00', '2021-05-07'),
(46, '7898543383574', '260.00', '2021-05-07'),
(47, '7897256243717', '96.00', '2021-05-08'),
(48, '7897256243717', '48.00', '2021-05-10'),
(49, '2072227', '74.99', '2021-05-11'),
(50, '10822829', '116.50', '2021-05-12'),
(51, '7896058257663', '119.00', '2021-05-13'),
(52, '78923454', '135.80', '2021-05-14'),
(53, '4005900398598', '160.00', '2021-05-15'),
(54, '7895315013127', '380.00', '2021-05-17'),
(55, '7896058257663', '238.00', '2021-05-23'),
(56, '78923454', '-271.60', '2021-05-23'),
(57, '2072227', '-74.99', '2021-05-23'),
(58, '2072227', '74.99', '2021-05-23'),
(59, '78923454', '135.80', '2021-05-24'),
(60, '2072227', '74.99', '2021-05-24'),
(61, '2072227', '149.98', '2021-05-24'),
(62, '321321321', '1800.00', '2021-05-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(40) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `administrador` char(3) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `sobrenome`, `telefone`, `email`, `senha`, `administrador`, `data_cadastro`) VALUES
(6, 'Anderson', 'Fernandes', '11969348949', 'andersantfer@gmail.com', '3c308f281eaef6d3dc30d2148a830332', 'sim', '2021-05-13'),
(7, 'Jeremias', 'Santos', '1237567765', 'jeremias@loko.com.br', 'e10adc3949ba59abbe56e057f20f883e', 'nao', '2021-05-17'),
(8, 'Amanda ', 'Vasques', '11969348949', 'amvask@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nao', '2021-05-20'),
(9, 'Mariana', 'Ximenes', '789654123', 'mariana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nao', '2021-05-21'),
(10, 'Samanta', 'Samara', '987987987', 'sam@ta.com', 'e10adc3949ba59abbe56e057f20f883e', 'nao', '2021-05-21'),
(11, 'Ermenegildo', 'Batistela', '987654321', 'ermenegildo@git.com', 'e10adc3949ba59abbe56e057f20f883e', 'nao', '2021-05-21'),
(14, 'Rafaela ', 'Garcia', '96767565645', 'rafa@garcia.com', 'e10adc3949ba59abbe56e057f20f883e', 'sim', '2021-05-23'),
(15, 'administrador', 'administrador', '123456789', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'sim', '2021-05-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `codigo_produto` decimal(50,0) NOT NULL,
  `quantidade_saida` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `codigo_produto`, `quantidade_saida`, `data_venda`, `usuario`) VALUES
(78, '78923454', 2, '2021-05-01', 'Anderson'),
(79, '78923454', 1, '2021-05-01', 'Anderson'),
(80, '7898005717466', 1, '2021-05-01', 'Anderson'),
(81, '2072227', 1, '2021-05-03', 'Ermenegildo'),
(82, '10822829', 1, '2021-05-03', 'Amanda'),
(83, '4719331308216', 1, '2021-05-04', 'Amanda'),
(84, '7895315013127', 2, '2021-05-04', 'Amanda'),
(85, '7891010099473', 2, '2021-05-04', 'Samanta'),
(86, '7898543383574', 1, '2021-05-04', 'Samanta'),
(87, '78923454', 2, '2021-05-05', 'Samanta'),
(88, '7891350034622', 1, '2021-05-05', 'Samanta'),
(89, '7896058257663', 1, '2021-05-05', 'Samanta'),
(90, '7895315013127', 1, '2021-05-05', 'Samanta'),
(91, '4005900398598', 1, '2021-05-06', 'Mariana'),
(92, '226249504745', 1, '2021-05-06', 'Mariana'),
(93, '7897256243717', 2, '2021-05-07', 'Mariana'),
(94, '7898543383574', 1, '2021-05-07', 'Jeremias'),
(95, '7897256243717', 2, '2021-05-08', 'Jeremias'),
(96, '7897256243717', 1, '2021-05-10', 'Anderson'),
(97, '2072227', 1, '2021-05-11', 'Anderson'),
(98, '10822829', 1, '2021-05-12', 'Anderson'),
(99, '7896058257663', 1, '2021-05-13', 'Anderson'),
(100, '78923454', 1, '2021-05-14', 'Rafaela'),
(101, '4005900398598', 1, '2021-05-15', 'Rafaela'),
(102, '7895315013127', 1, '2021-05-17', 'Rafaela'),
(103, '7896058257663', 2, '2021-05-23', 'Rafaela'),
(104, '78923454', -2, '2021-05-23', 'Samanta'),
(105, '2072227', -1, '2021-05-23', 'Samanta'),
(106, '2072227', 1, '2021-05-23', 'Samanta'),
(107, '78923454', 1, '2021-05-24', 'Anderson'),
(108, '2072227', 1, '2021-05-24', 'Anderson'),
(109, '2072227', 2, '2021-05-24', 'Anderson'),
(110, '321321321', 1, '2021-05-24', 'Anderson');

--
-- Acionadores `vendas`
--
DELIMITER $$
CREATE TRIGGER `tr_saida_produtos` AFTER INSERT ON `vendas` FOR EACH ROW begin
	update produtos
    set produtos.quantidade  = produtos.quantidade - new.quantidade_saida
    where codigo_produto = new.codigo_produto;
    
    update produtos
    set produtos.ultima_saida = current_date()
    where codigo_produto = new.codigo_produto;
end
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `css`
--
ALTER TABLE `css`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nome_produto` (`nome_produto`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `total_geral`
--
ALTER TABLE `total_geral`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `css`
--
ALTER TABLE `css`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de tabela `total_geral`
--
ALTER TABLE `total_geral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
