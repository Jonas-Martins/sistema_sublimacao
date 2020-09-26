-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Set-2020 às 12:40
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jumirimm_sublimacao`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `atualizar_papel` (IN `id_` INT, IN `marca_` VARCHAR(100), IN `gramatura_` VARCHAR(100), IN `comprimento_` VARCHAR(50), IN `largura_` VARCHAR(50), IN `lote_` VARCHAR(150), IN `preco_` VARCHAR(50), IN `dt_compra_` DATE)  NO SQL
UPDATE `estoque_papel` SET `marca`= marca_,`gramatura`= gramatura_,`comprimento`= comprimento_,`largura`= largura_,`lote`= lote_,`preco`= preco_,`dt_compra`= dt_compra_ WHERE estoque_papel.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `atualizar_pedido` (IN `id_` INT, IN `cliente_` VARCHAR(150), IN `vendedor_` VARCHAR(150), IN `cidade_` VARCHAR(100), IN `dt_prevista` DATE, IN `status_` VARCHAR(50), IN `dt_conclusao_` DATE)  NO SQL
UPDATE `pedido` SET `cliente`= cliente_,`vendedor`= vendedor_,`cidade`= cidade_,`dt_prevista`= dt_prevista,`status`= status_,`dt_conclusao`= dt_conclusao_ WHERE `id`= id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `atualizar_pedido_artigo` (IN `id_` INT, IN `fk_pedido_` INT, IN `fk_funcionario_` VARCHAR(15), IN `id_malha_` INT, IN `id_estampa_` INT, IN `maquina_funcionario_` VARCHAR(150), IN `unidade_` VARCHAR(50), IN `peso_` FLOAT, IN `largura_` FLOAT, IN `gramatura_` FLOAT, IN `comprimento_` FLOAT, IN `impresso_` FLOAT, IN `status_` VARCHAR(50), IN `dt_conclusao_` DATE)  NO SQL
UPDATE `pedido_artigo` SET `fk_funcionario`= fk_funcionario_, `id_malha`= id_malha_, `id_estampa`= id_estampa_, `maquina_funcionario`= maquina_funcionario_, `unidade` = unidade_,`peso`= peso_, `largura`= largura_,`gramatura`= gramatura_, `comprimento`= comprimento_, `impresso`= impresso_,`status`= status_,`dt_conclusao`= dt_conclusao_ WHERE pedido_artigo.fk_pedido = fk_pedido_ and pedido_artigo.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_estampa` (IN `_id` INT, IN `_nome` VARCHAR(100), IN `_variante` VARCHAR(50))  NO SQL
INSERT INTO `estampa` (`id`, `nome`, `variante`) VALUES (	
_id, _nome, _variante)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_estoque_papel` (IN `marca` VARCHAR(100), IN `gramatura` VARCHAR(100), IN `comprimento` VARCHAR(50), IN `largura` VARCHAR(50), IN `lote` VARCHAR(150), IN `preco` VARCHAR(50), IN `dt_compra` DATE)  NO SQL
INSERT INTO `estoque_papel` (`id`, `marca`, `gramatura`, `comprimento`, `largura`, `lote`, `preco`, `dt_compra`) VALUES (NULL, marca, gramatura, comprimento, largura, lote, preco, dt_compra)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_estoque_tinta` (IN `marca` VARCHAR(100), IN `cor` VARCHAR(100), IN `preco` VARCHAR(50), IN `tipo` VARCHAR(50), IN `dt_compra` DATE)  NO SQL
INSERT INTO `estoque_tinta` (`id`, `marca`, `cor`, `preco`, `tipo`, `dt_compra`) VALUES (NULL, marca, cor, preco, tipo, dt_compra)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_funcionario` (IN `cpf` VARCHAR(15), IN `nome` VARCHAR(100), IN `sobrenome` VARCHAR(150), IN `senha` VARCHAR(500), IN `aniversario` DATE, IN `sexo` VARCHAR(15), IN `telefone` VARCHAR(15), IN `email` VARCHAR(100), IN `nivel` INT)  NO SQL
INSERT INTO `funcionario` (`cpf`, `nome`, `sobrenome`, `senha`, `data_aniversario`, `sexo`, `telefone`, `email`, `nivel`) VALUES (cpf, 	
nome, sobrenome, senha, aniversario, sexo, telefone, email, nivel)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_malha` (IN `_id` INT, IN `_nome` VARCHAR(100))  NO SQL
INSERT INTO `malha` (`id`, `nome`) VALUES (_id, _nome)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_pedido` (IN `id_` VARCHAR(100), IN `cliente_` VARCHAR(150), IN `vendedor_` VARCHAR(150), IN `cidade_` VARCHAR(100), IN `dt_emissao_` DATE, IN `dt_prevista_` DATE, IN `status_` VARCHAR(50), IN `dt_conclusao_` DATE)  NO SQL
INSERT INTO `pedido` (`id`, `cliente`, `vendedor`, `cidade`, `dt_emissao`, `dt_prevista`, `status`, `dt_conclusao`) VALUES (id_, cliente_, vendedor_, cidade_, dt_emissao_, dt_prevista_, status_, dt_conclusao_)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_pedido_artigo` (IN `fk_pedido_` VARCHAR(100), IN `fk_funcionario_` VARCHAR(15), IN `id_malha_` INT, IN `id_estampa_` INT, IN `maquina_` VARCHAR(150), IN `unidade_` VARCHAR(50), IN `peso_` FLOAT, IN `largura_` FLOAT, IN `gramatura_` FLOAT, IN `comprimento_` FLOAT, IN `impresso_` FLOAT, IN `status_` VARCHAR(50), IN `dt_conclusao_` DATE)  NO SQL
INSERT INTO `pedido_artigo` (`id`, `fk_pedido`, `fk_funcionario`, `id_malha`, `id_estampa`, `maquina_funcionario`,`unidade`, `peso`, `largura`, `gramatura`,  `comprimento`, `impresso`, `status`, `dt_conclusao`) VALUES (NULL, fk_pedido_, fk_funcionario_, id_malha_, id_estampa_, maquina_, unidade_, peso_, largura_, gramatura_, comprimento_, impresso_, status_, dt_conclusao_)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_estampa_all` ()  NO SQL
SELECT * FROM estampa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_estampa_id` (IN `id_` INT)  NO SQL
SELECT * FROM `estampa` WHERE id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_funcionario` (IN `_cpf` VARCHAR(15), IN `_email` VARCHAR(100))  NO SQL
SELECT * FROM `funcionario` WHERE funcionario.cpf = _cpf OR funcionario.email = _email$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_malha_all` ()  NO SQL
SELECT * FROM malha$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_malha_id` (IN `id_` INT)  NO SQL
SELECT * FROM `malha` WHERE id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_papel_all` ()  NO SQL
SELECT * FROM `estoque_papel`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_papel_comprimento` (IN `comprimento_` VARCHAR(50))  NO SQL
SELECT `id`, `marca`, `gramatura`, SUM(`comprimento`) as 'comprimento', `largura`, `lote`, `preco`, `dt_compra`, COUNT(*) as 'quantidade' FROM `estoque_papel` where estoque_papel.comprimento = comprimento_ GROUP BY estoque_papel.comprimento$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_papel_estoque_gramatura` ()  NO SQL
SELECT `marca`, `gramatura`, SUM(`comprimento`) as 'comprimento', `largura`, `lote`, `preco`, `dt_compra`, COUNT(*) as 'quantidade' FROM `estoque_papel` GROUP BY estoque_papel.gramatura$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_papel_estoque_lote` ()  NO SQL
SELECT `marca`, `gramatura`, SUM(`comprimento`) as 'comprimento', `largura`, `lote`, `preco`, `dt_compra`, COUNT(*) as 'quantidade' FROM `estoque_papel` GROUP BY lote$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_papel_gramatura` (IN `gramatura_` VARCHAR(100))  NO SQL
SELECT * FROM `estoque_papel` WHERE gramatura = gramatura_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_pedido_all` ()  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id GROUP BY pedido.id ORDER BY pedido.dt_emissao DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_pedido_artigo_id` (IN `id_` VARCHAR(100))  NO SQL
SELECT pedido_artigo.id as 'id', pedido.id as 'codigo', pedido.cliente as 'cliente', pedido.vendedor as 'vendedor', pedido.cidade as 'cidade',  CONCAT(pedido_artigo.id_malha, ".", pedido_artigo.id_estampa) as 'artigo', malha.nome as 'malha', estampa.nome as 'estampa', estampa.variante as 'variante', funcionario.nome as 'funcionario',pedido_artigo.maquina_funcionario ,pedido_artigo.unidade as 'unidade', pedido_artigo.peso as 'peso', pedido_artigo.largura, pedido_artigo.gramatura, pedido_artigo.comprimento as 'comprimento', pedido_artigo.impresso, pedido_artigo.status, pedido_artigo.dt_conclusao FROM pedido, malha, estampa, funcionario, pedido_artigo WHERE pedido_artigo.id_malha = malha.id and pedido_artigo.id_estampa = estampa.id and pedido_artigo.fk_pedido = pedido.id and pedido_artigo.fk_funcionario = funcionario.cpf and pedido.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_pedido_id` (IN `id_` INT)  NO SQL
SELECT * FROM pedido where pedido.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_tinta_all` ()  NO SQL
SELECT * FROM `estoque_tinta`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_tinta_cor_id` (IN `cor_` VARCHAR(100))  NO SQL
SELECT `id` FROM `estoque_tinta` WHERE cor = cor_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_tinta_estoque` ()  NO SQL
SELECT `id`, `marca`, `cor`, `preco`, `tipo`, COUNT(*) as 'quantidade'  FROM `estoque_tinta` GROUP BY cor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_tinta_estoque_cor` (IN `cor_` VARCHAR(100))  NO SQL
SELECT `id`, `marca`, `cor`, `preco`, `tipo`, COUNT(*) as 'quantidade' FROM `estoque_tinta` WHERE cor = cor_ GROUP BY cor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_estampa` (IN `id_` INT)  NO SQL
DELETE FROM `estampa` WHERE estampa.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_malha` (IN `id_` INT)  NO SQL
DELETE FROM `malha` WHERE malha.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_papel_comprimento` ()  NO SQL
DELETE FROM `estoque_papel` WHERE estoque_papel.comprimento <= 0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_papel_id` (IN `id_` INT)  NO SQL
DELETE FROM `estoque_papel` WHERE id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_papel_lote_gramatura` (IN `id_` INT, IN `lote_` VARCHAR(150), IN `gramatura_` VARCHAR(100))  NO SQL
DELETE FROM `estoque_papel` WHERE gramatura = gramatura_ and lote = lote_ and id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_pedido_artigo_fk` (IN `fk_pedido_` INT)  NO SQL
DELETE FROM pedido_artigo WHERE pedido_artigo.fk_pedido = fk_pedido_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_pedido_artigo_id` (IN `id_` INT)  NO SQL
DELETE FROM `pedido_artigo` WHERE pedido_artigo.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_pedido_id` (IN `id_` INT)  NO SQL
DELETE FROM `pedido` WHERE pedido.id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletar_tinta_id` (IN `id_` INT)  NO SQL
DELETE FROM `estoque_tinta` WHERE id = id_$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `like_pedido_cliente` (IN `cliente_` VARCHAR(150))  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id and pedido.cliente LIKE CONCAT(cliente_ , '%') or pedido.id LIKE CONCAT(cliente_ , '%') GROUP BY pedido.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_by_cidade` ()  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id GROUP BY pedido.id ORDER BY pedido.cidade ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_by_cliente` ()  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id GROUP BY pedido.id ORDER BY pedido.cliente ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_by_dt_emissao` ()  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id GROUP BY pedido.id ORDER BY pedido.dt_emissao ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_by_id` ()  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id GROUP BY pedido.id ORDER BY pedido.id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_by_vendedor` ()  NO SQL
SELECT pedido.id, pedido.cliente, pedido.vendedor, pedido.cidade, pedido.dt_emissao, pedido.dt_conclusao, pedido.status, COUNT(pedido_artigo.status) as 'pecas', SUM(pedido_artigo.comprimento) as 'comprimento' FROM pedido, pedido_artigo where pedido_artigo.fk_pedido = pedido.id GROUP BY pedido.id ORDER BY pedido.vendedor ASC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estampa`
--

CREATE TABLE `estampa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `variante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estampa`
--

INSERT INTO `estampa` (`id`, `nome`, `variante`) VALUES
(2081, 'JM 0058', 'V-4'),
(2082, 'JM 0058', 'V-2'),
(2083, 'JM 0058', 'V-1'),
(2084, 'JM 0056', 'V-4'),
(2087, 'JM 0055', 'V-4'),
(2092, 'JM 0069', 'V-2'),
(2100, 'JM 0065', 'V-1'),
(2101, 'JM 0062', 'V-2'),
(2116, 'JM 0070', 'V-1'),
(2123, 'JM 0046', 'V-4'),
(2160, 'JM  0046', 'V-2'),
(2260, 'JM 0072', 'V-1'),
(2299, 'JM 0075', 'V-3'),
(2310, 'JM 0076', 'V-5'),
(2311, 'JM 0075', 'V-4'),
(2315, 'JM 0078', 'V-1'),
(2319, 'JM 0076', 'V-1'),
(2323, 'JM 0076', 'V-2'),
(2356, 'JM 0085', 'V-1'),
(2359, 'JM 0085', 'V-4'),
(2361, 'JM 0086', 'V-2'),
(2362, 'JM 0087', 'V-1'),
(2364, 'JM 0087', 'V-3'),
(2366, 'JM 0088', 'V-1'),
(2368, 'JM 0075', 'V-1'),
(2370, 'JM 0077', 'V-1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_papel`
--

CREATE TABLE `estoque_papel` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `gramatura` varchar(100) NOT NULL,
  `comprimento` varchar(50) NOT NULL,
  `largura` varchar(50) NOT NULL,
  `lote` varchar(150) NOT NULL,
  `preco` varchar(50) DEFAULT NULL,
  `dt_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque_papel`
--

INSERT INTO `estoque_papel` (`id`, `marca`, `gramatura`, `comprimento`, `largura`, `lote`, `preco`, `dt_compra`) VALUES
(8, 'DigiPrint', '56', '3.6', '1.6', '0', '0', '2020-08-16'),
(9, 'DigiPrint', '75', '12', '1.6', '0', '0', '2020-08-21'),
(10, 'DigiPrint', '75', '11.75', '1.6', '0', '0', '2020-08-21'),
(11, 'DigiPrint', '75', '16.16', '1.6', '0', '0', '2020-08-21'),
(12, 'DigiPrint', '75', '12', '1.6', '1', '0', '2020-08-21'),
(13, 'DigiPrint', '75', '12', '1.6', '1', '0', '2020-08-21'),
(14, 'DigiPrint', '75', '5.4', '1.6', '1', '0', '2020-08-21'),
(15, 'DigiPrint', '75', '21.4', '1.6', '1', '0', '2020-08-21'),
(16, 'DigiPrint', '75', '5.25', '1.6', '1', '0', '2020-08-21'),
(17, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01'),
(18, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01'),
(19, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01'),
(20, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01'),
(21, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01'),
(22, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01'),
(23, 'DigiPrint', '56', '250', '1.6', '0226720220', '0', '2020-09-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_tinta`
--

CREATE TABLE `estoque_tinta` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `preco` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `dt_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque_tinta`
--

INSERT INTO `estoque_tinta` (`id`, `marca`, `cor`, `preco`, `tipo`, `dt_compra`) VALUES
(2, 'Roland', 'Vermelho', '0', 'Líquido', '2020-08-17'),
(4, 'Roland', 'Preto', '0', 'Líquido', '2020-08-17'),
(6, 'Roland', 'Amarelo', '0', 'Líquido', '2020-08-17'),
(8, 'Roland', 'Azul', '0', 'Líquido', '2020-08-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(150) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `data_aniversario` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `sobrenome`, `senha`, `data_aniversario`, `sexo`, `telefone`, `email`, `nivel`) VALUES
('482.485.448-28', 'Vinicius', 'Vieira', '2208', '1999-08-22', 'Masculino', '(15)99633-0745', 'adm@adm.com', 1),
('519.707.278-45', 'Jonas', 'Martins Alves de Oliveira', '1234', '2001-12-31', 'Masculino', '(15)98837-1251', 'jonasblz@outlook.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `malha`
--

CREATE TABLE `malha` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `malha`
--

INSERT INTO `malha` (`id`, `nome`) VALUES
(4120, 'LYCREPE DIGITAL'),
(4142, 'MOLETINHO POLY DIGITAL'),
(4209, 'LYCREPE SHINE DIGITAL'),
(4430, 'MOLETINHO CONFORT DIGITAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `vendedor` varchar(150) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `dt_emissao` date NOT NULL,
  `dt_prevista` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `dt_conclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `cliente`, `vendedor`, `cidade`, `dt_emissao`, `dt_prevista`, `status`, `dt_conclusao`) VALUES
(429315, 'Oscar dos Reis', 'Oner', 'Indaial', '2020-08-31', '0000-00-00', 'Concluido', '2020-09-01'),
(430776, 'Celene Aparecida', 'Lico', 'Socorro', '2020-08-18', '0000-00-00', 'Concluido', '2020-08-20'),
(431700, 'Isamaria Confecções', 'Lico', 'Iracemápolis', '2020-08-20', '0000-00-00', 'Concluido', '2020-08-20'),
(432135, 'Cleria Regina', 'Loja', 'Corumbataí', '2020-08-24', '0000-00-00', 'Concluido', '2020-09-01'),
(432174, 'Isamaria Confecções', 'Lico', 'Iracemápolis', '2020-08-24', '0000-00-00', 'Concluido', '2020-08-25'),
(432207, 'Rosilene', 'Loja', 'São Carlos', '2020-08-25', '0000-00-00', 'Concluido', '2020-08-25'),
(432320, 'Martex Malhas', 'Edgar', 'Birigui', '2020-08-31', '0000-00-00', 'Concluido', '2020-09-01'),
(432823, 'Sandra Cristina', 'Nilton', 'Campinas', '2020-08-31', '0000-00-00', 'Concluido', '2020-09-01'),
(432979, 'Bonati e Bonati', 'Nilton', 'Campinas', '2020-09-01', '0000-00-00', 'Concluido', '2020-09-01'),
(433226, 'Ondina Aparecida', 'Lico', 'Socorro', '2020-09-03', '0000-00-00', 'Andamento', '0001-01-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_artigo`
--

CREATE TABLE `pedido_artigo` (
  `id` int(11) NOT NULL,
  `fk_pedido` int(11) NOT NULL,
  `fk_funcionario` varchar(15) NOT NULL,
  `id_malha` int(11) NOT NULL,
  `id_estampa` int(11) NOT NULL,
  `maquina_funcionario` varchar(150) NOT NULL,
  `unidade` varchar(50) NOT NULL,
  `peso` float NOT NULL,
  `largura` float NOT NULL,
  `gramatura` float NOT NULL,
  `comprimento` float NOT NULL,
  `impresso` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `dt_conclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido_artigo`
--

INSERT INTO `pedido_artigo` (`id`, `fk_pedido`, `fk_funcionario`, `id_malha`, `id_estampa`, `maquina_funcionario`, `unidade`, `peso`, `largura`, `gramatura`, `comprimento`, `impresso`, `status`, `dt_conclusao`) VALUES
(6, 430776, '519.707.278-45', 4120, 2160, 'SUBL01-JMA', 'Metros', 15, 1.39, 0, 21.2, 21.2, 'Concluido', '2020-08-20'),
(7, 430776, '519.707.278-45', 4120, 2319, 'SUBL01-JMA', 'Metros', 15, 1.39, 0, 21.2, 21.2, 'Concluido', '2020-08-20'),
(9, 430776, '519.707.278-45', 4120, 2323, 'SUBL01-JMA', 'Metros', 15, 1.39, 0, 21.2, 21.2, 'Concluido', '2020-08-20'),
(11, 431700, '519.707.278-45', 4120, 2260, 'SUBL01-JMA', 'Metros', 7, 1.39, 0, 35.6, 35.6, 'Concluido', '2020-08-20'),
(12, 431700, '519.707.278-45', 4120, 2160, 'SUBL01-JMA', 'Metros', 7, 1.39, 0, 35.6, 35.6, 'Concluido', '2020-08-20'),
(14, 432174, '519.707.278-45', 4120, 2310, 'SUBL01-JMA', 'Metros', 8.12, 1.4, 154, 40, 40, 'Concluido', '2020-08-24'),
(15, 432135, '519.707.278-45', 4209, 2100, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 60, 0, 'Concluido', '2020-08-27'),
(16, 432135, '519.707.278-45', 4209, 2101, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 60, 0, 'Concluido', '2020-08-27'),
(17, 432135, '519.707.278-45', 4209, 2092, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 60, 0, 'Concluido', '2020-08-27'),
(18, 432135, '519.707.278-45', 4120, 2083, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 62, 0, 'Concluido', '2020-08-28'),
(19, 432135, '519.707.278-45', 4120, 2082, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 57, 0, 'Concluido', '2020-08-28'),
(20, 432135, '519.707.278-45', 4120, 2081, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 61.65, 0, 'Concluido', '2020-08-28'),
(26, 432207, '519.707.278-45', 4120, 2123, 'SUBL01-JMA', 'Metros', 15, 1.4, 150, 60, 60, 'Concluido', '2020-08-25'),
(33, 429315, '519.707.278-45', 4430, 2160, 'SUBL01-JMA', 'Metros', 15, 1.6, 247, 35, 35, 'Concluido', '2020-08-31'),
(34, 429315, '519.707.278-45', 4430, 2160, 'SUBL01-JMA', 'Metros', 15, 1.6, 247, 35, 35, 'Concluido', '2020-08-31'),
(35, 429315, '519.707.278-45', 4430, 2160, 'SUBL01-JMA', 'Metros', 15, 1.6, 247, 35, 35, 'Concluido', '2020-08-31'),
(36, 429315, '519.707.278-45', 4430, 2160, 'SUBL01-JMA', 'Metros', 15, 1.6, 247, 35, 35, 'Concluido', '2020-08-31'),
(37, 429315, '519.707.278-45', 4430, 2160, 'SUBL01-JMA', 'Metros', 15, 1.6, 247, 35, 35, 'Concluido', '2020-09-01'),
(38, 429315, '519.707.278-45', 4430, 2160, 'SUBL01-JMA', 'Metros', 15, 1.6, 247, 35, 35, 'Concluido', '2020-09-01'),
(39, 432823, '519.707.278-45', 4142, 2370, 'SUBL01-JMA', 'Metros', 15, 1.6, 267, 36.6, 36.6, 'Concluido', '2020-09-01'),
(40, 432979, '519.707.278-45', 4142, 2319, 'SUBL01-JMA', 'Metros', 15, 1.6, 250, 31.4, 31.4, 'Concluido', '2020-09-01'),
(41, 432320, '519.707.278-45', 4120, 2368, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 15.34, 15.34, 'Concluido', '2020-08-31'),
(42, 432320, '519.707.278-45', 4120, 2299, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 15.34, 15.34, 'Concluido', '2020-08-31'),
(43, 432320, '519.707.278-45', 4120, 2319, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 15.34, 15.34, 'Concluido', '2020-08-31'),
(44, 432320, '519.707.278-45', 4120, 2323, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 15.34, 15.34, 'Concluido', '2020-08-31'),
(45, 432320, '519.707.278-45', 4120, 2366, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 15.34, 15.34, 'Concluido', '2020-08-31'),
(46, 432320, '519.707.278-45', 4120, 2361, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 12.61, 12.61, 'Concluido', '2020-09-01'),
(47, 432320, '519.707.278-45', 4120, 2362, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 12.61, 12.61, 'Concluido', '2020-09-01'),
(48, 432320, '519.707.278-45', 4120, 2364, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 12.61, 12.61, 'Concluido', '2020-09-01'),
(49, 432320, '519.707.278-45', 4120, 2356, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 12.61, 12.61, 'Concluido', '2020-09-01'),
(50, 432320, '519.707.278-45', 4120, 2359, 'SUBL01-JMA', 'Metros', 3, 1.4, 150, 12.61, 12.61, 'Concluido', '2020-09-01'),
(51, 433226, '519.707.278-45', 4142, 2315, 'SUBL01-JMA', 'Metros', 15, 1.62, 250, 35, 0, 'Andamento', '0001-01-01'),
(52, 433226, '519.707.278-45', 4142, 2160, 'SUBL01-JMA', 'Metros', 15, 1.62, 250, 35, 0, 'Andamento', '0001-01-01'),
(53, 433226, '519.707.278-45', 4142, 2299, 'SUBL01-JMA', 'Metros', 15, 1.62, 250, 35, 0, 'Andamento', '0001-01-01'),
(54, 433226, '519.707.278-45', 4142, 2260, 'SUBL01-JMA', 'Metros', 15, 1.62, 250, 35, 0, 'Andamento', '0001-01-01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estampa`
--
ALTER TABLE `estampa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estampa` (`nome`),
  ADD KEY `fk_malha` (`variante`);

--
-- Índices para tabela `estoque_papel`
--
ALTER TABLE `estoque_papel`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estoque_tinta`
--
ALTER TABLE `estoque_tinta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `malha`
--
ALTER TABLE `malha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido_artigo`
--
ALTER TABLE `pedido_artigo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionario` (`fk_funcionario`),
  ADD KEY `fk_pedido` (`fk_pedido`),
  ADD KEY `id_estampa` (`id_estampa`),
  ADD KEY `id_malha` (`id_malha`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estampa`
--
ALTER TABLE `estampa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2371;

--
-- AUTO_INCREMENT de tabela `estoque_papel`
--
ALTER TABLE `estoque_papel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `estoque_tinta`
--
ALTER TABLE `estoque_tinta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `malha`
--
ALTER TABLE `malha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456799;

--
-- AUTO_INCREMENT de tabela `pedido_artigo`
--
ALTER TABLE `pedido_artigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido_artigo`
--
ALTER TABLE `pedido_artigo`
  ADD CONSTRAINT `pedido_artigo_ibfk_3` FOREIGN KEY (`fk_funcionario`) REFERENCES `funcionario` (`cpf`),
  ADD CONSTRAINT `pedido_artigo_ibfk_6` FOREIGN KEY (`fk_pedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `pedido_artigo_ibfk_7` FOREIGN KEY (`id_estampa`) REFERENCES `estampa` (`id`),
  ADD CONSTRAINT `pedido_artigo_ibfk_8` FOREIGN KEY (`id_malha`) REFERENCES `malha` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
