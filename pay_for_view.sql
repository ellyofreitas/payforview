-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/09/2018 às 22:51
-- Versão do servidor: 5.7.23-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pay_for_view`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_filme_fk` int(11) NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `desliked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `id_user_fk`, `id_filme_fk`, `liked`, `desliked`) VALUES
(1, 1, 1, 1, 0),
(4, 1, 10, 1, 0),
(5, 1, 3, 0, 1),
(6, 1, 4, 0, 1),
(7, 22, 3, 1, 0),
(8, 1, 7, 1, 0),
(9, 1, 5, 0, 1),
(10, 1, 2, 1, 0),
(11, 1, 9, 1, 0),
(12, 1, 6, 1, 0),
(13, 1, 8, 1, 0),
(14, 23, 1, 1, 0),
(15, 22, 11, 1, 0),
(16, 22, 2, 1, 0),
(17, 1, 14, 0, 0),
(18, 1, 12, 1, 0),
(19, 1, 13, 1, 0),
(20, 22, 12, 0, 0),
(21, 23, 11, 1, 0),
(22, 23, 14, 1, 0),
(23, 1, 11, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_filme_fk` int(11) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_user_fk`, `id_filme_fk`, `comentario`) VALUES
(11, 2, 1, 'Roxedinha'),
(12, 23, 1, 'Show de bola'),
(16, 1, 14, 'Show');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id_filme` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `njunto` varchar(100) NOT NULL,
  `ano` varchar(100) NOT NULL,
  `capa_image` varchar(100) NOT NULL,
  `background_image` varchar(100) NOT NULL,
  `src_filme` varchar(1000) NOT NULL,
  `id_produtora_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `filme`
--

INSERT INTO `filme` (`id_filme`, `titulo`, `njunto`, `ano`, `capa_image`, `background_image`, `src_filme`, `id_produtora_fk`) VALUES
(1, 'Star Wars: Os Últimos Jedi', 'starwarsosultimosjedi', '2017', 'starwarsosultimosjedi.jpg', 'http://localhost/bancodeimagens/starwarsosultimosjedi.png', 'starwarsosultimosjedi.mp4', 3),
(2, 'Thor: Ragnarok', 'thorragnarok', '2017', 'thorragnarok.jpg', 'http://localhost/bancodeimagens/thorragnarok.jpg', 'thorragnarok.mp4', 5),
(3, 'Deadpool', 'deadpool', '2016', 'deadpool.jpg', 'http://localhost/bancodeimagens/deadpool.jpg', 'http://localhost/bancodefilmes/deadpool.mp4', 2),
(4, 'Batman vs Superman: A origem da Justiça', 'batmanvssupermanaorigemdajustica', '2016', 'batmanvssupermanaorigemdajustica.jpg', 'http://localhost/bancodeimagens/batmanvssupermanaorigemdajustica.jpg', 'batmanvssupermanaorigemdajustica.mp4', 4),
(5, 'Liga da Justiça', 'ligadajustica', '2017', 'ligadajustica.jpg', 'http://localhost/bancodeimagens/ligadajustica.jpg', 'ligadajustica.mp4', 4),
(6, 'Extraordinário', 'extraordinario', '2017', 'extraordinario.jpg', 'http://localhost/bancodeimagens/extraordinario.jpg', 'extraordinario.mp4', 1),
(7, 'Jumanji: Bem-vindo à Selva', 'jumanjibemvindoaselva', '2018', 'jumanjibemvindoaselva.jpg', 'http://localhost/bancodeimagens/imagem.jpg', 'jumanjibemvindoaselva.mp4', 6),
(8, 'Maze Runner: A Cura Mortal', 'mazerunneracuramortal', '2018', 'mazerunneracuramortal.jpg', 'mazerunneracuramortal.jpg', 'mazerunneracuramortal.mp4', 7),
(9, 'Viva: A Vida é Uma Festa', 'vivaavidaeumafesta', '2017', 'viva–avidaeumafesta.jpg', 'viva–avidaeumafesta.jpg', 'viva–avidaeumafesta.mp4', 8),
(10, 'O Touro Ferdinando', 'otouroferdinando', '2017', 'otouroferdinando.jpg', 'otouroferdinando.jpg', 'otouroferdinando.mp4', 9),
(11, 'Pantera Negra', 'panteranegra', '2018', 'panteranegra.jpg', 'panter.jpg', 'panteranegra.mp4', 5),
(12, 'Alice no País das Maravilhas', 'alicenopaisdasmaravilhas', '2010', 'alicenopaisdasmaravilhas.jpg', 'alicenopaisdasmaravilhas.jpg', 'alicenopaisdasmaravilhas.mp4', 9),
(13, 'Os Bons Companheiros', 'osbonscompanheiros', '1990', 'osbonscompanheiros.jpg', 'osbonscompanheiros.jpg', 'osbonscompanheiros.mp4', 13),
(14, 'Batman Ninja', 'batmanninja', '2018', 'batmanninja.jpg', 'batmanninja.jpg', 'batmanninja.mp4', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(100) NOT NULL,
  `nome_genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome_genero`) VALUES
(1, 'Ação'),
(2, 'Aventura'),
(4, 'Comedia'),
(11, 'Cult'),
(5, 'Drama'),
(6, 'Fantasia'),
(14, 'Faroeste'),
(7, 'Ficção científica'),
(15, 'Filme Policial'),
(9, 'Mistério'),
(10, 'Romance'),
(13, 'Suspense'),
(8, 'Terror'),
(12, 'Trash');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero_filme`
--

CREATE TABLE `genero_filme` (
  `id` int(100) NOT NULL,
  `id_filme_fk` int(11) NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `genero_filme`
--

INSERT INTO `genero_filme` (`id`, `id_filme_fk`, `id_genero_fk`) VALUES
(2, 5, 1),
(3, 5, 2),
(5, 3, 1),
(6, 3, 2),
(7, 3, 4),
(8, 3, 5),
(9, 3, 6),
(10, 3, 10),
(11, 2, 2),
(12, 2, 5),
(13, 1, 6),
(14, 4, 1),
(15, 4, 6),
(16, 6, 5),
(17, 7, 1),
(18, 7, 6),
(19, 8, 6),
(20, 9, 2),
(21, 9, 9),
(22, 10, 2),
(23, 10, 6),
(24, 11, 6),
(25, 11, 7),
(26, 12, 2),
(27, 12, 6),
(28, 13, 2),
(29, 13, 5),
(30, 13, 15),
(31, 14, 1),
(32, 14, 2),
(33, 14, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero_filme_reverse`
--

CREATE TABLE `genero_filme_reverse` (
  `id` int(11) NOT NULL,
  `id_filme_fk` int(11) DEFAULT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `genero_filme_reverse`
--

INSERT INTO `genero_filme_reverse` (`id`, `id_filme_fk`, `id_genero_fk`) VALUES
(1, 4, 2),
(2, 4, 4),
(3, 4, 11),
(4, 4, 5),
(5, 4, 14),
(6, 4, 7),
(7, 4, 9),
(8, 4, 10),
(9, 4, 13),
(10, 4, 8),
(11, 4, 12),
(23, 9, 1),
(25, 9, 4),
(26, 9, 11),
(27, 9, 5),
(28, 9, 6),
(29, 9, 14),
(30, 9, 7),
(32, 9, 10),
(33, 9, 13),
(34, 9, 8),
(35, 9, 12),
(36, 8, 1),
(37, 8, 2),
(38, 8, 4),
(39, 8, 11),
(40, 8, 5),
(41, 8, 14),
(42, 8, 7),
(43, 8, 9),
(44, 8, 10),
(45, 8, 13),
(46, 8, 8),
(47, 8, 12),
(48, 3, 11),
(49, 3, 14),
(50, 3, 7),
(51, 3, 9),
(52, 3, 13),
(53, 3, 8),
(54, 3, 12),
(55, 1, 1),
(56, 1, 2),
(57, 1, 4),
(58, 1, 11),
(59, 1, 5),
(60, 1, 14),
(61, 1, 7),
(62, 1, 9),
(63, 1, 10),
(64, 1, 13),
(65, 1, 8),
(66, 1, 12),
(67, 2, 1),
(68, 2, 4),
(69, 2, 11),
(70, 2, 6),
(71, 2, 14),
(72, 2, 7),
(73, 2, 9),
(74, 2, 10),
(75, 2, 13),
(76, 2, 8),
(77, 2, 12),
(78, 5, 4),
(79, 5, 11),
(80, 5, 5),
(81, 5, 6),
(82, 5, 14),
(83, 5, 7),
(84, 5, 9),
(85, 5, 10),
(86, 5, 13),
(87, 5, 8),
(88, 5, 12),
(89, 6, 1),
(90, 6, 2),
(91, 6, 4),
(92, 6, 11),
(93, 6, 6),
(94, 6, 14),
(95, 6, 7),
(96, 6, 9),
(97, 6, 10),
(98, 6, 13),
(99, 6, 8),
(100, 6, 12),
(101, 7, 2),
(102, 7, 4),
(103, 7, 11),
(104, 7, 5),
(105, 7, 14),
(106, 7, 7),
(107, 7, 9),
(108, 7, 10),
(109, 7, 13),
(110, 7, 8),
(111, 7, 12),
(112, 10, 1),
(113, 10, 4),
(114, 10, 11),
(115, 10, 5),
(116, 10, 14),
(117, 10, 7),
(118, 10, 9),
(119, 10, 10),
(120, 10, 13),
(121, 10, 8),
(122, 10, 12),
(123, 11, 1),
(124, 11, 2),
(125, 11, 4),
(126, 11, 11),
(127, 11, 5),
(128, 11, 14),
(129, 11, 9),
(130, 11, 10),
(131, 11, 13),
(132, 11, 8),
(133, 11, 12),
(134, 12, 1),
(135, 12, 4),
(136, 12, 11),
(137, 12, 5),
(138, 12, 14),
(139, 12, 7),
(140, 12, 9),
(141, 12, 10),
(142, 12, 13),
(143, 12, 8),
(144, 12, 12),
(145, 13, 1),
(146, 13, 4),
(147, 13, 11),
(148, 13, 6),
(149, 13, 14),
(150, 13, 7),
(151, 13, 9),
(152, 13, 10),
(153, 13, 13),
(154, 13, 8),
(155, 13, 12),
(156, 14, 4),
(157, 14, 11),
(158, 14, 5),
(159, 14, 14),
(160, 14, 7),
(161, 14, 15),
(162, 14, 9),
(163, 14, 10),
(164, 14, 13),
(165, 14, 8),
(166, 14, 12),
(167, 12, 15),
(168, 4, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero_user`
--

CREATE TABLE `genero_user` (
  `id` int(11) NOT NULL,
  `id_user_fk` int(100) NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `genero_user`
--

INSERT INTO `genero_user` (`id`, `id_user_fk`, `id_genero_fk`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 10),
(4, 2, 2),
(5, 4, 1),
(6, 4, 2),
(7, 4, 4),
(8, 15, 10),
(9, 15, 8),
(10, 16, 7),
(11, 17, 4),
(12, 17, 6),
(13, 17, 4),
(14, 17, 6),
(15, 17, 4),
(16, 17, 6),
(17, 17, 4),
(18, 17, 6),
(19, 21, 4),
(20, 21, 10),
(21, 22, 2),
(22, 22, 4),
(23, 22, 5),
(24, 22, 6),
(25, 22, 7),
(26, 22, 10),
(27, 22, 13),
(28, 23, 1),
(29, 23, 2),
(30, 1, 4),
(31, 1, 12),
(32, 28, 1),
(33, 28, 4),
(34, 28, 2),
(35, 29, 1),
(36, 29, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id_historico` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_filme_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `historico`
--

INSERT INTO `historico` (`id_historico`, `id_user_fk`, `id_filme_fk`) VALUES
(89, 22, 5),
(100, 1, 2),
(101, 1, 9),
(102, 1, 3),
(106, 22, 11),
(108, 23, 13),
(109, 23, 1),
(111, 1, 12),
(112, 1, 13),
(113, 1, 5),
(114, 23, 6),
(115, 22, 14),
(116, 23, 12),
(117, 22, 4),
(119, 23, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_27_130152_cria-tabela-users', 1),
(2, '2018_09_27_133012_cria-tabela-planos', 2),
(3, '2018_09_27_133229_cria-tabela-users', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_filme_fk` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `notificacao`
--

INSERT INTO `notificacao` (`id_notificacao`, `id_user_fk`, `id_filme_fk`, `status`) VALUES
(1, 1, 9, 1),
(2, 1, 10, 1),
(3, 1, 8, 1),
(4, 22, 11, 1),
(5, 22, 11, 1),
(6, 23, 12, 1),
(7, 22, 12, 1),
(8, 23, 13, 1),
(9, 22, 13, 1),
(10, 1, 14, 1),
(11, 4, 14, 0),
(12, 23, 14, 1),
(13, 2, 14, 0),
(14, 22, 14, 1),
(15, 17, 14, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano`
--

CREATE TABLE `plano` (
  `id_plano` int(11) NOT NULL,
  `nome_plano` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `plano`
--

INSERT INTO `plano` (`id_plano`, `nome_plano`) VALUES
(2, 'Platina'),
(1, 'Premium'),
(3, 'Standard');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id_plano` int(10) UNSIGNED NOT NULL,
  `nome_plano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `planos`
--

INSERT INTO `planos` (`id_plano`, `nome_plano`, `created_at`, `updated_at`) VALUES
(1, 'Premium', '2018-09-27 14:02:00', '2018-09-27 14:02:00'),
(2, 'Platina', '2018-09-27 14:02:00', '2018-09-27 14:02:00'),
(3, 'Standard', '2018-09-27 14:02:00', '2018-09-27 14:02:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano_produtora`
--

CREATE TABLE `plano_produtora` (
  `id` int(11) NOT NULL,
  `id_plano_fk` int(100) DEFAULT NULL,
  `id_produtora_fk` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `plano_produtora`
--

INSERT INTO `plano_produtora` (`id`, `id_plano_fk`, `id_produtora_fk`) VALUES
(14, 1, 4),
(16, 1, 5),
(18, 1, 12),
(20, 1, 7),
(22, 1, 1),
(23, 1, 6),
(24, 1, 11),
(25, 1, 10),
(26, 1, 8),
(32, 1, 2),
(33, 2, 3),
(35, 1, 13),
(38, 1, 3),
(39, 2, 5),
(41, 3, 5),
(43, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtora`
--

CREATE TABLE `produtora` (
  `id_produtora` int(11) NOT NULL,
  `nome_produtora` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `produtora`
--

INSERT INTO `produtora` (`id_produtora`, `nome_produtora`) VALUES
(9, 'Blue Sky Studios'),
(4, 'DC'),
(3, 'Disney'),
(12, 'Dreamworks'),
(2, 'Fox'),
(7, 'Gotham Group'),
(1, 'HBO'),
(13, 'Independente'),
(5, 'Marvel'),
(8, 'Pixar'),
(6, 'Sony Pictures'),
(11, 'Universal Pictures'),
(10, 'Universal Studios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `root`
--

CREATE TABLE `root` (
  `id_root` int(1) NOT NULL,
  `email_root` varchar(100) COLLATE utf8_bin NOT NULL,
  `password_root` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `root`
--

INSERT INTO `root` (`id_root`, `email_root`, `password_root`) VALUES
(1, 'root', 'root'),
(2, 'ellyofreitas@gmail.com', 'ellyofreitas'),
(3, 'newroot@gmail.com', 'root');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id_solicitacao` int(11) NOT NULL,
  `id_user_fk` int(100) NOT NULL,
  `email_user_fk` varchar(50) NOT NULL,
  `solicitacao` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id_solicitacao`, `id_user_fk`, `email_user_fk`, `solicitacao`, `status`) VALUES
(9, 22, 'luiza@gmail.com', 'a', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `teste`
--

CREATE TABLE `teste` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `plano_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id_user`, `nome`, `sobrenome`, `email`, `senha`, `cpf`, `plano_fk`) VALUES
(1, 'Ellyo', 'Freitas', 'ellyofreitas@gmail.com', 'root9981', '078.972.073-66', 1),
(2, 'Francisco', 'José', 'franciscojose@gmail.com', 'root', '000.000.000-00', 2),
(4, 'Sr', 'João', 'srjoao@gmail.com', 'root', '149.149.149-71', 2),
(15, 'Sr', 'Francisco', 'srfrancisco@gmail.com', 'root', '441.241.457-54', 1),
(16, 'Sr', 'Antonio', 'srantonio@gmail.com', 'root', '141.491.749-41', 1),
(17, 'Amanda', 'Matos', 'amandamattos@gmail.com', '123', '1-23', 1),
(18, 'Amanda', 'Matos', 'amandamattos@gmail.com', '123', '1-23', 1),
(19, 'Amanda', 'Matos', 'amandamattos@gmail.com', '123', '1-23', 1),
(20, 'Amanda', 'Matos', 'amandamattos@gmail.com', '123', '1-23', 1),
(21, 'Gabriela', 'Mattos', 'gaby@gmail.com', '1234', '123.456-78', 3),
(22, 'Luiza', 'Sampaio', 'luiza@gmail.com', '123', '141.241.241-41', 3),
(23, 'Miqueias', 'Guimaraes', 'mickey@gmail.com', '123', '123.123.124-22', 3),
(24, 'Mi', 'Band', 'eadanaldla@admakdl', '12345', NULL, 2),
(25, 'Maria', 'Silva', 'maria@silva.com', '12345', NULL, 1),
(26, 'Maria', 'Amanda', 'mariaamanda@gmail.com', '12345', NULL, 2),
(27, 'Ellyo', 'Freitas', 'ellyofreitasa@gmail.com', '12345', NULL, 1),
(28, 'Joana', 'Maria', 'joanamaria@gmail.com', 'joana123', NULL, 1),
(29, 'João', 'Pereira', 'ellyofreitasaa@gmail.com', '12345678', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nome_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_plano_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id_user`, `nome_user`, `sobrenome_user`, `email_user`, `senha_user`, `id_plano_fk`, `created_at`, `updated_at`) VALUES
(1, 'Ellyo', 'Freitas', 'ellyofreitas@gmail.com', 'root9981', 1, '2018-09-27 14:03:00', '2018-09-27 14:03:00'),
(2, 'José', 'João', 'jj@gmail.com', 'jj12345678', 1, '2018-09-27 14:23:00', '2018-09-27 14:23:00');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_user_fk` (`id_user_fk`),
  ADD KEY `id_filme_fk` (`id_filme_fk`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_user_fk` (`id_user_fk`),
  ADD KEY `id_filme_fk` (`id_filme_fk`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id_filme`),
  ADD KEY `produtora_fk_idx` (`id_produtora_fk`),
  ADD KEY `titulo_idx` (`titulo`) USING BTREE;

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD KEY `nome_genero_idx` (`nome_genero`);

--
-- Índices de tabela `genero_filme`
--
ALTER TABLE `genero_filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_filme_fk` (`id_filme_fk`),
  ADD KEY `id_genero_fk` (`id_genero_fk`);

--
-- Índices de tabela `genero_filme_reverse`
--
ALTER TABLE `genero_filme_reverse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_filme_fk` (`id_filme_fk`),
  ADD KEY `id_genero_fk` (`id_genero_fk`);

--
-- Índices de tabela `genero_user`
--
ALTER TABLE `genero_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_fk` (`id_user_fk`),
  ADD KEY `id_genero_gu_fk` (`id_genero_fk`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `id_user_fk` (`id_user_fk`),
  ADD KEY `id_filme_fk` (`id_filme_fk`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `id_user_fk` (`id_user_fk`),
  ADD KEY `id_filme_fk` (`id_filme_fk`);

--
-- Índices de tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`id_plano`),
  ADD KEY `plano_idx` (`nome_plano`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_plano`);

--
-- Índices de tabela `plano_produtora`
--
ALTER TABLE `plano_produtora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plano_fk` (`id_plano_fk`),
  ADD KEY `id_produtora_fk` (`id_produtora_fk`);

--
-- Índices de tabela `produtora`
--
ALTER TABLE `produtora`
  ADD PRIMARY KEY (`id_produtora`),
  ADD KEY `produtora_idx` (`nome_produtora`);

--
-- Índices de tabela `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`id_root`);

--
-- Índices de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `id_user_fk` (`id_user_fk`);

--
-- Índices de tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `plano_fk_idx` (`plano_fk`),
  ADD KEY `nome_idx` (`nome`),
  ADD KEY `email_idx` (`email`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `users_id_plano_fk_foreign` (`id_plano_fk`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id_filme` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de tabela `genero_filme`
--
ALTER TABLE `genero_filme`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `genero_filme_reverse`
--
ALTER TABLE `genero_filme_reverse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT de tabela `genero_user`
--
ALTER TABLE `genero_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id_plano` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `plano_produtora`
--
ALTER TABLE `plano_produtora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de tabela `produtora`
--
ALTER TABLE `produtora`
  MODIFY `id_produtora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `root`
--
ALTER TABLE `root`
  MODIFY `id_root` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `teste`
--
ALTER TABLE `teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`id_filme_fk`) REFERENCES `filme` (`id_filme`);

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_filme_fk`) REFERENCES `filme` (`id_filme`);

--
-- Restrições para tabelas `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `produtora_fk` FOREIGN KEY (`id_produtora_fk`) REFERENCES `produtora` (`id_produtora`);

--
-- Restrições para tabelas `genero_filme`
--
ALTER TABLE `genero_filme`
  ADD CONSTRAINT `genero_filme_ibfk_1` FOREIGN KEY (`id_filme_fk`) REFERENCES `filme` (`id_filme`),
  ADD CONSTRAINT `genero_filme_ibfk_2` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`id_genero`);

--
-- Restrições para tabelas `genero_filme_reverse`
--
ALTER TABLE `genero_filme_reverse`
  ADD CONSTRAINT `genero_filme_reverse_ibfk_1` FOREIGN KEY (`id_filme_fk`) REFERENCES `filme` (`id_filme`),
  ADD CONSTRAINT `genero_filme_reverse_ibfk_2` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`id_genero`);

--
-- Restrições para tabelas `genero_user`
--
ALTER TABLE `genero_user`
  ADD CONSTRAINT `id_genero_gu_fk` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `id_user_gu_fk` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`);

--
-- Restrições para tabelas `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`id_filme_fk`) REFERENCES `filme` (`id_filme`);

--
-- Restrições para tabelas `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `notificacao_ibfk_2` FOREIGN KEY (`id_filme_fk`) REFERENCES `filme` (`id_filme`);

--
-- Restrições para tabelas `plano_produtora`
--
ALTER TABLE `plano_produtora`
  ADD CONSTRAINT `id_plano_pp_fk` FOREIGN KEY (`id_plano_fk`) REFERENCES `plano` (`id_plano`),
  ADD CONSTRAINT `id_produtora_pp_fk` FOREIGN KEY (`id_produtora_fk`) REFERENCES `produtora` (`id_produtora`);

--
-- Restrições para tabelas `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD CONSTRAINT `solicitacoes_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`);

--
-- Restrições para tabelas `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `plano_fk` FOREIGN KEY (`plano_fk`) REFERENCES `plano` (`id_plano`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_plano_fk_foreign` FOREIGN KEY (`id_plano_fk`) REFERENCES `planos` (`id_plano`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
