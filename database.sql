DROP DATABASE IF EXISTS myapp;

CREATE DATABASE myapp;

USE myapp;

CREATE TABLE register ( 
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(50),
    email VARCHAR(50),
    pnumber BIGINT,
    fpassword VARCHAR(255) NOT NULL,
    cpassword VARCHAR(255) NOT NULL
);