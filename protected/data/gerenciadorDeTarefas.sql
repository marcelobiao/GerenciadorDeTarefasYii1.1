-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10/09/2018 às 12:40
-- Versão do servidor: 5.7.23-0ubuntu0.18.04.1
-- Versão do PHP: 5.6.37-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciadorDeTarefas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `idTipoTarefa` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dataConclusao` timestamp NULL DEFAULT NULL,
  `dataCriacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dataModificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `titulo`, `idUsuario`, `privado`, `descricao`, `idTipoTarefa`, `status`, `dataConclusao`, `dataCriacao`, `dataModificacao`) VALUES
(4, 'Biologia atividade', 27, 0, 'pág 15 e 16', 25, 0, NULL, '2018-09-10 11:53:39', '2018-09-10 11:54:38'),
(5, 'Matematica atividade', 27, 0, 'página 20 e 21.', 25, 0, NULL, '2018-09-10 11:54:31', '2018-09-10 11:54:31'),
(6, 'tarefa secreta', 27, 1, 'segredo', 24, 0, NULL, '2018-09-10 11:55:16', '2018-09-10 11:55:16'),
(7, 'tarefa finalizada', 27, 0, 'para finalizar', 24, 1, '2018-09-10 11:57:27', '2018-09-10 11:55:39', '2018-09-10 11:57:27'),
(8, 'outro secreta', 28, 1, 'segredo', 26, 0, NULL, '2018-09-10 11:57:19', '2018-09-10 11:57:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoTarefa`
--

CREATE TABLE `tipoTarefa` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `dataCriacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dataModificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipoTarefa`
--

INSERT INTO `tipoTarefa` (`id`, `nome`, `dataCriacao`, `dataModificacao`) VALUES
(24, 'Trabalho', '2018-09-10 11:52:29', '2018-09-10 11:52:29'),
(25, 'Estudo', '2018-09-10 11:52:36', '2018-09-10 11:52:36'),
(26, 'Outros', '2018-09-10 11:52:43', '2018-09-10 11:52:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `dataCriacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dataModificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sexo`, `dataNascimento`, `email`, `telefone`, `login`, `senha`, `dataCriacao`, `dataModificacao`) VALUES
(13, 'admin', 'Masculino', '2018-09-06', 'admin@gmail.com', '(88) 8888-8888', 'admin', 'admin', '2018-09-04 14:03:10', '2018-09-05 11:20:40'),
(27, 'Marcelo biao', 'Masculino', '1994-01-09', 'marcelo@gmail.com', '(75) 99199-5287', 'marcelobiao', 'rootroot', '2018-09-10 11:50:31', '2018-09-10 11:50:31'),
(28, 'outrooutro', 'Masculino', '2018-09-01', 'outro@gmail.com', '(32) 22222-2222', 'outro', 'rootroot', '2018-09-10 11:56:31', '2018-09-10 11:56:31'),
(29, 'testeDatas', 'Outros', '2018-09-05', 'teste@gmail.com', '(75) 99199-5287', 'demo', 'demowwwww', '2018-09-10 12:07:02', '2018-09-10 12:07:02'),
(30, 'Tayane Cerqueira', 'Feminino', '1989-12-09', 'engcomp.tayane@gmail.com', '(75) 99231-1128', 'tayane', 'abc12345', '2018-09-10 12:10:00', '2018-09-10 12:10:00');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTipoTarefa` (`idTipoTarefa`);

--
-- Índices de tabela `tipoTarefa`
--
ALTER TABLE `tipoTarefa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `tipoTarefa`
--
ALTER TABLE `tipoTarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `idTipoTarefa` FOREIGN KEY (`idTipoTarefa`) REFERENCES `tipoTarefa` (`id`),
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
