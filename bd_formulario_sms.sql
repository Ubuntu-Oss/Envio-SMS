-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02-Abr-2021 às 19:01
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
  `cargo_funcionario` varchar(30) NOT NULL,
  `permissao` char(3) NOT NULL DEFAULT 'nao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_acessos_funcionarios`
--

INSERT INTO `tb_acessos_funcionarios` (`nome_funcionario`, `funcional`, `email_funcionario`, `cargo_funcionario`, `permissao`) VALUES
('Bruno Guimarães', '1234567', 'bgpineiro@hotmail.com', 'estagiário', 'sim'),
('Henrique', '1472583', 'henrique@bradesco.com.br', 'analista junior', 'sim'),
('Matheus Turatti', '7654321', 'henrique@bradesco.com', 'analista junior', 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_producao`
--

CREATE TABLE `tb_producao` (
  `contrato` char(10) NOT NULL,
  `data_contrato` date NOT NULL,
  `cpf_cliente` char(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `filial` int(4) NOT NULL,
  `celular` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_producao`
--

INSERT INTO `tb_producao` (`contrato`, `data_contrato`, `cpf_cliente`, `nome_cliente`, `filial`, `celular`) VALUES
('0123564359', '2022-01-12', '07345678911', 'Mariana da Silva', 500, '11976745678'),
('0123456775', '2021-08-29', '10895678911', 'Juliana Afonso', 300, '11998045678'),
('0124556657', '2021-10-30', '12344778911', 'Maria Dantas', 100, '11912345536'),
('0123455539', '2021-12-13', '12345453811', 'Kleber Pacheco', 200, '11979745678'),
('0123456767', '2021-12-06', '12345564911', 'Francisco Alberto', 300, '11997645678'),
('0156756789', '2019-10-30', '12345670891', 'Henrique Pineiro', 200, '11978945558'),
('0123456423', '2022-02-22', '12345670981', 'José Sebastiao', 400, '11972345678'),
('0123454329', '2021-10-11', '12345675841', 'Augusto Vergara', 200, '11976541678'),
('0123456242', '2020-12-14', '12345676781', 'Agata Lira', 400, '11912345678'),
('0111256789', '2020-01-24', '12345678901', 'Rafael Messias', 200, '11944545678'),
('0123456789', '2020-12-30', '12345678911', 'Joao Inacio', 100, '11912345678'),
('0123456546', '2022-04-25', '12345698011', 'Vinicius Reis', 300, '11999945678'),
('0123456565', '2019-08-20', '12345976911', 'Pedro Delari', 400, '11998345678'),
('0123456876', '2020-07-17', '12349978911', 'Roberta Silva', 100, '11912345678'),
('0123421980', '2020-01-25', '12354678911', 'Flavia Bastos', 100, '11945345678'),
('0123454569', '2021-12-07', '14365678911', 'Victor da Costa', 500, '11987845678'),
('0234345679', '2020-04-11', '19075678911', 'Marina Simoes', 400, '11979045678'),
('0123445329', '2021-05-14', '56945678911', 'Stephanie Souza', 500, '11977845678'),
('0123465479', '2020-10-21', '65345678911', 'Ana Julia Menezes', 500, '11978945678'),
('0122453543', '2020-07-23', '67855678911', 'Rodrigo Silveira', 100, '11955645678'),
('0123455439', '2021-10-27', '78445678911', 'Gabriela Oliveira', 500, '11977745678'),
('0124596657', '2021-10-30', '89344778911', 'Maria Dantas', 100, '11912345536'),
('3454567893', '2019-10-28', '89345678911', 'Rodrigo Salatiel', 300, '11997545678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_solicitacoes`
--

CREATE TABLE `tb_solicitacoes` (
  `id_solicitacao` int(6) NOT NULL,
  `feito` char(3) NOT NULL DEFAULT 'nao',
  `funcional_funcionario` char(7) NOT NULL,
  `nome_evento` varchar(26) NOT NULL,
  `local_evento` varchar(32) NOT NULL,
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
-- Extraindo dados da tabela `tb_solicitacoes`
--

INSERT INTO `tb_solicitacoes` (`id_solicitacao`, `feito`, `funcional_funcionario`, `nome_evento`, `local_evento`, `data_disparo`, `data_inicial`, `data_final`, `filial`, `meses_q`, `meses_aq`, `celulares_adicionais`, `fraseologia`) VALUES
(1, 'sim', '1234567', 'Mega feirao Osasco', 'Shopping Osasco Plaza', '2021-03-31', '2021-04-01', '2021-04-02', '100,200,300', 24, 12, '11999999999,11888888888,11777777777', 'Bradesco Financiamentos: Confira nossas condições no(a) Mega feirao Osasco, de 01/04 a 02/04 no(a) Shopping Osasco Plaza. P/ cancelar envie 1'),
(2, 'sim', '1234567', 'Feirao de seminovos', 'Auto Shopping', '2021-03-31', '2021-04-01', '2021-04-02', '123,400,200,325', 24, 24, '11123123123,11321321321,11333333333', 'Bradesco Financiamentos: Confira nossas condições no(a) Feirao de seminovos, de 01/04 a 02/04 no(a) Auto Shopping. P/ cancelar envie 1'),
(3, 'sim', '1234567', 'Teste', 'Teste', '2021-04-02', '2021-04-03', '2021-04-03', '100,200', 12, 12, '', 'Bradesco Financiamentos: Confira nossas condições no(a) Teste, dia 03/04 no(a) Teste. P/ cancelar envie 1'),
(4, 'sim', '1234567', 'Mega feirão de usados', 'Shopping Internacional Guarulhos', '2021-04-02', '2021-04-03', '2021-04-04', '100,200', 24, 6, '11977777777,11988888888,1177777725', 'Bradesco Financiamentos: Confira nossas condições no(a) Mega feirão de usados, de 03/04 a 04/04 no(a) Shopping Internacional Guarulhos. P/ cancelar envie 1');

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
-- Índices para tabela `tb_producao`
--
ALTER TABLE `tb_producao`
  ADD PRIMARY KEY (`cpf_cliente`),
  ADD UNIQUE KEY `contrato` (`contrato`);

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
  MODIFY `id_solicitacao` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
