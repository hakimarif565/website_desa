-- MySQL Script generated by MySQL Workbench
-- Sun Nov 27 13:55:55 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`desa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`desa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`desa` (
  `desa_id` INT NOT NULL,
  `desa_sejarah` VARCHAR(500) NOT NULL,
  `desa_visi` VARCHAR(500) NOT NULL,
  `desa_misi` VARCHAR(500) NOT NULL,
  `desa_nama` VARCHAR(200) NOT NULL,
  `desa_alamat` VARCHAR(250) NOT NULL,
  `desa_telp` FLOAT NOT NULL,
  `video_link` VARCHAR(500) NULL,
  PRIMARY KEY (`desa_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`admin_users` ;

CREATE TABLE IF NOT EXISTS `mydb`.`admin_users` (
  `user_id` INT NOT NULL,
  `desa_id` INT NOT NULL,
  `user_name` VARCHAR(250) NOT NULL,
  `user_email` VARCHAR(200) NOT NULL,
  `user_password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_users_desa_idx` (`desa_id` ASC),
  CONSTRAINT `fk_users_desa`
    FOREIGN KEY (`desa_id`)
    REFERENCES `mydb`.`desa` (`desa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pelaku_usaha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pelaku_usaha` ;

CREATE TABLE IF NOT EXISTS `mydb`.`pelaku_usaha` (
  `usaha_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `usaha_nama` VARCHAR(200) NOT NULL,
  `usaha_alamat` VARCHAR(200) NOT NULL,
  `usaha_telp` FLOAT NOT NULL,
  `usaha_deskripsi` VARCHAR(200) NOT NULL,
  `usaha_sejarah` VARCHAR(500) NOT NULL,
  `usaha_tipe` VARCHAR(200) NOT NULL,
  `usaha_img` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`usaha_id`),
  INDEX `fk_pelaku_usaha_admin_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_pelaku_usaha_admin_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`admin_users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`berita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`berita` ;

CREATE TABLE IF NOT EXISTS `mydb`.`berita` (
  `berita_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `berita_name` VARCHAR(150) NOT NULL,
  `berita_deskripsi` VARCHAR(500) NOT NULL,
  `berita_lokasi` VARCHAR(200) NULL DEFAULT NULL,
  `berita_jam` FLOAT NULL DEFAULT NULL,
  `berita_dll` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`berita_id`),
  INDEX `fk_berita_admin_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_berita_admin_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`admin_users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produk_layanan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`produk_layanan` ;

CREATE TABLE IF NOT EXISTS `mydb`.`produk_layanan` (
  `item_id` INT NOT NULL,
  `usaha_id` INT NOT NULL,
  `item_name` VARCHAR(200) NOT NULL,
  `item_deskripsi` VARCHAR(200) NOT NULL,
  `item_harga` VARCHAR(200) NOT NULL,
  `item_dll` VARCHAR(200) NULL,
  `item_img` BLOB NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_produk_layanan_pelaku_usaha1_idx` (`usaha_id` ASC),
  CONSTRAINT `fk_produk_layanan_pelaku_usaha1`
    FOREIGN KEY (`usaha_id`)
    REFERENCES `mydb`.`pelaku_usaha` (`usaha_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ecommerce`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ecommerce` ;

CREATE TABLE IF NOT EXISTS `mydb`.`ecommerce` (
  `ecommerce_id` INT NOT NULL,
  `ecommerce_name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`ecommerce_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produk_ecommerce`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`produk_ecommerce` ;

CREATE TABLE IF NOT EXISTS `mydb`.`produk_ecommerce` (
  `item_id` INT NOT NULL,
  `ecommerce_id` INT NOT NULL,
  `produk_ecommerce_link` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`, `ecommerce_id`),
  INDEX `fk_produk_layanan_has_ecommerce_ecommerce1_idx` (`ecommerce_id` ASC),
  INDEX `fk_produk_layanan_has_ecommerce_produk_layanan1_idx` (`item_id` ASC),
  CONSTRAINT `fk_produk_layanan_has_ecommerce_produk_layanan1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`produk_layanan` (`item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produk_layanan_has_ecommerce_ecommerce1`
    FOREIGN KEY (`ecommerce_id`)
    REFERENCES `mydb`.`ecommerce` (`ecommerce_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`foto_video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`foto_video` ;

CREATE TABLE IF NOT EXISTS `mydb`.`foto_video` (
  `dokumentasi_id` INT NOT NULL,
  `desa_id` INT NOT NULL,
  `berita_id` INT NULL,
  `foto` BLOB NULL,
  `video_link` VARCHAR(500) NULL,
  INDEX `fk_foto_video_desa1_idx` (`desa_id` ASC),
  PRIMARY KEY (`dokumentasi_id`),
  INDEX `fk_foto_video_berita1_idx` (`berita_id` ASC),
  CONSTRAINT `fk_foto_video_desa1`
    FOREIGN KEY (`desa_id`)
    REFERENCES `mydb`.`desa` (`desa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_foto_video_berita1`
    FOREIGN KEY (`berita_id`)
    REFERENCES `mydb`.`berita` (`berita_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
