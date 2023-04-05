CREATE DATABASE labcontroller;

CREATE TABLE student(
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(30),
    email varchar(30),
    password varchar(30),
    category varchar(30)
);

CREATE TABLE concierge(
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(30),
    email varchar(30),
    password varchar(30)
);