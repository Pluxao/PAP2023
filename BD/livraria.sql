-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Abr-2023 às 04:49
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `baixados`
--

DROP TABLE IF EXISTS `baixados`;
CREATE TABLE IF NOT EXISTS `baixados` (
  `identificador` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `nome_baixado` varchar(255) NOT NULL,
  `titulo_baixado` varchar(250) NOT NULL,
  `cod_baixado` int(11) NOT NULL,
  `disponibilidade_baixado` varchar(100) NOT NULL,
  `preco_baixado` float NOT NULL,
  `hora_baixado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`identificador`),
  KEY `FK_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `baixados`
--

INSERT INTO `baixados` (`identificador`, `iduser`, `nome_baixado`, `titulo_baixado`, `cod_baixado`, `disponibilidade_baixado`, `preco_baixado`, `hora_baixado`) VALUES
(1, 11, '63f62fe4c2fb7.pdf', 'As Aventuras de Ngunga', 23, 'Pago', 13900, '2023-02-27 11:38:23'),
(2, 11, '63f62a6edcf9c.pdf', 'Predadores', 22, 'Pago', 12500, '2023-02-27 12:07:59'),
(3, 11, '63f62a6edcf9c.pdf', 'Predadores', 22, 'Pago', 12500, '2023-01-01 12:30:40'),
(4, 11, '63f62a6edcf9c.pdf', 'Predadores', 22, 'Pago', 12500, '2023-03-27 12:44:11'),
(5, 11, '63f62fe4c2fb7.pdf', 'As Aventuras de Ngunga', 23, 'Pago', 13900, '2023-03-02 13:37:53'),
(6, 11, '63f60e4c7526a.pdf', 'O Pacto do Namorado Bilionario', 21, 'Grátis', 0, '2023-01-27 13:54:02'),
(7, 11, '63f4b31bd2092.pdf', 'Língua Portuguesa', 20, 'Grátis', 0, '2023-03-27 13:54:10'),
(8, 11, '63dc30537ded8.pdf', 'A Armadilha Do Namorado Bilionário ', 15, 'Grátis', 0, '2023-03-19 13:54:19'),
(9, 11, '63dc30537ded8.pdf', 'A Armadilha Do Namorado Bilionário ', 15, 'Grátis', 0, '2023-02-27 13:54:29'),
(10, 11, '63dc30537ded8.pdf', 'A Armadilha Do Namorado Bilionário ', 15, 'Grátis', 0, '2023-02-27 13:54:29'),
(11, 11, '63dc30537ded8.pdf', 'A Armadilha Do Namorado Bilionário ', 15, 'Grátis', 0, '2023-03-20 13:54:30'),
(12, 11, '63f4b31bd2092.pdf', 'Língua Portuguesa', 20, 'Grátis', 0, '2023-03-27 13:55:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatbot`
--

DROP TABLE IF EXISTS `chatbot`;
CREATE TABLE IF NOT EXISTS `chatbot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queries` varchar(1000) NOT NULL,
  `replies` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'Oi|Olá', 'Olá, como está?'),
(2, 'Como estás?|Como está?', 'Eu estou bem, obrigado por perguntar. Como posso ajudar-lhe hoje?'),
(3, 'Esqueci a minha senha, como posso recuperar|Como posso recuperar a minha senha?|É possível recuperar a senha?', 'Para recuperar a senha clique em recuperar senha na tela de login, serás redirecionado em uma página onde precisarás colocar o seu nome de utilizador e o seu email. Se os dois estiverem vinculados a tua conta aparecerá uma página onde colocarás a nova senha. Mais alguma coisa?\r\n'),
(4, 'Qual é o teu nome?| Como te chamas?|Teu nome?', 'O meu nome é Loongoka Robô, Prazer.\r\n'),
(5, 'Quem és tu?| O que és?| És uma robô?', 'Eu sou a Loongoka Robô, um chatbot criado para dar suporte aos utilizadores deste sistema.\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_post` int(11) NOT NULL,
  `comentador` int(11) NOT NULL,
  `comentario` varchar(900) NOT NULL,
  `data_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `FK_cod_post` (`cod_post`),
  KEY `FK_comentador` (`comentador`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `cod_post`, `comentador`, `comentario`, `data_comentario`) VALUES
(1, 1, 24, 'Primeiro comentário\r\n', '2023-02-01 08:27:18'),
(3, 2, 24, 'Segundo Teste', '2023-02-20 08:25:43'),
(4, 1, 12, 'Eu acho que ler online causa distração.\r\n', '2023-02-20 08:25:43'),
(5, 1, 11, 'Comentário', '2023-02-20 08:25:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `livro` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `editora` varchar(255) NOT NULL,
  `edicao` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL DEFAULT 'Sem classe',
  `data_lancamento` year(4) NOT NULL,
  `cadastrador` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `livro_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_livro` varchar(255) NOT NULL,
  `disponibilidade` varchar(20) NOT NULL DEFAULT 'Grátis',
  `preco` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod`),
  KEY `cadastrador` (`cadastrador`),
  KEY `FK_cod_categoria` (`cod_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`cod`, `livro`, `titulo`, `editora`, `edicao`, `classe`, `data_lancamento`, `cadastrador`, `cod_categoria`, `livro_criado`, `img_livro`, `disponibilidade`, `preco`) VALUES
(1, '63bc1aa2ad531.pdf', 'Matemática', 'Ministério da Educação', '1ª Edição', '4ª Classe', 2021, 11, 1, '2023-01-09 13:46:10', '63bc1aa2ad27e.png', 'Grátis', 0),
(2, '63bc2c81522a3.pdf', 'Educação Musical', 'Editora Popular', '1ª Edição', '3ª Classe', 2021, 11, 1, '2023-01-09 15:02:25', '63bc2c8151ffb.png', 'Grátis', 0),
(3, '63bc81a4c7604.pdf', 'O Filho Rico', 'Editora Intrinseca', 'Edição Única', 'Sem classe', 2022, 14, 5, '2023-01-09 21:05:40', '63bc81a4c7315.png', 'Grátis', 0),
(4, '63bc860dbe625.pdf', 'Educação Moral e Cívica', 'Progresso Editora', '1ª Edição', '5ª Classe', 2021, 14, 1, '2023-01-09 21:24:29', '63bc860dbe325.png', 'Grátis', 0),
(5, '63d93c22571fc.pdf', 'Matemática', 'Editora Moderna', '1ª Edição', '2ª Classe', 2018, 11, 1, '2023-01-31 16:04:50', '63d93c2249cf0.png', 'Grátis', 0),
(6, '63d947f487182.pdf', 'Educação Manual E Plástica', 'Editora Popular', '1ª Edição', '2ª Classe', 2021, 11, 1, '2023-01-31 16:55:16', '63d947f486ceb.png', 'Grátis', 0),
(7, '63d9569594c96.pdf', 'A Única Coisa', 'Luiz Vasconcelos', '1ª Edição', 'Sem classe', 2014, 11, 4, '2023-01-31 17:57:41', '63d95695947ad.png', 'Grátis', 0),
(8, '63d96bd52bccf.pdf', 'A proposta do namorado Bilionário', 'Kendra Little', 'Vol. 2', 'Sem classe', 2014, 11, 3, '2023-01-31 19:28:21', '63d96bd52b6b5.png', 'Grátis', 0),
(9, '63dc29345951b.pdf', 'Ciência da Natureza', 'Texto Editores, Lda', '2ª Edição', '5ª Classe', 2021, 11, 1, '2023-02-02 21:20:52', '63dc29345444f.png', 'Grátis', 0),
(10, '63dc29d93c0ec.pdf', 'Ciência da Natureza', 'Tangente MB', '1ª Edição', '6ª Classe', 2021, 11, 1, '2023-02-02 21:23:37', '63dc29d9371a3.png', 'Grátis', 0),
(11, '63dc2af0501b8.pdf', 'Estudo do Meio', 'Editora das Letras, S.A.', '1ª Edição', '1ª Classe', 2018, 11, 1, '2023-02-02 21:28:16', '63dc2af04f9cf.png', 'Grátis', 0),
(12, '63dc2c2013e45.pdf', 'Estudo do Meio', 'Editora das Letras', '1ª Edição', '2ª Classe', 2021, 11, 1, '2023-02-02 21:33:20', '63dc2c20136cf.png', 'Grátis', 0),
(13, '63dc2cc5ab7d0.pdf', 'Estudo do Meio', 'Progresso Editora', '1ª Edição', '3ª Classe', 2021, 11, 1, '2023-02-02 21:36:05', '63dc2cc5a830e.png', 'Grátis', 0),
(14, '63dc2d23bf073.pdf', 'Estudo do Meio', 'Tangente MB', '1ª Edição', '4ª Classe', 2021, 11, 1, '2023-02-02 21:37:39', '63dc2d23bbdeb.png', 'Grátis', 0),
(15, '63dc30537ded8.pdf', 'A Armadilha Do Namorado Bilionário ', 'Kendra Little', 'Vol. 1', 'Sem classe', 2014, 11, 3, '2023-02-02 21:51:15', '63dc30537d5ba.png', 'Grátis', 0),
(16, '63e23a0ca0783.pdf', 'Geografia', 'Mensagem Editora', '3ª Edição', '5ª Classe', 2021, 11, 1, '2023-02-07 11:46:20', '63e23a0ca030f.png', 'Grátis', 0),
(17, '63f4b31bd2092.pdf', 'Língua Portuguesa', 'Editora Moderna', '1ª Edição', '6ª Classe', 2021, 11, 1, '2023-02-21 12:03:39', '63f4b31bd17a6.png', 'Grátis', 0),
(18, '63f60e4c7526a.pdf', 'O Pacto do Namorado Bilionario', 'Kendra Little', 'Vol. 3', 'Sem classe', 2015, 11, 3, '2023-02-22 12:45:00', '63f60e4c74cfe.png', 'Grátis', 0),
(19, '63f62a6edcf9c.pdf', 'Predadores', 'Pepetela', 'Edição Única', 'Sem classe', 2005, 11, 3, '2023-02-22 14:45:02', '63f62a6edcad4.png', 'Pago', 12500),
(20, '63f62fe4c2fb7.pdf', 'As Aventuras de Ngunga', 'Pepetela', 'Edição Única', 'Sem classe', 2002, 11, 10, '2023-02-22 15:08:20', '63f62fe4c2ad6.png', 'Pago', 13900);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros_categorias`
--

DROP TABLE IF EXISTS `livros_categorias`;
CREATE TABLE IF NOT EXISTS `livros_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(255) NOT NULL,
  `criado_categoria` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cadastrador_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `cadastrador_categoria` (`cadastrador_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros_categorias`
--

INSERT INTO `livros_categorias` (`id_categoria`, `nome_categoria`, `criado_categoria`, `cadastrador_categoria`) VALUES
(1, 'Manuais Escolares', '2023-01-08 14:18:56', 11),
(3, 'Poesia e Romance', '2023-01-08 15:39:17', 11),
(4, 'Motivação e Foco', '2023-01-09 21:43:33', 11),
(5, 'Economia', '2023-01-09 22:03:15', 11),
(10, 'Ficção Histórica', '2023-02-22 16:03:48', 11),
(11, 'Ficção Científica', '2023-02-22 16:04:25', 11),
(12, 'Livros Religiosos', '2023-03-31 08:01:52', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `img_post` varchar(255) NOT NULL,
  `titulo_post` varchar(255) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `data_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postador` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `FK_postador` (`postador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `img_post`, `titulo_post`, `post`, `data_post`, `postador`) VALUES
(1, '63c6b3d342a78.jpg', 'Porquê Ler Online? ', 'Ao ler online, o estudante tem a possibilidade de fazer pesquisas adicionais ao mesmo tempo que lê.\r\nPode tirar o máximo proveito da leitura por fazer pesquisas de termos difíceis, imagens, datas e muito mais...', '2023-01-17 14:42:27', 11),
(2, '63c9085a7e7a0.jpg', 'Porquê Ler?', 'Ler estimula o raciocínio, ativa o cérebro, aumenta a imaginação, melhora o vocabulário, desenvolve o pensamento crítico, combate o estresse, dá um gás motivacional, amplia criatividade, estimula a capacidade de concentração e o leitor transforma a sua escrita.', '2023-01-19 09:07:38', 11),
(4, '63ee1edd64d17.png', 'Loongoka', 'O LOONGOKA é um ambiente virtual destinada ao auxílio dos alunos, jovens e crianças na obtenção de materiais didáticos para a aprendizagem dos conteúdos programáticos do currículo do Ensino Primário e do Iº. Ciclo do Ensino Secundário bem como também diversos livros que servem de ajuda no âmbito académico e investigativo.', '2023-02-16 12:17:33', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pnome` varchar(50) NOT NULL,
  `unome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` bigint(14) NOT NULL,
  `nasc` date NOT NULL,
  `genero` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `confsenha` varchar(32) NOT NULL,
  `estado` varchar(30) DEFAULT 'Utilizador',
  `datacad` datetime DEFAULT CURRENT_TIMESTAMP,
  `imagem_perfil` varchar(255) NOT NULL DEFAULT 'predefinido.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pnome`, `unome`, `email`, `telefone`, `nasc`, `genero`, `senha`, `confsenha`, `estado`, `datacad`, `imagem_perfil`) VALUES
(11, 'Abel0207', 'Abel', 'Canas', 'abelcanas92@gmail.com', 911872114, '2003-07-02', 'Masculino', '3a9805e668f25f61707342231c04e303', '3a9805e668f25f61707342231c04e303', 'Admin', '2022-12-08 23:38:21', '63dac54d6d8a2.jpeg'),
(12, 'Domingos16', 'Domingos', 'Canas', 'domingos92@gmail.com', 947111290, '2006-03-10', 'Masculino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Utilizador', '2022-12-08 23:38:21', '63f50bee4d2c5.jpeg'),
(13, 'Vanda10', 'Vanda', 'Lopes', 'vadalpes@gmail.com', 911111118, '2000-10-01', 'Femenino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Utilizador', '2022-12-08 23:38:21', 'predefinido.png'),
(14, 'Santos905', 'Santos', 'Francisco', 'santosrricardo905@gmail.com', 926476947, '2002-05-18', 'Masculino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2022-12-08 23:38:21', '63eb9859b8ee0.jpg'),
(15, 'Sansão11', 'Sansão', 'Canas', 'sansaonkcanas111@gmail.com', 913133144, '2000-10-12', 'Masculino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2022-12-08 23:38:21', 'predefinido.png'),
(16, 'Carlos10', 'Carlos', 'Domingos', 'carlosdomingos17@gmail.com', 909876543, '2000-07-02', 'Masculino', '5e8667a439c68f5145dd2fcbecf02209', '5e8667a439c68f5145dd2fcbecf02209', 'Utilizador', '2022-12-08 23:38:21', 'predefinido.png'),
(17, 'Nayara11', 'Nayara', 'Pascoal', 'pascoalnayara12@gmail.com', 911111118, '2000-10-01', 'Femenino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Utilizador', '2022-12-08 23:38:21', 'predefinido.png'),
(21, 'andre12', 'André', 'Malau', 'andremalau12@gmail.com', 911872114, '2022-12-01', 'Masculino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Utilizador', '2022-12-08 23:38:21', 'predefinido.png'),
(22, 'Forever3', 'DNA', 'Forever', 'dnaforever@gmail.com', 911872114, '2004-01-08', 'Masculino', '3a9805e668f25f61707342231c04e303', '3a9805e668f25f61707342231c04e303', 'Utilizador', '2022-12-08 23:38:21', 'predefinido.png'),
(23, 'Nzola012', 'Nzola', 'Kiampava', 'Nzolakiampava@gmail.com', 947111290, '2001-02-09', 'Masculino', '3a9805e668f25f61707342231c04e303', '3a9805e668f25f61707342231c04e303', 'Utilizador', '2022-12-08 23:45:59', 'predefinido.png'),
(24, 's123', 'Neemias', 'Silva', 'neemias123@gmail.com', 914141211, '2004-01-01', 'Masculino', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', 'Utilizador', '2023-02-01 10:25:45', 'predefinido.png'),
(25, 'Adilson@10', 'Adilson', 'Carlos', 'carlosadilson1814@gmail.com', 931179700, '2002-02-15', 'Masculino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Utilizador', '2023-02-21 12:32:45', 'predefinido.png'),
(26, 'António12', 'António', 'Canas', 'antoniocanas@gmail.com', 933221037, '1962-01-01', 'Masculino', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'Utilizador', '2023-02-21 16:04:10', 'predefinido.png'),
(27, 'António11', 'António', 'Canas', 'antoniocanas11@gmail.com', 933221037, '1962-01-01', 'Masculino', '6512bd43d9caa6e02c990b0a82652dca', '6512bd43d9caa6e02c990b0a82652dca', 'Utilizador', '2023-02-21 16:07:35', 'predefinido.png');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `baixados`
--
ALTER TABLE `baixados`
  ADD CONSTRAINT `FK_iduser` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `baixados_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_cod_post` FOREIGN KEY (`cod_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comentador` FOREIGN KEY (`comentador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`comentador`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`cod_post`) REFERENCES `posts` (`id_post`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `FK_cod_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `livros_categorias` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`cadastrador`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `livros_ibfk_2` FOREIGN KEY (`cod_categoria`) REFERENCES `livros_categorias` (`id_categoria`);

--
-- Limitadores para a tabela `livros_categorias`
--
ALTER TABLE `livros_categorias`
  ADD CONSTRAINT `livros_categorias_ibfk_1` FOREIGN KEY (`cadastrador_categoria`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_postador` FOREIGN KEY (`postador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`postador`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
