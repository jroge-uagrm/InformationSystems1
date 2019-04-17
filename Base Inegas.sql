create database SIinegas;
use SIinegas;

create table persona(
	codigo int primary key,
	ci int not null,
	nombre varchar(30) not null,
	apellidoPaterno varchar(40) not null,
	apellidoMaterno varchar(40) not null,
	telefono int,
	correo varchar(50),
	fechaNacimiento date not null,
	tipoAlumno bit not null,
	tipoDocente bit not null,
	tipoTrabajador bit not null
);

create table alumno(
	codigo int primary key,
	codigoPersona int not null,
	profesion varchar(40),
	foreign key(codigoPersona)references persona(codigo)
);

create table privilegio(
	id int primary key,
	nivel int not null
);

create table usuario(
	nombre varchar(30) not null,
	contraseña varchar(30) not null,
	codigoPersona int not null,
	idPrivilegio int not null,
	foreign key(codigoPersona)references persona(codigo),
	foreign key(idPrivilegio)references privilegio(id) 
);

create table departamento(
	id int primary key,
	nombre varchar(50) not null,
	cantidadCargos int not null
);

create table cargo(
	id int primary key,
	nombre varchar(30) not null,
	estado bit not null,
	idDepartamento int not null,
	foreign key (idDepartamento) references departamento (id)
);

create table personalAdministrativo(
	codigo int primary key,
	codigoPersona int not null,
	añosExperiencia int,
	idCargo int not null,
	foreign key (codigoPersona) references persona (codigo),
	foreign key (idCargo) references cargo (id)
);

create table intervaloDePago(
	id int primary key,
	nombre varchar(40) not null
);

create table metodoDePago(
	id int primary key,
	nombre varchar(40) not null,
	monto float not null,
	plazo int not null,
	idIntervaloDePago int not null,
	foreign key(idIntervaloDePago) references intervaloDePago(id)
);

create table cuota(
	idMetodoDePago int,
	nro int,
	monto float not null,
	estado varchar(40) not null,
	primary key(idMetodoDePago,nro),
	foreign key(idMetodoDePago) references metodoDePago(id)
);

create table pagoDeCuota(
	nro int primary key,
	fecha date not null,
	idMetodoDePago int not null,
	nroCuota int not null,
	foreign key (idMetodoDePago,nroCuota) references cuota(idMetodoDePago,nro)
);

create table docente(
	codigo int primary key,
	codigoPersona int,
	profesion varchar(40) not null,
	foreign key(codigoPersona)references persona(codigo)
);

create table tipo(
	id int primary key,
	nombre varchar(30) not null
);

create table docente_tipo(
	codigoDocente int,
	idTipo int,
	primary key (codigoDocente, idTipo), 
	foreign key (codigoDocente) references docente(codigo),
	foreign key (idTipo) references tipo (id)
);

create table curso(
	codigo int primary key,
	nombre varchar(30) not null,
	duracion int not null,
	monto float not null,
	capacidad int not null,
	idTipo int not null,
	foreign key (idTipo) references tipo (id)
);

create table notaDeVenta(
	nro int primary key,
	fecha date not null,
	codigoPersonalAdministrativo int not null,
	codigoAlumno int not null,
	idMetodoPago int not null,
	codigoCurso int not null,
	foreign key (codigoPersonalAdministrativo) references personalAdministrativo(codigo),
	foreign key (codigoAlumno) references alumno (codigo),
	foreign key (idMetodoPago) references metodoDePago (id),
	foreign key (codigoCurso) references curso (codigo)
);

create table aula(
	nro int primary key,
	ubicacion varchar(30)not null,
	capacidad int not null
);

create table horario(
	id int primary key,
	horaInicio int not null,
	horaFin int not null
);

create table gestion(
	nro int primary key,
	nombre varchar(30) not null
);

create table grupo(
	id int primary key,
	nombre varchar(30) not null,
	nroAula int not null,
	codigoCurso int not null,
	idHorario int not null,
	nroGestion int not null,
	foreign key(nroAula)references aula(nro),
	foreign key(codigoCurso)references curso(codigo),
	foreign key(idHorario)references horario(id),
	foreign key(nroGestion)references gestion(nro)
);

insert into persona values (1,111,'Abigail','Gutierrez','Justiniano',72520129,'abigutierrez@gmail.com','1995-02-12',1,0,0);
insert into persona values (2,222,'Sebastian','Alvarez','Roca',72520129,'sebasalvarez@gmail.com','1985-08-26',1,0,0);
insert into persona values (3,333,'Pablo','Ricaldi','Moron',72520129,'pabloricaldi@gmail.com','1988-10-12',1,0,0);
insert into persona values (4,444,'Luisa','Gallardo','Suarez',72520129,'luisagallardo@gmail.com','1992-04-12',1,0,0);
insert into persona values (5,555,'Carlos','Sandoval','Padilla',72520129,'carlossandoval@gmail.com','1996-07-12',0,1,0);
insert into persona values (6,666,'Juan','Zegarra','Lopez',72520129,'juanzegarra@gmail.com','1991-06-11',0,1,0);
insert into persona values (7,777,'Norma','Soliz','Lujan',72520129,'normasoliz@gmail.com','1987-12-22',0,0,1);
insert into persona values (8,888,'Karen','Perez','Herrera',76385791,'karenperez@gmail.com','1995-02-18',0,0,1);
insert into persona values (9,999,'Simon','Aguilar','Duran',79230092,'simonaguilar@gmail.com','1995-02-18',0,0,1)

insert into alumno values (11,1,'Ingeniero Petrolero');
insert into alumno values (22,2,'Ingeniero Quimico');
insert into alumno values (33,3,null);
insert into alumno values (44,4,'Ingeniero Civil');

insert into privilegio values (1,10);
insert into privilegio values (2,10);
insert into privilegio values (3,10);
insert into privilegio values (4,10);

insert into usuario values ('Abigail','abigail123',1,1);
insert into usuario values ('Sebastian','sebastian123',2,1);
insert into usuario values ('Luisa','luisa123',4,2);
insert into usuario values ('Juan','juan123',6,3);
insert into usuario values ('Norma','norma123',7,2);
insert into usuario values ('Karen','karen123',8,4);
insert into usuario values ('Simon','simon123',9,3);

insert into departamento values (1,'Departamento de ventas',1);
insert into departamento values (2,'Departamento de marketing',2);

insert into cargo values (1,'Ejecutivo de ventas',1,1);
insert into cargo values (2,'Director de publicidad',1,2);
insert into cargo values (3,'Director de ventas',1,2);

insert into personalAdministrativo values (1,7,2,1);
insert into personalAdministrativo values (2,8,4,3);
insert into personalAdministrativo values (3,9,3,2);

insert into intervaloDePago values (1,'Mensual');
insert into intervaloDePago values (2,'Bimestral');
insert into intervaloDePago values (3,'Semestral');

insert into metodoDePago values (1,'Rapido',2000,1,3);
insert into metodoDePago values (2,'Lento',2500,1,1);
insert into metodoDePago values (3,'Medio',2000,1,2);

insert into cuota values (1,1,1000);
insert into cuota values (2,2,500)
insert into cuota values (3,3,500);
insert into cuota values (2,4,500);
insert into cuota values (2,5,1000);
insert into cuota values (3,6,2000);

insert into pagoDeCuota values (1,'2018-02-03',1,1);
insert into pagoDeCuota values (2,'2018-02-03',2,2);
insert into pagoDeCuota values (3,'2018-02-03',3,3);
insert into pagoDeCuota values (4,'2018-02-03',2,4);
insert into pagoDeCuota values (5,'2018-02-03',2,5);
insert into pagoDeCuota values (6,'2018-02-03',3,6);

insert into docente values (1,5,'Ingeniero Petrolero');
insert into docente values (2,6,'Ingeniero Petrolero');

insert into tipo values (1,'Practico');
insert into tipo values (2,'Teorico');

insert into docente_tipo values (1,2);
insert into docente_tipo values (2,1);
insert into docente_tipo values (2,2);

insert into curso values (1,'x',3,2500,25,2);
insert into curso values (2,'x',1,2000,20,1);
insert into curso values (3,'x',2,2000,25,1);
insert into curso values (4,'x',3,3000,25,2)

insert into notaDeventa values (1,'2018-01-26',7,1,1,3);
insert into notaDeventa values (2,'2018-01-26',8,2,2,4);
insert into notaDeventa values (3,'2018-01-26',9,3,3,1);
insert into notaDeventa values (4,'2018-01-26',8,4,1,2);

insert into aula values (1,'Primer piso',25);
insert into aula values (2,'Segundo piso',20);
insert into aula values (3,'Segundo piso',25);
insert into aula values (4,'Tercer piso',25);

insert into horario values (1,7,9);
insert into horario values (2,8,10);
insert into horario values (3,9,11);
insert into horario values (4,13,15);

insert into gestion values (1,'1-2018');
insert into gestion values (2,'2-2018');

insert into grupo values (1,'SB',1,1,2,1);
insert into grupo values (2,'SA',2,3,1,1);
insert into grupo values (3,'SC',3,2,1,2);
insert into grupo values (4,'SX',4,4,4,2);
insert into grupo values (5,'SW',2,1,3,1);




--Ejemplo Jroge--
insert into persona values
(1,111,'Alumno','Torrez','Aramayo',75364642,'jroge@gmail.com','2019-01-01',1,0,0);
insert into persona values
(2,222,'Docente','Torrez','Aramayo',75364642,'jroge@gmail.com','2019-01-01',0,1,0);
insert into persona values
(3,333,'Trabajador','Torrez','Aramayo',75364642,'jroge@gmail.com','2019-01-01',0,0,1);

delete from cargo;
select*from departamento;
insert into departamento values(1,'Departamento de ventas',0);
insert into departamento values(2,'Departamento de marketing',0);
insert into cargo values(1,'Vendedor 1',0,1)
insert into cargo values(2,'Nego 1',0,2)
delete from cargo where id=1



