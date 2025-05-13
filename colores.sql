create database colores;

use colores;

create table colores (
id_color int auto_increment primary key,
usuario varchar(50) not null,
color_es varchar(25),
color_en varchar(25)
);

-- Crear usuario
CREATE USER 'colores'@'%' IDENTIFIED by "colores";

-- Le damos permisos a los usuarios
-- todos los privilegios
GRANT ALL PRIVILEGES ON colores.* to 'colores'@'%' with GRANT OPTION;

-- solo para insertar, borrar, etc...
GRANT select, insert, update, delete ON colores.* to 'colores'@'%';