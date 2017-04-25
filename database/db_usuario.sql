create database db_usuario;
use db_usuario;

-- Tabla usuario
create table usuario(
id int auto_increment not null,
nombre varchar(45) not null,
ap_pat varchar(45) not null,
ap_mat varchar(45) default null,
usu    varchar(45) not null,
pw     varchar(45) not null,
primary key(id)
);
