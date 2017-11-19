CREATE DATABASE librarie;

USE librarie;

CREATE TABLE carti (
`id_carte` INT NOT NULL AUTO_INCREMENT ,
`id_autor` INT NOT NULL ,
`id_domeniu` INT NOT NULL ,
`titlu` TEXT NOT NULL ,
`descriere` TEXT NOT NULL ,
`data` DATE NOT NULL ,
`pret` DOUBLE NOT NULL ,
PRIMARY KEY (`id_carte`), UNIQUE (`id_carte`), INDEX (`id_carte`)) ENGINE = InnoDB;

CREATE TABLE domenii (
`id_domeniu` INT NOT NULL AUTO_INCREMENT ,
`nume_domeniu` TEXT NOT NULL ,
PRIMARY KEY (`id_domeniu`), UNIQUE (`id_domeniu`), INDEX (`id_domeniu`)) ENGINE = InnoDB;

INSERT INTO domenii(nume_domeniu) VALUES ('Poezie');
INSERT INTO domenii(nume_domeniu) VALUES ('Roman');
INSERT INTO domenii(nume_domeniu) VALUES ('Proza');

CREATE TABLE autori (
`id_autor` INT NOT NULL AUTO_INCREMENT ,
`nume_autor` TEXT NOT NULL ,
PRIMARY KEY (`id_autor`), UNIQUE (`id_autor`), INDEX (`id_autor`)) ENGINE  = InnoDB;

INSERT INTO autori(nume_autor) VALUES ('Mihai Eminescu');
INSERT INTO autori(nume_autor) VALUES ('Marin Preda');
INSERT INTO autori(nume_autor) VALUES ('Tudor Arghezi');
INSERT INTO autori(nume_autor) VALUES ('Wiliam Shakespear');

CREATE TABLE comentarii(
`id_comentariu` INT NOT NULL ,
`nume_utilizator` TEXT NOT NULL ,
`email_utilizator` TEXT NOT NULL ,
`comentariu` TEXT NOT NULL ,
`id_carte` INT NOT NULL ,
PRIMARY KEY (`id_comentariu`), UNIQUE (`id_comentariu`), INDEX (`id_comentariu`)) ENGINE  = InnoDB;

CREATE TABLE tranzactii(
`id_tranzactie` INT NOT NULL ,
`data_tranzactie` TIMESTAMP(6) NOT NULL ,
`nume_cumparator` TEXT NOT NULL ,
`adresa_cumparator` TEXT NOT NULL ,
PRIMARY KEY (`id_tranzactie`), UNIQUE (`id_tranzactie`), INDEX (`id_tranzactie`)) ENGINE  = InnoDB;

CREATE TABLE vanzari(
`id_vanzare` INT NOT NULL ,
`id_tranzactie` INT NOT NULL ,
`id_carte` INT NOT NULL ,
`nr_buc` INT NOT NULL ,
PRIMARY KEY (`id_vanzare`), UNIQUE (`id_vanzare`), INDEX (`id_vanzare`)) ENGINE  = InnoDB;