-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produto_categoria_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `mydb`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`modelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`modelo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(150) NOT NULL,
  `tamanho` VARCHAR(4) NOT NULL,
  `marca` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`camiseta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`camiseta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `modelo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_camiseta_modelo_idx` (`modelo_id` ASC),
  CONSTRAINT `fk_camiseta_modelo`
    FOREIGN KEY (`modelo_id`)
    REFERENCES `mydb`.`modelo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pessoa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cadastro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(15) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cadastro_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_cadastro_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `mydb`.`pessoa` (`id`) 
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`mercadoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`mercadoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `numerodeserie` VARCHAR(150) NOT NULL,
  `validade` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`deposito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`deposito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(150) NOT NULL,
  `quantidade` VARCHAR(150) NOT NULL,
  `mercadoria_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_deposito_mercadoria1_idx` (`mercadoria_id` ASC),
  CONSTRAINT `fk_deposito_mercadoria1`
    FOREIGN KEY (`mercadoria_id`)
    REFERENCES `mydb`.`mercadoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`decoracao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`decoracao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(150) NOT NULL,
  `cobertura` VARCHAR(150) NOT NULL,
  `fruta` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bolo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`bolo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sabor` VARCHAR(150) NOT NULL,
  `tamanho` VARCHAR(150) NOT NULL,
  `valor` VARCHAR(150) NOT NULL,
  `decoracao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bolo_decoracao1_idx` (`decoracao_id` ASC),
  CONSTRAINT `fk_bolo_decoracao1`
    FOREIGN KEY (`decoracao_id`)
    REFERENCES `mydb`.`decoracao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;