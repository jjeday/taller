SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `blogweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci ;
USE `blogweb` ;

-- -----------------------------------------------------
-- Table `blogweb`.`blog_articulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`blog_articulo` (
  `idarticulo` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria_id` INT(10) UNSIGNED NOT NULL,
  `slug` CHAR(255) NULL DEFAULT NULL,
  `titulo` TINYTEXT NULL DEFAULT NULL,
  `icon` TINYTEXT NULL DEFAULT NULL,
  `image_head` TINYTEXT NULL DEFAULT NULL,
  `contenido` LONGTEXT NULL DEFAULT NULL,
  `user_creacion` CHAR(20) NULL DEFAULT NULL,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `user_modificacion` CHAR(20) NULL DEFAULT NULL,
  `fecha_modificacion` DATETIME NULL DEFAULT NULL,
  `tipo` CHAR(20) NULL DEFAULT NULL,
  `etiqueta` TINYTEXT NULL DEFAULT NULL,
  `visible` CHAR(2) NULL DEFAULT NULL,
  `marca` VARCHAR(30) NULL DEFAULT NULL,
  `medida` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`idarticulo`),
  INDEX `articulo_FKIndex1` (`categoria_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blogweb`.`blog_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`blog_categoria` (
  `idcategoria` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `denominacion` VARCHAR(255) NULL DEFAULT NULL,
  `visible` VARCHAR(2) NULL DEFAULT 'Si',
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blogweb`.`blog_comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`blog_comentario` (
  `idcomentario` INT(11) NOT NULL AUTO_INCREMENT,
  `articulo_id` INT(11) NOT NULL,
  `nombre` CHAR(255) NOT NULL,
  `email` CHAR(100) NOT NULL,
  `telefono` CHAR(50) NOT NULL,
  `contenido` TEXT NOT NULL,
  PRIMARY KEY (`idcomentario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `blogweb`.`catalogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`catalogo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `marca` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `medidas` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `colores` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `descripcion` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `visible` CHAR(2) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `slug` VARCHAR(500) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `visible` INT(11) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`client` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `company` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `image` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `image_head` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `comment` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `visible` INT(11) NOT NULL DEFAULT '1',
  `creating_user` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `creating_date` DATETIME NULL DEFAULT NULL,
  `updating_user` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `updating_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`location` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `address` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `phone` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `email` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `schedule` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `visible` INT(11) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idcategory` INT(11) NOT NULL DEFAULT '0',
  `name` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `trademark` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `model` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `measure` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `color` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image_head` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `description` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `visible` INT(11) NULL DEFAULT '1',
  `creating_user` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `creating_date` DATETIME NULL DEFAULT NULL,
  `updating_user` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `updating_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`service` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `description` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image_head` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `visible` INT(11) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`start`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`start` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `subtitle` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `description` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `image` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `image_head` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NOT NULL,
  `visible` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`supplier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`supplier` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `image_head` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  `visible` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`us` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_spanish_ci;


-- -----------------------------------------------------
-- Table `blogweb`.`web_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`web_message` (
  `id` INT(11) NOT NULL,
  `system_user_id` INT(11) NULL DEFAULT NULL,
  `mensaje_tipo` CHAR(10) NULL DEFAULT NULL,
  `estado` CHAR(10) NULL DEFAULT NULL,
  `subject` TEXT NULL DEFAULT NULL,
  `name` CHAR(255) NULL DEFAULT NULL,
  `phone` CHAR(50) NULL DEFAULT NULL,
  `email` CHAR(50) NULL DEFAULT NULL,
  `message` TEXT NULL DEFAULT NULL,
  `dt_message` DATETIME NULL DEFAULT NULL,
  `checked` CHAR(1) NULL DEFAULT NULL,
  `archivado_por` CHAR(50) NULL DEFAULT NULL,
  `enviado_por` CHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `blogweb` ;

-- -----------------------------------------------------
-- Placeholder table for view `blogweb`.`blog_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogweb`.`blog_articulos` (`idarticulo` INT, `categoria_id` INT, `slug` INT, `titulo` INT, `icon` INT, `image_head` INT, `contenido` INT, `user_creacion` INT, `fecha_creacion` INT, `user_modificacion` INT, `fecha_modificacion` INT, `tipo` INT, `etiqueta` INT, `visible` INT, `categoria_denominacion` INT, `marca` INT, `medida` INT);

-- -----------------------------------------------------
-- View `blogweb`.`blog_articulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogweb`.`blog_articulos`;
USE `blogweb`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `blogweb`.`blog_articulos` AS select `blogweb`.`blog_articulo`.`idarticulo` AS `idarticulo`,`blogweb`.`blog_articulo`.`categoria_id` AS `categoria_id`,`blogweb`.`blog_articulo`.`slug` AS `slug`,`blogweb`.`blog_articulo`.`titulo` AS `titulo`,`blogweb`.`blog_articulo`.`icon` AS `icon`,`blogweb`.`blog_articulo`.`image_head` AS `image_head`,`blogweb`.`blog_articulo`.`contenido` AS `contenido`,`blogweb`.`blog_articulo`.`user_creacion` AS `user_creacion`,`blogweb`.`blog_articulo`.`fecha_creacion` AS `fecha_creacion`,`blogweb`.`blog_articulo`.`user_modificacion` AS `user_modificacion`,`blogweb`.`blog_articulo`.`fecha_modificacion` AS `fecha_modificacion`,`blogweb`.`blog_articulo`.`tipo` AS `tipo`,`blogweb`.`blog_articulo`.`etiqueta` AS `etiqueta`,`blogweb`.`blog_articulo`.`visible` AS `visible`,`blogweb`.`blog_categoria`.`denominacion` AS `categoria_denominacion`,`blogweb`.`blog_articulo`.`marca` AS `marca`,`blogweb`.`blog_articulo`.`medida` AS `medida` from (`blogweb`.`blog_articulo` join `blogweb`.`blog_categoria` on((`blogweb`.`blog_categoria`.`idcategoria` = `blogweb`.`blog_articulo`.`categoria_id`))) where (`blogweb`.`blog_articulo`.`visible` = 'Si');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
