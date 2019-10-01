-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2019 às 05:06
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maissabor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idcategoria` int(11) NOT NULL,
  `nome_categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idcategoria`, `nome_categoria`) VALUES
(1, 'Paes');
INSERT INTO `tbcategoria` (`idcategoria`, `nome_categoria`) VALUES
(2, 'Fritura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgastos_extras`
--

CREATE TABLE `tbgastos_extras` (
  `idgastos_extras` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `quantidade` decimal(6,2) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `tipo_medida` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbgastos_extras` (`idgastos_extras`, `nome`, `quantidade`, `valor`, `tipo_medida`) VALUES
(1, 'Eletricidade', 1, 5, 'hora(s)');
INSERT INTO `tbgastos_extras` (`idgastos_extras`, `nome`, `quantidade`, `valor`, `tipo_medida`) VALUES
(2, 'Agua', 10, 2, 'litro(s)');
-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmateria_prima`
--

CREATE TABLE `tbmateria_prima` (
  `idmateria_prima` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_validade` date NOT NULL,
  `quantidade` decimal(6,2) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `tipo_medida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbmateria_prima` (`idmateria_prima`, `nome`, `data_validade`, `quantidade`, `preco`, `tipo_medida`) VALUES
(1, 'Farinha', '2019-09-30', 10, 2, 'litro(s)');
INSERT INTO `tbmateria_prima` (`idmateria_prima`, `nome`, `data_validade`, `quantidade`, `preco`, `tipo_medida`) VALUES
(2, 'Ovo', '2019-10-01', 3, 1, 'quilo(s)');
-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreceita`
--

CREATE TABLE `tbreceita` (
  `idreceita` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `valor_receita` decimal(5,2) NOT NULL,
  `preparo` text NOT NULL,
  `lucro` int(11) NOT NULL,
  `valor_final` decimal(5,2) NOT NULL,
  `tbCategoria_idcategoria` int(11) NOT NULL,
  `image` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreceita_has_tbgastos_extras`
--

CREATE TABLE `tbreceita_has_tbgastos_extras` (
  `tbReceita_idreceita` int(11) NOT NULL,
  `tbGastos_extras_idgastos_extras` int(11) NOT NULL,
  `quantidade` decimal(5,2) NOT NULL,
  `preco_gasto_extra` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreceita_has_tbmateria_prima`
--

CREATE TABLE `tbreceita_has_tbmateria_prima` (
  `tbMateria_prima_idmateria_prima` int(11) NOT NULL,
  `tbReceita_idreceita` int(11) NOT NULL,
  `quantidade` decimal(6,2) NOT NULL,
  `preco` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(65) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `image` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idusuario`, `nome`, `login`, `email`, `senha`, `tipo`, `image`) VALUES
(1, 'Administrador', 'admin', 'admin@admin.com', 'admin', 'Administrador','usr_img/default_user.png');


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario_has_tbreceita`
--

CREATE TABLE `tbusuario_has_tbreceita` (
  `tbUsuario_idusuario` int(11) NOT NULL,
  `tbReceita_idreceita` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `acao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `tbgastos_extras`
--
ALTER TABLE `tbgastos_extras`
  ADD PRIMARY KEY (`idgastos_extras`);

--
-- Indexes for table `tbmateria_prima`
--
ALTER TABLE `tbmateria_prima`
  ADD PRIMARY KEY (`idmateria_prima`);

--
-- Indexes for table `tbreceita`
--
ALTER TABLE `tbreceita`
  ADD PRIMARY KEY (`idreceita`),
  ADD KEY `fk_tbReceita_tbCategoria1` (`tbCategoria_idcategoria`);

--
-- Indexes for table `tbreceita_has_tbgastos_extras`
--
ALTER TABLE `tbreceita_has_tbgastos_extras`
  ADD PRIMARY KEY (`tbReceita_idreceita`,`tbGastos_extras_idgastos_extras`),
  ADD KEY `fk_tbReceita_has_tbGastos_extras_tbGastos_extras1` (`tbGastos_extras_idgastos_extras`);

--
-- Indexes for table `tbreceita_has_tbmateria_prima`
--
ALTER TABLE `tbreceita_has_tbmateria_prima`
  ADD PRIMARY KEY (`tbMateria_prima_idmateria_prima`,`tbReceita_idreceita`),
  ADD KEY `fk_tbMateria_prima_has_tbReceita_tbReceita1` (`tbReceita_idreceita`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `tbusuario_has_tbreceita`
--
ALTER TABLE `tbusuario_has_tbreceita`
  ADD PRIMARY KEY (`tbUsuario_idusuario`,`tbReceita_idreceita`),
  ADD KEY `fk_tbUsuario_has_tbReceita_tbReceita1` (`tbReceita_idreceita`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbgastos_extras`
--
ALTER TABLE `tbgastos_extras`
  MODIFY `idgastos_extras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbmateria_prima`
--
ALTER TABLE `tbmateria_prima`
  MODIFY `idmateria_prima` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbreceita`
--
ALTER TABLE `tbreceita`
  MODIFY `idreceita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbreceita`
--
ALTER TABLE `tbreceita`
  ADD CONSTRAINT `fk_tbReceita_tbCategoria1` FOREIGN KEY (`tbCategoria_idcategoria`) REFERENCES `tbcategoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbreceita_has_tbgastos_extras`
--
ALTER TABLE `tbreceita_has_tbgastos_extras`
  ADD CONSTRAINT `fk_tbReceita_has_tbGastos_extras_tbGastos_extras1` FOREIGN KEY (`tbGastos_extras_idgastos_extras`) REFERENCES `tbgastos_extras` (`idgastos_extras`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbReceita_has_tbGastos_extras_tbReceita1` FOREIGN KEY (`tbReceita_idreceita`) REFERENCES `tbreceita` (`idreceita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbreceita_has_tbmateria_prima`
--
ALTER TABLE `tbreceita_has_tbmateria_prima`
  ADD CONSTRAINT `fk_tbMateria_prima_has_tbReceita_tbMateria_prima1` FOREIGN KEY (`tbMateria_prima_idmateria_prima`) REFERENCES `tbmateria_prima` (`idmateria_prima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbMateria_prima_has_tbReceita_tbReceita1` FOREIGN KEY (`tbReceita_idreceita`) REFERENCES `tbreceita` (`idreceita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbusuario_has_tbreceita`
--
ALTER TABLE `tbusuario_has_tbreceita`
  ADD CONSTRAINT `fk_tbUsuario_has_tbReceita_tbReceita1` FOREIGN KEY (`tbReceita_idreceita`) REFERENCES `tbreceita` (`idreceita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbUsuario_has_tbReceita_tbUsuario1` FOREIGN KEY (`tbUsuario_idusuario`) REFERENCES `tbusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
