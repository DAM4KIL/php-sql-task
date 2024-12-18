# PHP/SQL TASK - Adam K6

## Introduction

in this individual task, I had to create a basic web form using PHP and MySQL that allows users to submit data to a database. The system should 
include a simple HTML form where users can input their information. When users submit the form, the data should be processed using PHP and 
successfully stored in a MySQL database. 

## SQL Command 

CREATE DATABASE task4form;

USE task4form;

CREATE TABLE userinfo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    DateAndTime DATETIME NOT NULL,
    Message TEXT NOT NULL
);

