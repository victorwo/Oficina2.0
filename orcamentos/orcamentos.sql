-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jan-2023 às 04:15
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `orcamentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id` int(20) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `nome_vendedor` varchar(50) NOT NULL,
  `valor` double NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(450, 'Vanessa', 'Carlos', 850, 'Farol automotivo', '2023-01-28', '18:50:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(781, 'Vanessa', 'Renato', 1250, 'Pneu', '2023-01-23', '14:50:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(850, 'Matheus', 'Carlos', 875, 'Roda de liga leve', '2023-01-16', '17:22:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(984, 'Ricardo', 'Renato', 1250, 'Pneu', '2023-01-16', '09:32:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(011, 'Matheus', 'Carlos', 65000, 'Palio 2019', '2023-01-14', '13:13:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(1, 'Vanessa', 'Carlos', 850, 'Farol automotivo', '2023-01-28', '18:50:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(2, 'Vanessa', 'Renato', 1250, 'Pneu', '2023-01-23', '14:50:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(3, 'Matheus', 'Carlos', 875, 'Roda de liga leve', '2023-01-16', '17:22:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(4, 'Ricardo', 'Renato', 1250, 'Pneu', '2023-01-16', '09:32:00');
INSERT INTO `orcamento` (`id`, `nome_cliente`, `nome_vendedor`, `valor`, `descricao`, `data`, `horario`) VALUES
(5, 'Matheus', 'Carlos', 65000, 'Palio 2019', '2023-01-14', '13:13:00');


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
