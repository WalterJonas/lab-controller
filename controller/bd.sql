CREATE DATABASE labcontroller;

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