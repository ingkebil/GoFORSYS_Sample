SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `goFORSYS_samples` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

-- -----------------------------------------------------
-- Table `goFORSYS_samples`.`experiments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `goFORSYS_samples`.`experiments` ;

CREATE  TABLE IF NOT EXISTS `goFORSYS_samples`.`experiments` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `goFORSYS_samples`.`fermenters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `goFORSYS_samples`.`fermenters` ;

CREATE  TABLE IF NOT EXISTS `goFORSYS_samples`.`fermenters` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `goFORSYS_samples`.`people`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `goFORSYS_samples`.`people` ;

CREATE  TABLE IF NOT EXISTS `goFORSYS_samples`.`people` (
  `id` INT NOT NULL ,
  `lastname` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `goFORSYS_samples`.`samples`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `goFORSYS_samples`.`samples` ;

CREATE  TABLE IF NOT EXISTS `goFORSYS_samples`.`samples` (
  `id` VARCHAR(255) NOT NULL ,
  `fermenter_id` INT NOT NULL ,
  `timepoint` SMALLINT NOT NULL ,
  `derives_from` VARCHAR(255) NOT NULL ,
  `amount` INT NOT NULL ,
  `experiment_id` INT NOT NULL ,
  `person_id` INT NOT NULL ,
  `description` TEXT NULL ,
  `type` VARCHAR(45) NOT NULL ,
  `date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_samples_samples` (`derives_from` ASC) ,
  INDEX `fk_samples_experiments1` (`experiment_id` ASC) ,
  INDEX `fk_samples_fermenters1` (`fermenter_id` ASC) ,
  INDEX `fk_samples_people1` (`person_id` ASC) ,
  CONSTRAINT `fk_samples_samples`
    FOREIGN KEY (`derives_from` )
    REFERENCES `goFORSYS_samples`.`samples` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_samples_experiments1`
    FOREIGN KEY (`experiment_id` )
    REFERENCES `goFORSYS_samples`.`experiments` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_samples_fermenters1`
    FOREIGN KEY (`fermenter_id` )
    REFERENCES `goFORSYS_samples`.`fermenters` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_samples_people1`
    FOREIGN KEY (`person_id` )
    REFERENCES `goFORSYS_samples`.`people` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
