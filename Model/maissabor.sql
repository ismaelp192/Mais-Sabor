-- MySQL Script generated by MySQL Workbench
-- ter 18 jun 2019 13:22:29 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- DATABASE maissabor
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `maissabor` ;

-- -----------------------------------------------------
-- DATABASE maissabor
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `maissabor` DEFAULT CHARACTER SET utf8 ;
USE `maissabor` ;

-- -----------------------------------------------------
-- Table `maissabor`.`tbUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbUsuario` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbUsuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `email` VARCHAR(65) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `image` longblob NULL,
  PRIMARY KEY (`idusuario`));


-- -----------------------------------------------------
-- Table `maissabor`.`tbMateria_prima`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbMateria_prima` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbMateria_prima` (
  `idmateria_prima` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_validade` DATE NOT NULL,
  `quantidade` DECIMAL(6,2) NOT NULL,
  `preco` DECIMAL(5,2) NOT NULL,
  `tipo_medida` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idmateria_prima`));


-- -----------------------------------------------------
-- Table `maissabor`.`tbGastos_extras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbGastos_extras` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbGastos_extras` (
  `idgastos_extras` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `quantidade` DECIMAL(6,2) NOT NULL,
  `valor` DECIMAL(5,2) NOT NULL,
  `tipo_medida` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgastos_extras`));


-- -----------------------------------------------------
-- Table `maissabor`.`tbCategoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbCategoria` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbCategoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`));


-- -----------------------------------------------------
-- Table `maissabor`.`tbReceita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbReceita` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbReceita` (
  `idreceita` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `valor_receita` DECIMAL(5,2) NOT NULL,
  `descricao` TEXT(100) NOT NULL,
  `lucro` INT NOT NULL,
  `valor_final` DECIMAL(5,2) NOT NULL,
  `tbCategoria_idcategoria` INT NOT NULL,
  PRIMARY KEY (`idreceita`),
  CONSTRAINT `fk_tbReceita_tbCategoria1`
    FOREIGN KEY (`tbCategoria_idcategoria`)
    REFERENCES `maissabor`.`tbCategoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `maissabor`.`tbReceita_has_tbMateria_Prima`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbReceita_has_tbMateria_Prima` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbReceita_has_tbMateria_Prima` (
  `tbMateria_prima_idmateria_prima` INT NOT NULL,
  `tbReceita_idreceita` INT NOT NULL,
  `quantidade` DECIMAL(6,2) NOT NULL,
  `preco` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`tbMateria_prima_idmateria_prima`, `tbReceita_idreceita`),
  CONSTRAINT `fk_tbMateria_prima_has_tbReceita_tbMateria_prima1`
    FOREIGN KEY (`tbMateria_prima_idmateria_prima`)
    REFERENCES `maissabor`.`tbMateria_prima` (`idmateria_prima`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tbMateria_prima_has_tbReceita_tbReceita1`
    FOREIGN KEY (`tbReceita_idreceita`)
    REFERENCES `maissabor`.`tbReceita` (`idreceita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `maissabor`.`tbReceita_has_tbGastos_extras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbReceita_has_tbGastos_extras` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbReceita_has_tbGastos_extras` (
  `tbReceita_idreceita` INT NOT NULL,
  `tbGastos_extras_idgastos_extras` INT NOT NULL,
  `tempo` DECIMAL(5,2) NOT NULL,
  `preco_gasto_extra` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`tbReceita_idreceita`, `tbGastos_extras_idgastos_extras`),
  CONSTRAINT `fk_tbReceita_has_tbGastos_extras_tbReceita1`
    FOREIGN KEY (`tbReceita_idreceita`)
    REFERENCES `maissabor`.`tbReceita` (`idreceita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tbReceita_has_tbGastos_extras_tbGastos_extras1`
    FOREIGN KEY (`tbGastos_extras_idgastos_extras`)
    REFERENCES `maissabor`.`tbGastos_extras` (`idgastos_extras`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `maissabor`.`tbUsuario_has_tbReceita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `maissabor`.`tbUsuario_has_tbReceita` ;

CREATE TABLE IF NOT EXISTS `maissabor`.`tbUsuario_has_tbReceita` (
  `tbUsuario_idusuario` INT NOT NULL,
  `tbReceita_idreceita` INT NOT NULL,
  `data` DATETIME NOT NULL,
  `acao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tbUsuario_idusuario`, `tbReceita_idreceita`),
  CONSTRAINT `fk_tbUsuario_has_tbReceita_tbUsuario1`
    FOREIGN KEY (`tbUsuario_idusuario`)
    REFERENCES `maissabor`.`tbUsuario` (`idusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tbUsuario_has_tbReceita_tbReceita1`
    FOREIGN KEY (`tbReceita_idreceita`)
    REFERENCES `maissabor`.`tbReceita` (`idreceita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


