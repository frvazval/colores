create database colores;

use colores;

create table colores (
id_color int auto_increment primary key,
usuario varchar(50) not null,
color_es varchar(25),
color_en varchar(25)
);