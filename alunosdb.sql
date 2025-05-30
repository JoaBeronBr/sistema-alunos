-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Maio-2025 às 00:20
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alunosdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `endereco`, `email`) VALUES
(16, 'Rayane', 'rua cajazeiras 256', 'rayane@outlook.com'),
(15, 'Nadson', 'Santa teresa damazio', 'Nadsonfranca87@gmail.com'),
(23, 'luiz', 's..t. chico manoel', 'luiz@aluno.ce.gov.br'),
(8, 'Julia', 'santa teresa do zé lima', 'julia@gmail.com'),
(14, 'joab', 'Boa Vista', 'julia@gmail.com'),
(17, 'FRANCISCA RAYANE MARTINS MESQUITA', 'Luiz Teodoro', 'joabmartins11@gmail.com'),
(19, 'Heitor Martins', 'SEI LÁ', 'Heitor.Martins@gmail.com'),
(18, 'João Arthur', 'Messejana', 'joao.arthur@gmail.com'),
(21, 'Beron Martins Mesquita', 'Santa Tereza do Alipe', 'joabmartins11@gmail.com'),
(22, 'Andressa Maria', 'rua projetada', 'andressa@gmail.com'),
(24, 'Sebastião Braga de Mesquita', 'santa teresa do zé lima', 'sebastiao@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
