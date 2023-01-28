-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12-Dez-2022 às 18:43
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `localize`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `nota` varchar(50) DEFAULT NULL,
  `menssagem` varchar(500) DEFAULT NULL,
  `id_comercio` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `nome_usuario`, `nota`, `menssagem`, `id_comercio`) VALUES
(5, 'Isabela Do Carmo', '5', 'Muito bom, atendimento rÃ¡pido e prestativo e os preÃ§os sÃ£o os melhores da regiÃ£o', 35),
(6, 'Giovana  Gugel', '4', 'Poucas opÃ§Ãµes de raÃ§Ã£o para pÃ¡ssaros', 35),
(7, 'Julio Cesar', '2', 'PÃ©ssimo', 35),
(8, 'Kevin Ellionai', '4', 'Gostei muito', 35),
(9, 'Gabriel Abiak', '5', 'Bom demais', 35),
(10, 'Gabriel Abiak', '4', 'Foda hein', 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario_reportado`
--

CREATE TABLE `comentario_reportado` (
  `id_comentario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `nota` varchar(100) DEFAULT NULL,
  `menssagem` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comercio`
--

CREATE TABLE `comercio` (
  `id_comercio` int(11) NOT NULL,
  `nomecomercio` varchar(50) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `diasfun` varchar(50) DEFAULT NULL,
  `abertura` varchar(50) DEFAULT NULL,
  `fechamento` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `views` varchar(50) DEFAULT NULL,
  `perfil` varchar(500) NOT NULL,
  `capa` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comercio`
--

INSERT INTO `comercio` (`id_comercio`, `nomecomercio`, `cnpj`, `categoria`, `rua`, `numero`, `bairro`, `lat`, `lng`, `telefone`, `diasfun`, `abertura`, `fechamento`, `id_usuario`, `views`, `perfil`, `capa`) VALUES
(36, 'Isa Fashion', '1234115562', 'roupa', 'Avenida Dom Pedro II', '1350', 'Jardim 3 Marias', -23.200010, -47.300320, '11999888777', 'SEG-SEX', '10:00', '19:00', 11, NULL, 'padrao.png', 'capa.jpg'),
(37, 'JM Celulares', '80.127.945/0001-08', 'support', 'Rodrigues Alves', '180', 'Centro', -23.203594, -47.289116, '(11) 48087-2552', 'SEG-DOM', '08:30', '17:00', 18, NULL, 'padrao.png', 'capa.jpg'),
(38, 'Material de ConstruÃ§Ã£o do AlemÃ£o', '53.816.968/0001-57', 'casa', 'Rua JosÃ© Revel', '80', 'Centro', -23.203388, -47.292873, '(11) 44074-3008', 'SEG-SAB', '07:00', '16:00', 16, '1', 'padrao.png', 'capa.jpg'),
(39, 'Guizaro Produtos Naturais & Suplementos', '22.008.121/0001-12', 'saude', 'Rua OlÃ¡vo Bilac', '31', 'Bela Vista', -23.195089, -47.293827, '(11) 63171-9856', 'QUI-DOM', '17:00', '03:00', 34, '1', 'padrao.png', 'capa.jpg'),
(40, 'Livraria Dr. Paulo', '82.952.969/0001-27', 'livro', 'Rua Joaquim Nabuco', '1243', 'Vila Teixeira', -23.199974, -47.303864, '(11) 40618-4097', 'SEG-SAB', '08:00', '18:00', 21, NULL, 'padrao.png', 'capa.jpg'),
(41, 'Templo JesuÃ­ta Pastor Kenai', '30.621.774/0001-09', 'outros', 'Rua Atibaia', '78', 'Jardim Marilia', -23.209103, -47.280380, '(11) 49327-9546', 'SEX-DOM', '16:00', '20:00', 27, NULL, 'padrao.png', 'capa.jpg'),
(42, 'Magazine Marilon', '27.374.889/0001-23', 'eletro', 'Rua 24 de Outubro', '133', 'Centro', -23.201490, -47.296314, '(11) 79312-8202', 'SEG-SAB', '08:00', '19:00', 23, NULL, 'padrao.png', 'capa.jpg'),
(43, 'Oficina do HenricÃ£o', '71.809.878/0001-10', 'mecanico', 'Rua Floriano Peixoto', '1022', 'Jardim Bandeirantes', -23.196434, -47.281693, '(11) 74359-8101', 'SEG-SEX', '08:00', '19:00', 22, NULL, 'padrao.png', 'capa.jpg'),
(44, 'Mercadinho do Felps', '64.358.829/0001-43', 'mercado', 'Rua BarÃ£o do Rio Branco', '653', 'Vila Henrique', -23.198391, -47.299370, '(11) 37112-4270', 'SEG-DOM', '08:00', '20:00', 26, NULL, 'padrao.png', 'capa.jpg'),
(35, 'Casa de RaÃ§Ã£o do ZÃ©', '53261488019999', 'pet', 'Rua das Tulipas', '143', 'Jardim Vermelho', -23.202900, -47.301579, '11998877665', 'SEG-SEX', '08:00', '18:00', 17, '138', '1.jpg', 'Consultor-Contador-Especializado-em-Casa-de-RaÃ§Ãµes.jpg'),
(45, 'Laras Bar', '53.016.968/0001-57', 'restaurante', 'Rua Henrique Viscardi', '540', 'Centro', -23.200182, -47.286541, '(11) 63171-9857', 'TER-DOM', '19:00', '01:00', 28, NULL, 'padrao.png', 'capa.jpg'),
(46, 'Almoxarifado TaperÃ¡', '60.127.945/0001-07', 'livro', 'Rua JosÃ© Roncoleta', '112', 'Centro', -23.198992, -47.292164, '(11) 45087-2111', 'SEG-SEX', '08:00', '18:00', 29, NULL, 'padrao.png', 'capa.jpg'),
(47, 'Fireball Bar', '42.008.121/0001-12', 'restaurante', 'Rua Bom Pastor', '214', 'Centro', -23.196514, -47.291813, '(11) 98187-2552', 'SEG-SAB', '17:00', '00:00', 31, NULL, 'padrao.png', 'capa.jpg'),
(48, 'Nova OpÃ§Ã£o Supermercado', '30.127.945/0001-08', 'mercado', 'Rua Monsenhor Couto', '314', 'Centro', -23.207838, -47.292927, '(11) 99171-9857', 'SEG-DOM', '08:00', '20:00', 32, NULL, 'padrao.png', 'capa.jpg'),
(49, 'Dias Spa', '22.008.121/0001-15', 'saude', 'Rua Turmalina', '93', 'Centro', -23.196444, -47.283291, '(11) 34612-4277', 'SEG-SAB', '08:00', '20:00', 33, NULL, 'padrao.png', 'capa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comercioi`
--

CREATE TABLE `comercioi` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comercioi`
--

INSERT INTO `comercioi` (`id`, `image`, `id_comercio`, `id_usuario`) VALUES
(22, '225.jpg', 35, 17),
(23, '1.jpg', 35, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `assunto` varchar(50) DEFAULT NULL,
  `menssagem` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfili`
--

CREATE TABLE `perfili` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfili`
--

INSERT INTO `perfili` (`id`, `image`, `id_comercio`, `id_usuario`) VALUES
(23, '', 0, 1),
(24, '', 0, 1),
(25, '', 0, 1),
(27, '', 0, 1),
(29, 'neymar.jpg', 32, 1),
(30, 'livro.png', 25, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `texto` varchar(1000) DEFAULT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id_post`, `image`, `titulo`, `texto`, `id_comercio`, `id_usuario`) VALUES
(7, 'canideos.jpg', 'PromoÃ§Ã£o em Brinquedos Caninos', 'Todos os brinquedos caninos com 15% de desconto no Pix e no DÃ©bito, promoÃ§Ã£o enquanto durarem os estoques!!', 35, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posti`
--

CREATE TABLE `posti` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posti`
--

INSERT INTO `posti` (`id`, `image`, `id_comercio`, `id_usuario`) VALUES
(8, '0ef2a360e2820613eb78872b4000ac41a.jpg', 32, 1),
(9, '66317.jpg', 32, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `sobrenome`, `email`, `senha`, `image`) VALUES
(11, 'Isabela', 'Do Carmo', 'isa@isa', '1234', 'padrao.png'),
(10, 'Giovana ', 'Gugel', 'gi@gi', '1234', '8df05c625340e410fedc575d615ce6156.jpg'),
(9, 'Julio', 'Cesar', 'neymar@neymar', '1234', 'neymar.jpg'),
(22, 'Henrique', 'Silva', 'henriquesilva@gmail.com', '1234', 'padrao.png'),
(21, 'Marcos', 'Paulo', 'marcospaulo@gmail.com', '1234', 'padrao.png'),
(20, 'JoÃ£o', 'Pedro', 'joaopedro@gmail.com', '1234', 'padrao.png'),
(19, 'JoÃ£o', 'Gomes', 'joaogomes@gmail.com', '1234', 'padrao.png'),
(16, 'Gabriel', 'Abiak', 'abiak@abiak', '1234', '5.gif'),
(17, 'Kennedy', 'Barreto', 'kennedy@gmail.com', 'baiano', 'padrao.png'),
(18, 'JoÃ£o', 'Marcelo', 'jm@hotmail.com', '12345', 'padrao.png'),
(23, 'Marlon', 'Henrique', 'marlonhenrique@gmail.com', '1234', 'padrao.png'),
(24, 'Antonio', 'Gomes', 'antoniogomes@gmail.com', '1234', 'padrao.png'),
(25, 'Caio', 'Zanqueta', 'caiozanqueta@gmail.com', '1234', 'padrao.png'),
(26, 'Felipe', 'Mendes', 'felipemendes@gmail.com', '1234', 'padrao.png'),
(27, 'Kevin', 'Ellionai', 'kenai@gmail.com', '1234', 'padrao.png'),
(28, 'Gabriel', 'Lara', 'gabriellara@gmail.com', '1234', 'padrao.png'),
(29, 'Heloisa', 'Serafim', 'helo@gmail.com', '1234', 'padrao.png'),
(30, 'Lucas', 'Mattos', 'lucasmattos@gmail.com', '1234', 'padrao.png'),
(31, 'Jaqueline', 'Silva', 'jaque@gmail.com', '1234', 'padrao.png'),
(32, 'Gabriele', 'Machado', 'gabim@hotmail.com', '1234', 'padrao.png'),
(33, 'Rodrigo', 'Dias', 'roddias@gmail.com', '1234', 'padrao.png'),
(34, 'Guilherme', 'Souza', 'guizauro@gmail.com', '1234', 'padrao.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioi`
--

CREATE TABLE `usuarioi` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarioi`
--

INSERT INTO `usuarioi` (`id`, `image`, `id_usuario`) VALUES
(1, 'padrao.png', 12),
(2, 'padrao.png', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viewstotal`
--

CREATE TABLE `viewstotal` (
  `id_views` int(11) NOT NULL,
  `views` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `viewstotal`
--

INSERT INTO `viewstotal` (`id_views`, `views`) VALUES
(1, '539');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `comentario_reportado`
--
ALTER TABLE `comentario_reportado`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id_comercio`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices para tabela `comercioi`
--
ALTER TABLE `comercioi`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices para tabela `perfili`
--
ALTER TABLE `perfili`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Índices para tabela `posti`
--
ALTER TABLE `posti`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `usuarioi`
--
ALTER TABLE `usuarioi`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `viewstotal`
--
ALTER TABLE `viewstotal`
  ADD PRIMARY KEY (`id_views`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `comentario_reportado`
--
ALTER TABLE `comentario_reportado`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id_comercio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `comercioi`
--
ALTER TABLE `comercioi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `perfili`
--
ALTER TABLE `perfili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `posti`
--
ALTER TABLE `posti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuarioi`
--
ALTER TABLE `usuarioi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `viewstotal`
--
ALTER TABLE `viewstotal`
  MODIFY `id_views` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
