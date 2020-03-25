-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2020 às 02:40
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `matricula` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `matricula`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `identidade` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `plano` varchar(10) NOT NULL,
  `pagamento` date NOT NULL,
  `ppagamento` date NOT NULL,
  `dferias` int(10) NOT NULL,
  `flagferias` int(10) NOT NULL,
  `dfisio` date NOT NULL,
  `hfisio` time NOT NULL,
  `digital` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `matricula`, `nome`, `identidade`, `cpf`, `endereco`, `plano`, `pagamento`, `ppagamento`, `dferias`, `flagferias`, `dfisio`, `hfisio`, `digital`) VALUES
(2, 10, 'Luiza Bartels de Oliveira', 'MG-14.827.337', '103.079.806-00', 'Travessa Cora Bartels, 14/16 - Manoel Honório - Juiz de Fora', 'Mensal', '2020-01-01', '2020-02-01', 0, 0, '2019-09-01', '15:00:00', 'A'),
(3, 11, 'Hanna Guimarães Santos', 'MG-11.222.333', '000.000.000-90', 'Rua das Flores, 22 - Centro - Juiz de Fora', 'Anual', '2020-03-16', '2021-03-16', 15, 1, '0000-00-00', '00:00:00', '00000'),
(4, 12, 'Marias das Dores Costa', 'BA-12.222.337', '111.222.333-99', 'Rua das Flores, 12 - Centro - Juiz de Fora', 'Mensal', '2020-03-16', '2020-04-15', 0, 0, '0000-00-00', '00:00:00', ''),
(8, 13, 'José da Costa', 'GO-14.872.733', '123.456.789-00', 'Rua das Flores, 13 - Centro - Juiz de Fora', 'Anual', '2020-04-23', '2021-05-23', 30, 1, '0000-00-00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `id` int(10) NOT NULL,
  `aula` varchar(100) NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  `dias` varchar(100) NOT NULL,
  `instrutor` varchar(100) NOT NULL,
  `sala` int(10) NOT NULL,
  `instrutores_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aula`
--

INSERT INTO `aula` (`id`, `aula`, `inicio`, `fim`, `dias`, `instrutor`, `sala`, `instrutores_id`) VALUES
(16, 'Natação', '18:00:00', '19:00:00', 'Segunda-Terça-Quarta-Quinta-Sexta', 'José das Couves', 1, 2),
(18, 'Muay Thai', '10:00:00', '11:00:00', 'Segunda-Quarta-Sexta', 'Luiza Bartels de Oliveira', 10, 15),
(21, 'Dança', '10:00:00', '11:00:00', 'Segunda', 'Luiza Bartels de Oliveira', 10, 15),
(25, 'Spinning', '17:00:00', '18:00:00', 'Segunda-Quarta-Sexta', 'José das Couves', 8, 2),
(32, 'Natação', '10:00:00', '11:00:00', 'Terça', 'Luiza Bartels de Oliveira', 1, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `data` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `etilismo` varchar(5) NOT NULL,
  `tabagismo` varchar(5) NOT NULL,
  `historico` text NOT NULL,
  `cirurgias` text NOT NULL,
  `queixas` text NOT NULL,
  `triceps` int(10) NOT NULL,
  `iliaca` int(10) NOT NULL,
  `peitoral` int(10) NOT NULL,
  `coxa` int(10) NOT NULL,
  `abdome` int(10) NOT NULL,
  `idade` int(10) NOT NULL,
  `repouso` int(10) NOT NULL,
  `exercicio` int(10) NOT NULL,
  `pressao` varchar(10) NOT NULL,
  `borg` int(10) NOT NULL,
  `relato` text NOT NULL,
  `laudo` text NOT NULL,
  `alunos_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `matricula`, `data`, `sexo`, `etilismo`, `tabagismo`, `historico`, `cirurgias`, `queixas`, `triceps`, `iliaca`, `peitoral`, `coxa`, `abdome`, `idade`, `repouso`, `exercicio`, `pressao`, `borg`, `relato`, `laudo`, `alunos_id`) VALUES
(3, 11, '2020-03-20', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 10, 10, 10, 10, 10, 10, 10, 10, '10', 10, 'teste', 'teste', 4),
(4, 10, '2020-03-20', 'F', 'Sim', 'Não', 'Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum ', 'Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum ', 'Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum ', 17, 4, 6, 20, 5, 27, 48, 200, '12/8', 10, 'Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum ', 'Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum Loren Ipsum ', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutores`
--

CREATE TABLE `instrutores` (
  `id` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `identidade` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `atividades` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instrutores`
--

INSERT INTO `instrutores` (`id`, `nome`, `identidade`, `cpf`, `atividades`) VALUES
(2, 'José das Couves', 'PE-11.222.333', '101.000.111-00', 'Natação'),
(15, 'Luiza Bartels de Oliveira', 'MG-14.827.337', '103.079.806-00', 'Muay Thai');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

CREATE TABLE `presenca` (
  `id` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `aula` varchar(255) NOT NULL,
  `inicio` time NOT NULL,
  `data` date NOT NULL,
  `alunos_id` int(10) NOT NULL,
  `aula_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`id`, `matricula`, `aula`, `inicio`, `data`, `alunos_id`, `aula_id`) VALUES
(16, 10, 'Natação', '10:00:00', '2020-03-20', 2, 32),
(17, 10, 'Natação', '18:00:00', '2020-03-20', 2, 32),
(18, 11, 'Spinning', '17:00:00', '2020-03-20', 3, 25),
(21, 10, 'Natação', '18:00:00', '2020-03-24', 2, 32),
(24, 10, 'Natação', '18:00:00', '2020-03-24', 2, 32),
(25, 10, 'Natação', '18:00:00', '2020-03-24', 2, 32),
(26, 10, 'Natação', '18:00:00', '2020-03-24', 2, 32);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aula_instrutores1_idx` (`instrutores_id`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avaliacao_alunos1_idx` (`alunos_id`);

--
-- Índices para tabela `instrutores`
--
ALTER TABLE `instrutores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_presenca_alunos1_idx` (`alunos_id`),
  ADD KEY `fk_presenca_aula1_idx` (`aula_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `instrutores`
--
ALTER TABLE `instrutores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `fk_aula_instrutores1` FOREIGN KEY (`instrutores_id`) REFERENCES `instrutores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_alunos1` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `fk_presenca_alunos1` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_presenca_aula1` FOREIGN KEY (`aula_id`) REFERENCES `aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
