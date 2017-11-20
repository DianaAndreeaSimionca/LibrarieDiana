CREATE DATABASE librarie;

USE librarie;

CREATE TABLE carti (
  `id_carte` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `id_autor` INT NOT NULL ,
  `id_domeniu` INT NOT NULL ,
  `titlu` TEXT NOT NULL ,
  `descriere` TEXT NOT NULL ,
  `data` DATE NOT NULL ,
  `pret` DOUBLE NOT NULL) ENGINE = InnoDB;

INSERT INTO carti(id_autor, id_domeniu, titlu, descriere, data, pret) VALUES (1, 2, 'Luceafarul', 'Descriere Luceafarul', '2012-12-10', 30.5);
INSERT INTO carti(id_autor, id_domeniu, titlu, descriere, data, pret) VALUES (2, 3, 'Morometii', 'Descriere Morometii', '2010-06-05', 50.0);
INSERT INTO carti(id_autor, id_domeniu, titlu, descriere, data, pret) VALUES (4, 4, 'Romea si Julieta', 'Descriere Romea si Julieta', '2014-10-01', 20.0);

CREATE TABLE domenii (
  `id_domeniu` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `nume_domeniu` TEXT NOT NULL ) ENGINE = InnoDB;

INSERT INTO domenii(nume_domeniu) VALUES ('Poezie');
INSERT INTO domenii(nume_domeniu) VALUES ('Roman');
INSERT INTO domenii(nume_domeniu) VALUES ('Proza');

CREATE TABLE autori (
  `id_autor` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `nume_autor` TEXT NOT NULL ) ENGINE  = InnoDB;

INSERT INTO autori(nume_autor) VALUES ('Mihai Eminescu');
INSERT INTO autori(nume_autor) VALUES ('Marin Preda');
INSERT INTO autori(nume_autor) VALUES ('Tudor Arghezi');
INSERT INTO autori(nume_autor) VALUES ('Wiliam Shakespear');

CREATE TABLE comentarii(
  `id_comentariu` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `nume_utilizator` TEXT NOT NULL ,
  `email_utilizator` TEXT NOT NULL ,
  `comentariu` TEXT NOT NULL ,
  `id_carte` INT NOT NULL ) ENGINE  = InnoDB;

CREATE TABLE tranzactii(
  `id_tranzactie` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `data_tranzactie` TIMESTAMP(6) NOT NULL ,
  `nume_cumparator` TEXT NOT NULL ,
  `adresa_cumparator` TEXT NOT NULL ) ENGINE  = InnoDB;

CREATE TABLE vanzari(
  `id_vanzare` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `id_tranzactie` INT NOT NULL ,
  `id_carte` INT NOT NULL ,
  `nr_buc` INT NOT NULL ) ENGINE  = InnoDB;

CREATE TABLE admin(
  `id_admin` INT NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
  `admin_nume` TEXT NOT NULL ,
  `admin_parola` TEXT NOT NULL ) ENGINE  = InnoDB;

INSERT INTO admin(admin_nume, admin_parola) VALUES  ('Admin',  md5('admin'));