CREATE DATABASE labcontroller;
/*Criação do Banco*/

CREATE TABLE concierge(
    id int primary key AUTO_INCREMENT,
    username varchar(30) NOT NULL,
   	password varchar(15) NOT NULL
    );
    
 INSERT INTO concierge (username, password)
 VALUES ("ICET", "123456");

 CREATE TABLE authorized(
    id int PRIMARY key AUTO_INCREMENT,
    lab int NOT NULL,
    name varchar(30) NOT NULL,
    course varchar(30) NOT NULL,
    modality varchar(30) NOT NULL,
    level varchar(30) NOT NULL
    );

CREATE TABLE input(
    id int PRIMARY key AUTO_INCREMENT,
    lab varchar(30) NOT NULL,
    name varchar(30) NOT NULL,
    hour varchar(30) NOT NULL,
    date varchar(30) NOT NULL
    );
    
CREATE TABLE output(
    id int PRIMARY key AUTO_INCREMENT,
    lab varchar(30) NOT NULL,
    name varchar(30) NOT NULL,
    hour varchar(30) NOT NULL
    );

CREATE TABLE status(
    id int PRIMARY key AUTO_INCREMENT,
    lab varchar(30) NOT NULL,
    situacao varchar(30) NOT NULL
    );

INSERT INTO status (lab, situacao)
 VALUES ("307", "Vazio");

INSERT INTO status (lab, situacao)
 VALUES ("308", "Vazio");
 
INSERT INTO status (lab, situacao)
 VALUES ("309", "Vazio");

 INSERT INTO status (lab, situacao)
 VALUES ("311", "Vazio");

 INSERT INTO status (lab, situacao)
 VALUES ("312", "Vazio");

 INSERT INTO status (lab, situacao)
 VALUES ("313", "Vazio");