DROP DATABASE IF EXISTS quiz;
CREATE DATABASE quiz;
\c quiz
CREATE TABLE usuarios(
nom varchar(20),
puntaje integer
);