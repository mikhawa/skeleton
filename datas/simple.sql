-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema skel_01
-- -----------------------------------------------------
-- skel_01
DROP SCHEMA IF EXISTS `skel_01` ;

-- -----------------------------------------------------
-- Schema skel_01
--
-- skel_01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `skel_01` DEFAULT CHARACTER SET utf8 ;
USE `skel_01` ;

-- -----------------------------------------------------
-- Table `skel_01`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skel_01`.`users` ;

CREATE TABLE IF NOT EXISTS `skel_01`.`users` (
  `idusers` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `login_UNIQUE` ON `skel_01`.`users` (`login` ASC);


-- -----------------------------------------------------
-- Table `skel_01`.`articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skel_01`.`articles` ;

CREATE TABLE IF NOT EXISTS `skel_01`.`articles` (
  `idarticles` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(120) NOT NULL,
  `content` TEXT NOT NULL,
  `temps` TIMESTAMP NULL,
  `users_idusers` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticles`),
  CONSTRAINT `fk_articles_users`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `skel_01`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_articles_users_idx` ON `skel_01`.`articles` (`users_idusers` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
