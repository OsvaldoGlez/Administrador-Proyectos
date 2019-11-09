CREATE DATABASE IF NOT EXISTS admin_proyectos;

USE admin_proyectos;

CREATE TABLE IF NOT EXISTS areas(
    id_area INT AUTO_INCREMENT NOT NULL,
    nombre_area VARCHAR(100) NOT NULL,
    CONSTRAINT pk_area PRIMARY KEY(id_area)
)ENGINE=InnoDb;

INSERT INTO areas VALUES(NULL, 'Gerencia');
INSERT INTO areas VALUES(NULL, 'Recursos Humanos');
INSERT INTO areas VALUES(NULL, 'Marketing');
INSERT INTO areas VALUES(NULL, 'Sistemas');
INSERT INTO areas VALUES(NULL, 'Contabilidad');
INSERT INTO areas VALUES(NULL, 'Infraestructura');

CREATE TABLE IF NOT EXISTS empleados(
    id_empleado INT AUTO_INCREMENT NOT NULL,
    nombre_empleado VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    edad INT NOT NULL,
    sexo CHAR(2) NOT NULL,
    calle VARCHAR(255) NOT NULL,
    numero_exterior VARCHAR(10) NOT NULL,
    numero_interior VARCHAR(5) DEFAULT "N/A",
    colonia VARCHAR(100) NOT NULL,
    codigo_postal INT NOT NULL,
    telefono VARCHAR(20),
    puesto VARCHAR(100) NOT NULL,
    id_area INT NOT NULL,
    CONSTRAINT pk_empleado PRIMARY KEY(id_empleado),    
    CONSTRAINT fk_empleado_area FOREIGN KEY(id_area) REFERENCES areas(id_area)
)ENGINE=InnoDb;

INSERT INTO empleados VALUES (1,'Armando','Benitez','Castro','1965-01-01',54,'m','Calle 1','1234','','Colonia 1',11122,'2244668800','Director',1);
INSERT INTO empleados VALUES (2,'Daniela','Estrada','Fernandez','1979-02-02',40,'f','Calle 2','5678','','Colonia 2',22233,'1133557799','Gerente General',1);
INSERT INTO empleados VALUES (3,'Gerardo','Hernandez','Ibañez','1980-03-03',39,'m','Calle 3','9012','5','Colonia 3',33344,'2345678901','Director Recursos Humanos',2);
INSERT INTO empleados VALUES (4,'Jimena','Kempez','Linares','1985-11-14',34,'f','Calle 4','3456','10','Colonia 4',44455,'4512786710','Reclutador Sr',2);
INSERT INTO empleados VALUES (5,'Manuel','Nuñez','Obregón','1982-07-29',37,'m','Calle 5','7890','2','Colonia 5',55566,'3415761985','Director Marketing Digital',3);
INSERT INTO empleados VALUES (6,'Patricia','Quiroz','Rosas','1985-06-19',34,'f','Calle 6','1112','1','Colonia 7',66677,'2647859625','Content Manager',3);
INSERT INTO empleados VALUES (7,'Santiago','Tellez','Urrutia','1970-03-05',49,'m','Calle 7','1213','','Colonia 7',77788,'2547889952','Gerente Sistemas',4);
INSERT INTO empleados VALUES (8,'Vanessa','Wagner','Xiao','1990-04-10',29,'f','Calle 8','1314','4','Colonia 8',88899,'3344748495','Desarrollador',4);
INSERT INTO empleados VALUES (9,'Yusef','Zarate','Alvarez','1984-11-01',35,'m','Calle 9','5885','1','Colonia 9',99900,'4235869781','Analista Financiero',5);
INSERT INTO empleados VALUES (10,'Barbara','Castro','Diaz','1975-03-05',45,'f','Calle 10','4178','1','Colonia 10',15987,'1649359712','Directora Infraestructura',6);

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(100) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    id_empleado INT NOT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY(id_usuario),
    CONSTRAINT uq_email UNIQUE(email),
    CONSTRAINT fk_usuario_empleado FOREIGN KEY(id_empleado) REFERENCES empleados(id_empleado)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS proyectos(
    id_proyecto INT AUTO_INCREMENT NOT NULL,
    codigo_proyecto VARCHAR(100) NOT NULL,
    nombre_proyecto VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_entrega DATE NOT NULL,
    id_area INT NOT NULL,
    CONSTRAINT pk_proyecto PRIMARY KEY(id_proyecto),
    CONSTRAINT uq_codigo_proyecto UNIQUE(codigo_proyecto),
    CONSTRAINT fk_proyecto_area FOREIGN KEY(id_area) REFERENCES areas(id_area)
)ENGINE=InnoDb;

INSERT INTO proyectos VALUES(1,'P0001','Mi Primer Proyecto','Esta es una breve descripción de Mi Primer Proyecto', '2019-11-01','2019-11-28',1);
INSERT INTO proyectos VALUES(2,'P0002','Mi Segundo Proyecto','Esta es una breve descripción de Mi Segundo Proyecto', '2019-11-02','2019-11-29',2);
INSERT INTO proyectos VALUES(3,'P0003','Mi Tercer Proyecto','Esta es una breve descripción de Mi Tercer Proyecto', '2019-11-03','2019-11-30',3);
INSERT INTO proyectos VALUES(4,'P0004','Mi Cuarto Proyecto','Esta es una breve descripción de Mi Cuarto Proyecto', '2019-11-01','2019-11-28',4);
INSERT INTO proyectos VALUES(5,'P0005','Mi Quinto Proyecto','Esta es una breve descripción de Mi Quinto Proyecto', '2019-11-02','2019-11-29',4);
INSERT INTO proyectos VALUES(6,'P0006','Mi Sexto Proyecto','Esta es una breve descripción de Mi Sexto Proyecto', '2019-11-03','2019-11-30',5);


CREATE TABLE IF NOT EXISTS tareas(
    id_tarea INT AUTO_INCREMENT NOT NULL,
    nombre_tarea VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    estatus TINYINT(2) NOT NULL,
    id_area INT NOT NULL,
    id_proyecto INT NOT NULL,
    id_empleado INT NOT NULL,
    CONSTRAINT pk_tarea PRIMARY KEY(id_tarea),
    CONSTRAINT fk_tarea_area     FOREIGN KEY(id_area)     REFERENCES areas(id_area),
    CONSTRAINT fk_tarea_proyecto FOREIGN KEY(id_proyecto) REFERENCES proyectos(id_proyecto),
    CONSTRAINT fk_tarea_empleado FOREIGN KEY(id_empleado) REFERENCES empleados(id_empleado)
)ENGINE=InnoDb;