CREATE DATABASE librarie;

USE librarie;

CREATE TABLE carti (
`id` INT NOT NULL AUTO_INCREMENT ,
`id_autor` SMALLINT NOT NULL ,
`titlu` TEXT NOT NULL ,
`descriere` TEXT NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`id`), INDEX (`id`)) ENGINE = InnoDB;

CREATE TABLE autori (
`id` INT NOT NULL AUTO_INCREMENT ,
`nume_autor` TEXT NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`id`), INDEX (`id`)) ENGINE  = InnoDB;

CREATE TABLE comentarii(
`id` INT NOT NULL ,
`nume_utilizator` TEXT NOT NULL ,
`email_utilizator` TEXT NOT NULL ,
`comentariu` TEXT NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`id`), INDEX (`id`)) ENGINE  = InnoDB;

CREATE TABLE tranzactii(
`id` INT NOT NULL ,
`data_tranzactie` TIMESTAMP(10) NOT NULL ,
`nume_cumparator` TEXT NOT NULL ,
`adresa_cumparator` TEXT NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`id`), INDEX (`id`)) ENGINE  = InnoDB;

CREATE TABLE tranzactii(
`id` INT NOT NULL ,
`id_tranzactie` INT NOT NULL ,
`id_carte` INT NOT NULL ,
`nr_buc` INT NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`id`), INDEX (`id`)) ENGINE  = InnoDB;