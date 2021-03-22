-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Mar-2021 às 03:30
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_formulario_sms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acessos_funcionarios`
--

CREATE TABLE `tb_acessos_funcionarios` (
  `nome_funcionario` varchar(50) NOT NULL,
  `funcional` char(7) NOT NULL,
  `email_funcionario` varchar(30) NOT NULL,
  `cargo_funcionario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_acessos_funcionarios`
--

INSERT INTO `tb_acessos_funcionarios` (`nome_funcionario`, `funcional`, `email_funcionario`, `cargo_funcionario`) VALUES
('Bruno Guimarães', '1234567', 'bgpineiro@hotmail.com', 'estagiário'),
('Henrique', '7654321', 'henrique@bradesco.com', 'analista junior');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_solicitacoes`
--

CREATE TABLE `tb_solicitacoes` (
  `id_solicitacao` int(11) NOT NULL,
  `funcional_funcionario` char(7) NOT NULL,
  `nome_evento` varchar(30) NOT NULL,
  `local_evento` varchar(50) NOT NULL,
  `data_disparo` date NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `filial` varchar(15) NOT NULL,
  `meses_q` int(2) NOT NULL,
  `meses_aq` int(2) NOT NULL,
  `celulares_adicionais` varchar(200) NOT NULL,
  `fraseologia` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_acessos_funcionarios`
--
ALTER TABLE `tb_acessos_funcionarios`
  ADD PRIMARY KEY (`funcional`),
  ADD UNIQUE KEY `funcional` (`funcional`);

--
-- Índices para tabela `tb_solicitacoes`
--
ALTER TABLE `tb_solicitacoes`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `fk_solicitacoes_acessos` (`funcional_funcionario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_solicitacoes`
--
ALTER TABLE `tb_solicitacoes`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_solicitacoes`
--
ALTER TABLE `tb_solicitacoes`
  ADD CONSTRAINT `fk_solicitacoes_acessos` FOREIGN KEY (`funcional_funcionario`) REFERENCES `tb_acessos_funcionarios` (`funcional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
