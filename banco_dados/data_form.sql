-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Set-2018 às 21:29
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `llldc21_data_form`
--
CREATE DATABASE IF NOT EXISTS `llldc21_data_form` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `llldc21_data_form`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE IF NOT EXISTS `tb_categoria` (
  `CD_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `NM_CATEGORIA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `CD_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NM_USUARIO` varchar(100) NOT NULL,
  `DS_EMAIL` varchar(45) NOT NULL,
  `DT_NASCIMENTO` date NOT NULL,
  `DS_SENHA` varchar(45) NOT NULL,
  `DS_EMAIL_RECUPERACAO` varchar(45) NOT NULL,
  PRIMARY KEY (`CD_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`CD_USUARIO`, `NM_USUARIO`, `DS_EMAIL`, `DT_NASCIMENTO`, `DS_SENHA`, `DS_EMAIL_RECUPERACAO`) VALUES
(2147483647, 'Wesllen', 'wesllen@gmail.com', '2000-08-05', 'seguela', 'weslleb2000@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
