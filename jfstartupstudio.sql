-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql669.umbler.com
-- Generation Time: 11-Ago-2020 às 16:51
-- Versão do servidor: 5.6.40
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jfstartupstudio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  `numero` varchar(40) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(1000) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(70) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `telefone_celular` varchar(40) DEFAULT NULL,
  `telefone_fixo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `email`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `cep`, `telefone_celular`, `telefone_fixo`) VALUES
(2, 'Jonatas Freire', '03943513232', 'atendimento@jfstartupstudio.com.br', 'Rua Francisco Pereira dos Santos', '3338', 'Alto Alegre', NULL, 'Ji-ParanÃ¡', 'RO', '76909634', '56999665053', ''),
(3, 'THAMIRYS CATIB MARKONIZAS', '139.651.817', 'markonizas@gmail.com', 'Rua 15, Casa 1', 'Casa 1', 'Imbarie', NULL, 'Duque de Caxias', 'RJ', '25271750', '21987755899', '2141392664'),
(4, 'THAMIRYS CATIB MARKONIZAS', '13965181777', 'markonizas@gmail.com', 'Rua 15, Casa 1', 'Casa 1', 'Imbarie', NULL, 'Duque de Caxias', 'RJ', '25271750', '21987755899', '2141392664'),
(5, 'alan robert bispo santos', '03137883598', 'alanrobertoficial@gmail.com', 'rua engenheiro fook mau n 323', '323', 'farolandia', NULL, 'sergipe', 'se', '49030310', '79999230403', '7941410316'),
(6, 'Marcel Eduardo Anselmo', '30505669811', 'marcel.anselmo@gmail.com', 'avenida presidente kennedy ', '1386', 'cidade nova', NULL, 'indaiatuba', 'sp', '13334170', '19974051248', ''),
(7, 'Denis Hilario', '28021930829', 'fortetreinamentos@gmail.com', 'Rua Benedito Rodrigues Gouvea, ', '310', 'Jd. Campos Eliseos', NULL, 'Campinas', 'SP', '13060020', '19991285159', ''),
(8, 'Calebe Santos Teixeira', '12558024728', 'calebe.teixeira@live.com', 'RUa Alegre', '684', 'Gramacho', NULL, 'Duque de Caxias', 'RJ', '25035130', '21979738671', ''),
(9, 'Ricardo da Silva Teles', '01355409500', 'ricardo@qualiteseguros.com.br', 'Rua HÃ©lio de Oliveira', '182', 'Santa Tereza', NULL, 'Salvador', 'Casado', '40265020', '71997330610', '7135656540');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leads_software`
--

CREATE TABLE IF NOT EXISTS `leads_software` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone_celular` varchar(255) DEFAULT NULL,
  `campanha` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `licencas`
--

CREATE TABLE IF NOT EXISTS `licencas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nome_software` varchar(200) DEFAULT NULL,
  `codigo_ativacao` varchar(300) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `licencas`
--

INSERT INTO `licencas` (`id`, `id_cliente`, `nome_software`, `codigo_ativacao`, `data_vencimento`, `categoria`, `status`) VALUES
(2, 2, 'UhatsApp Messenger Marketing', '1d5ee10be4f43b9da9f6e4e8a682ded4239c43bb', '2021-01-01', 'Paga', 'Ativado'),
(3, 2, 'InstaMarketing - Extrator', 'ba8003867827006aeca63daa78823a57452b258a', '2020-12-31', 'Paga', 'Ativado'),
(4, 3, 'LX Extrator de Telefones', '0d73cc0eb1c082b8edd7b8e2ea3f98b06805dbf0', '2021-03-01', 'Paga', 'Ativado'),
(5, 4, 'UhatsApp Messenger Marketing', '20ae1a94d907d5fc58f81b76098899208e48a17f', '2021-03-01', 'Paga', 'Ativado'),
(6, 5, 'UhatsApp Messenger Marketing', '4a2fcb7c6f3dfd7b3f20c92a21b2b62d194095aa', '2020-12-12', 'Paga', 'Ativado'),
(7, 5, 'InstaMarketing - Extrator', 'cb260b589b67d279899482a7d0ddce679d092dc1', '2020-12-12', 'Paga', 'Ativado'),
(8, 5, 'LX Extrator de Telefones', '06cd65cba7b019379150edaeb663bca635d856ed', '2020-12-12', 'Paga', 'Ativado'),
(9, 6, 'UhatsApp Messenger Marketing', '56117d379838da4cd9516b8e849320a8f1ac28b7', '2021-03-01', 'Paga', 'Ativado'),
(12, 7, 'UhatsApp Messenger Marketing', '4f6ca31d893facecde17bc7cda225b0d5cddf6de', '2020-07-30', 'Teste(3-7) Dias', 'Ativado'),
(13, 8, '', 'bcb514dc6179b7c2510d3d1dea583237daf08e04', '0000-00-00', 'Pendente', 'Ativado'),
(14, 8, '', 'd350dbfb5b42fd6ac0ee02de3066352abfb3cd34', '0000-00-00', 'Pendente', 'Ativado'),
(15, 8, 'UhatsApp Messenger Marketing', '55fbfd2de9dedc3d30d37a7a734c46e82a5e844b', '2021-07-31', 'Paga', 'Ativado'),
(16, 9, 'UhatsApp Messenger Marketing', '9a458d4b17f5b2d728936ba4f59d58e2aafcdb47', '2021-08-05', 'Paga', 'Ativado'),
(17, 9, 'LX Extrator de Telefones', '239dced96dc9a78b1e84d5810696e337229887c4', '2021-08-05', 'Paga', 'Ativado'),
(19, 9, 'InstaMarketing - Extrator', 'c074c4b1055087f766bd3bbbb523e23bc23f1b9f', '2020-08-05', 'Paga', 'Ativado'),
(20, 6, 'UhatsApp Messenger Marketing', '9ba184ff66ca7a71b882dcc9fe8826ec532fde9b', '2021-08-05', 'Paga', 'Ativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `licenca_temporaria`
--

CREATE TABLE IF NOT EXISTS `licenca_temporaria` (
  `id` int(11) NOT NULL,
  `mac` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `dia` varchar(255) DEFAULT NULL,
  `mes` varchar(255) DEFAULT NULL,
  `ano` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `licenca_temporaria`
--

INSERT INTO `licenca_temporaria` (`id`, `mac`, `codigo`, `dia`, `mes`, `ano`) VALUES
(14, 'a0466d43868924ea39a7d3f3e40ed3cc068e72e9', 'null', '17', '07', '2020'),
(15, '9773cde3588f29001b8f35cfee7295e3cfdc99de', 'null', '17', '07', '2020'),
(16, '1d5ee10be4f43b9da9f6e4e8a682ded4239c43bb', 'null', '17', '07', '2020'),
(17, 'ba8003867827006aeca63daa78823a57452b258a', 'null', '19', '07', '2020'),
(18, '00:50:56:C0:00:08', '32714', '19', '07', '2020'),
(19, 'F0:BF:97:0B:FC:D4', '32714', '19', '07', '2020'),
(20, '00:50:56:C0:00:01', '32714', '19', '07', '2020'),
(21, 'b46ebda0e6a5ec81747550fccfad49d76fb97892', 'null', '19', '07', '2020'),
(22, 'cefa4cd244209fa3ae56dd68be93b334a3246b54', 'null', '21', '07', '2020'),
(23, '4c4c0df62b1323eee6963cd7800d1038329affba', 'null', '21', '07', '2020'),
(24, '385ca84d1a9879d48a201fb830c8de8c3a5f58b5', 'null', '21', '07', '2020'),
(25, '0d73cc0eb1c082b8edd7b8e2ea3f98b06805dbf0', 'null', '21', '07', '2020'),
(26, '20ae1a94d907d5fc58f81b76098899208e48a17f', 'null', '21', '07', '2020'),
(27, '549719d400bf6aa83d4b71b60be64df743a8be99', 'null', '21', '07', '2020'),
(28, 'a16aa53179ec15e88b42e901b69ec79620bce380', 'null', '21', '07', '2020'),
(29, 'de79c27b34e65153dcd43ed9609ddeb03cbf565d', 'null', '21', '07', '2020'),
(30, '06cd65cba7b019379150edaeb663bca635d856ed', 'null', '21', '07', '2020'),
(31, 'cb260b589b67d279899482a7d0ddce679d092dc1', 'null', '21', '07', '2020'),
(32, 'a081f921b4a54c85d6ee957928ef1e62a55e7074', 'null', '22', '07', '2020'),
(33, 'e880993ccaab902d09a126bed41dcfccd34580a9', 'null', '22', '07', '2020'),
(34, '4a2fcb7c6f3dfd7b3f20c92a21b2b62d194095aa', 'null', '22', '07', '2020'),
(35, '5fdcdeb26cd1f17b730bebfedb9c2c1e68ca8479', 'null', '22', '07', '2020'),
(36, '69cddbd8a17cfe9fa82ac6a98634e0053887159b', 'null', '22', '07', '2020'),
(37, '0084b8ae12c9cc0ceae2b0a94d9cd3151155429a', 'null', '22', '07', '2020'),
(38, 'fb005be2bef1fc989568bbc058f5061e12b24460', 'null', '22', '07', '2020'),
(39, '00:50:56:C0:00:08', '7745356', '23', '07', '2020'),
(40, '56117d379838da4cd9516b8e849320a8f1ac28b7', 'null', '24', '07', '2020'),
(41, 'd3aec4a08f70038d7a596e02bbf2ac5806693e62', 'null', '26', '07', '2020'),
(42, '1a9cbac4ea1dfb735a8f0f966d3f79f571655c16', 'null', '26', '07', '2020'),
(43, 'b7bfcc4d1959983ee0b5de8308add46274fc74ac', 'null', '26', '07', '2020'),
(44, '4caeebb5c6d052e28b542bcd5d8ab26363cc962c', 'null', '26', '07', '2020'),
(45, 'f8a876a67e337826489a3488238f2a1885102049', 'null', '26', '07', '2020'),
(46, 'f44ec7eeb9335fc3d61aedd2a9978698507b2bea', 'null', '28', '07', '2020'),
(47, '64e605843e466500c1397194e168aeb6de4395f3', 'null', '28', '07', '2020'),
(48, '5C:AC:4C:77:0F:0B', '7745356', '28', '07', '2020'),
(49, '4f6ca31d893facecde17bc7cda225b0d5cddf6de', 'null', '28', '07', '2020'),
(50, 'd350dbfb5b42fd6ac0ee02de3066352abfb3cd34', 'null', '31', '07', '2020'),
(51, '55fbfd2de9dedc3d30d37a7a734c46e82a5e844b', 'null', '31', '07', '2020'),
(52, 'bcb514dc6179b7c2510d3d1dea583237daf08e04', 'null', '31', '07', '2020'),
(53, '9a458d4b17f5b2d728936ba4f59d58e2aafcdb47', 'null', '31', '07', '2020'),
(54, '239dced96dc9a78b1e84d5810696e337229887c4', 'null', '31', '07', '2020'),
(55, 'c074c4b1055087f766bd3bbbb523e23bc23f1b9f', 'null', '31', '07', '2020'),
(56, 'fdf9b7c6721e15ab60b2fe321acbafc9bd9266db', 'null', '31', '07', '2020'),
(57, 'd9735e1f1227caefa6fa8eb2ad5f934e425f32ab', 'null', '01', '08', '2020'),
(58, 'cd8f5c632fa16d876ab8c5de513d82946283f8fa', 'null', '02', '08', '2020'),
(59, '50381897a91981731d06ed14cb938ae3098e6744', 'null', '03', '08', '2020'),
(60, '9ba184ff66ca7a71b882dcc9fe8826ec532fde9b', 'null', '06', '08', '2020'),
(61, 'd2ffb60637bcc5a3d9bf598bac95f1ed697bed08', 'null', '09', '08', '2020'),
(62, 'dfe1cb42b23ca5c66abe15657e9fbf93fb283784', 'null', '09', '08', '2020'),
(63, 'dfe1cb42b23ca5c66abe15657e9fbf93fb283784', 'null', '09', '08', '2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessoes_login`
--

CREATE TABLE IF NOT EXISTS `sessoes_login` (
  `id` int(11) NOT NULL,
  `id_user` varchar(40) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `tipo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sessoes_login`
--

INSERT INTO `sessoes_login` (`id`, `id_user`, `token`, `ip`, `tipo`) VALUES
(87, '1', '74209e3c39272362ddb06c5104983a0d1148f97893cb9d38f16770c0dfca70f2', '::1', 'admin'),
(88, '1', '9a6f68f739ad7018ec6d8045691e5a89ea0e3af4c177d5c707e430ee90461526', '::1', 'admin'),
(89, '1', 'fdced0826ebcb3143e70e0ef07b40449b90477892e6601e9ecccb5117c729c28', '177.75.188.178', 'admin'),
(90, '1', '8b05f63d3bd12bca0b10abf42642c189c26734832c930acf1c6e33144b528dd4', '177.75.188.178', 'admin'),
(91, '1', 'e074fbcffa374c9f465911be6831708ca882371669ec0262449a87702a9ca139', '177.75.188.178', 'admin'),
(92, '1', 'c7330343f3dea100bc8db9683c15e264896be6990cc54308f69a66795545205f', '191.217.163.196', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Jonatas Freire', 'jonatasfreirejf', 'bbb78cf636a8b445d27cc1884d40ba08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads_software`
--
ALTER TABLE `leads_software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licencas`
--
ALTER TABLE `licencas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenca_temporaria`
--
ALTER TABLE `licenca_temporaria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessoes_login`
--
ALTER TABLE `sessoes_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `leads_software`
--
ALTER TABLE `leads_software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `licencas`
--
ALTER TABLE `licencas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `licenca_temporaria`
--
ALTER TABLE `licenca_temporaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `sessoes_login`
--
ALTER TABLE `sessoes_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
