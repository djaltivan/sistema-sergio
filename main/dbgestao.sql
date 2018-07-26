-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Abr-2015 às 19:45
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `dbgestao`
--
CREATE DATABASE IF NOT EXISTS `dbgestao` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbgestao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `data_nasc` varchar(60) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(60) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cep` varchar(60) NOT NULL,
  `fixo1` varchar(100) NOT NULL,
  `fixo2` varchar(100) NOT NULL,
  `comercial` varchar(100) NOT NULL,
  `oi` varchar(100) NOT NULL,
  `tim` varchar(100) NOT NULL,
  `vivo` varchar(100) NOT NULL,
  `claro` varchar(100) NOT NULL,
  `nextel` varchar(100) NOT NULL,
  `nextelid` varchar(100) NOT NULL,
  `dia` varchar(15) NOT NULL,
  `mes` varchar(15) NOT NULL,
  `ano` varchar(15) NOT NULL,
  `g1` int(5) NOT NULL,
  `g2` int(5) NOT NULL,
  `g3` varchar(10) NOT NULL,
  `g4` varchar(10) NOT NULL,
  `g5` varchar(10) NOT NULL,
  `g6` varchar(10) NOT NULL,
  `g7` varchar(10) NOT NULL,
  `g8` varchar(10) NOT NULL,
  `g9` varchar(10) NOT NULL,
  `g10` varchar(10) NOT NULL,
  `g11` varchar(10) NOT NULL,
  `g12` varchar(10) NOT NULL,
  `g13` varchar(10) NOT NULL,
  `g14` varchar(10) NOT NULL,
  `g15` varchar(10) NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nome`, `email`, `descricao`, `foto`, `data_nasc`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `fixo1`, `fixo2`, `comercial`, `oi`, `tim`, `vivo`, `claro`, `nextel`, `nextelid`, `dia`, `mes`, `ano`, `g1`, `g2`, `g3`, `g4`, `g5`, `g6`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g13`, `g14`, `g15`) VALUES
(79, 'Altieres Félix da Silva', 'altieresfelix@yahoo.com', 'Irmão', 'd0f228498126cbf982a59546af2ad095.JPG', '30/11/1981', 'Rua Epitacio Pessoa', '36', 'casa 1', 'parque sete de setembro', 'Diadema', 'São Paulo', '09910-115', '11 4055-2721', '11 4055-2721', '11 4055-2721', '11 99999-9999', '11 99999-9999', '11 99999-9999', '11 99999-9999', '11 99999-9999', '11 99999-9999', '30', 'novembro', '1981', 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 'altivan felix da silva', 'djaltivan@yahoo.com.br', 'descrição teste', '770a9d1554306c3ef76c10a597a05e65.JPG', '', 'Rua Epitacio Pessoa', '36', '', 'parque sete de setembro', 'Diadema', 'São Paulo', '09910-115', '11 4055-2721', '11 4055-2721', '', '11 99999-9999', '11 99999-9999', '11 99999-9999', '11 99999-9999', '11 99999-9999', '11 99999-9999', '18', 'junho', '1989', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `login`, `senha`) VALUES
(0000000006, 'arlene', 'c4ca4238a0b923820dcc509a6f75849b'),
(0000000007, 'felix', '202cb962ac59075b964b07152d234b70'),
(0000000008, 'altivan', '202cb962ac59075b964b07152d234b70'),
(0000000009, 'admin', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
