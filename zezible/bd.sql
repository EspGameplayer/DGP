CREATE DATABASE IF NOT EXISTS zezible;
USE zezible;

/*Crea un usuario gestor; email: "m@m.cl" - password: "12345678"*/

/*--------------------USUARIOS---------------------*/

CREATE TABLE roles(
id int(255)  auto_increment not null,
nombre varchar(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_roles PRIMARY KEY(id)
)ENGINE=InnoDb;

insert into roles (nombre) values('Gestor');
insert into roles (nombre) values('Socio');
insert into roles (nombre) values('Voluntario');

CREATE TABLE users(
id 		int(255) auto_increment not null,
name	varchar(255),
ApellidoP varchar(255),
ApellidoM varchar(255),
/*DNI varchar(255),*/
nacimiento date,
telefono int(25),
/*domicilio varchar(255),
localidad varchar(255),
provincia varchar(255),*/
email	varchar(255),
password varchar(255),
remember_token varchar(255),
role_id int(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_usuario PRIMARY KEY(id),
CONSTRAINT fk_usuario_role FOREIGN KEY(role_id) REFERENCES roles(id)
)ENGINE=InnoDb;

insert into users (name, email, password, role_id) values('matias', 'm@m.cl', 
	'$2y$10$K86iKmTfpFQcX9MGzL/3YuuUPhHzKPgn5tGpi2uaGDgX5RYIbMU0u', '1');

CREATE TABLE gestor(
id int(255) not null,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_gestor PRIMARY KEY(id),
CONSTRAINT fk_gestor_persona FOREIGN KEY(id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE socio(
id int(255) not null,
gusto text,
necesidad text,
observacion text,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_socio PRIMARY KEY(id),
CONSTRAINT fk_socio_persona FOREIGN KEY(id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE voluntario(
id int(255) not null,
participar text,
espera text,
observacion text,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_voluntario PRIMARY KEY(id),
CONSTRAINT fk_voluntario_persona FOREIGN KEY(id) REFERENCES users(id)
)ENGINE=InnoDb;

/*--------------------ACTIVIDADES---------------------*/

CREATE TABLE categoria(
id int(255)  auto_increment not null,
nombre varchar(255),
descripcion text,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_categoria PRIMARY KEY(id)
)ENGINE=InnoDb;

insert into categoria (nombre) values('Deporte');
insert into categoria (nombre) values('Turismo');
insert into categoria (nombre) values('Baile');
insert into categoria (nombre) values('Arte');
insert into categoria (nombre) values('Otros');	

CREATE TABLE actividad(
id int(255)  auto_increment not null,
nombre varchar(255),
descripcion text,
fecha date, 
hora time, 
lugar varchar(255),
tipo varchar(20),
estado varchar(20),
categoria_id int(255),
usuario_id int(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_actividad PRIMARY KEY(id),
CONSTRAINT fk_actividad_categoria FOREIGN KEY(categoria_id) REFERENCES categoria(id),
CONSTRAINT fk_actividad_usuario FOREIGN KEY(usuario_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE actividad_individual(
id int(255) not null,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_actividad_individual PRIMARY KEY(id),
CONSTRAINT fk_actividad_individual_actividad FOREIGN KEY(id) REFERENCES actividad(id)
)ENGINE=InnoDb;

CREATE TABLE actividad_grupal(
id int(255) not null,
maximo_socios int(255),
minimo_voluntarios int(255),
cupo_socios int(255),
cupo_voluntarios int(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_actividad_grupal PRIMARY KEY(id),
CONSTRAINT fk_actividad_grupal_actividad FOREIGN KEY(id) REFERENCES actividad(id)
)ENGINE=InnoDb;

CREATE TABLE comentario(
id int(255)  auto_increment not null,
comentario text,
usuario_id int(255),
actividad_id int(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_comentario PRIMARY KEY(id),
CONSTRAINT fk_comentario_persona FOREIGN KEY(usuario_id) REFERENCES users(id),
CONSTRAINT fk_comentario_actividad FOREIGN KEY(actividad_id) REFERENCES actividad(id)
)ENGINE=InnoDb;

CREATE TABLE actividad_usuario(
id int(255)  auto_increment not null,
usuario_id int(255),
actividad_id int(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_actividad_usuario PRIMARY KEY(id),
CONSTRAINT fk_actividad_usuario_persona FOREIGN KEY(usuario_id) REFERENCES users(id),
CONSTRAINT fk_actividad_usuario_actividad FOREIGN KEY(actividad_id) REFERENCES actividad(id)
)ENGINE=InnoDb;

/*--------------------FIN ACTIVIDADES---------------------*/

/*--------------------VALORACION---------------------*/


CREATE TABLE valoracion(
id int(255)  auto_increment not null,
socio_id int(255),
voluntario_id int(255),
actividad_id int(255),
estado varchar(255), /* 'socio-voluntario' 'voluntario-socio'  */
valoracion int(5),
descripcion text,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_valoracion PRIMARY KEY(id),
CONSTRAINT fk_valoracion_socio FOREIGN KEY(socio_id) REFERENCES socio(id),
CONSTRAINT fk_valoracion_voluntario FOREIGN KEY(voluntario_id) REFERENCES voluntario(id),
CONSTRAINT fk_valoracion_actividad FOREIGN KEY(actividad_id) REFERENCES actividad(id)
)ENGINE=InnoDb;


/*--------------------FIN VALORACION---------------------*/