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

CREATE TABLE usuarios (
id_usuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre_usuario varchar(50) NOT NULL UNIQUE,
password_usuario varchar(255) NOT NULL UNIQUE,
idioma varchar(3) DEFAULT "ESP"
);

ALTER TABLE colores
ADD COLUMN id_usuario int NOT NULL DEFAULT "1";

ALTER TABLE usuarios ADD COLUMN email varchar(150);