create database SIinegas;
use SIinegas;

create table profesion(
	id int primary key,
	nombre varchar(30)
);

create table nivelDeEstudio(
	id int primary key,
	nombre varchar(30)
);

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

create table persona_profesion(
	codigoPersona int not null,
	idProfesion int not null,
	primary key(codigoPersona,idProfesion),
	foreign key(codigoPersona)references persona(codigo),
	foreign key(idProfesion)references profesion(id)
);

create table persona_nivelDeEstudio(
	codigoPersona int not null,
	idNivelDeEstudio int not null,
	primary key(codigoPersona,idNivelDeEstudio),
	foreign key(codigoPersona)references persona(codigo),
	foreign key(idNivelDeEstudio)references nivelDeEstudio(id)
);

create table alumno(
	codigo int primary key,
	codigoPersona int not null,
	universidad varchar(50) not null,
    foreign key(codigoPersona)references persona(codigo)
);

create table usuario(
	nombre varchar(30) not null,
	contraseña varchar(30) not null,
	privilegio int not null,
	codigoPersona int not null,
	foreign key(codigoPersona)references persona(codigo)
);

create table bitacora(
	nro int primary key,
	accion varchar(50) not null,
	Fecha date not null,
	hora varchar(5)not null,
	nombreUsuario varchar(30) not null
	foreign key(nombreUsuario)references usuario(nombre)
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
	on update cascade
	on delete cascade
);

create table estadoCivil(
	id int primary key,
	nombre varchar(30) not null
);

create table personalAdministrativo(
	codigo int primary key,
	codigoPersona int not null,
    cantidadDeHijos int,
    direccionDomicilio varchar(50),
    fechaDeIngreso date not null,
	idCargo int not null,
    idEstadoCivil int,
	foreign key (codigoPersona) references persona (codigo),
	foreign key (idCargo) references cargo (id),
	foreign key (idEstadoCivil) references estadoCivil(id)
);

create table docente(
	codigo int primary key,
	codigoPersona int,
	lugarDeTrabajo varchar(30),
	direccionDeTrabajo varchar(30),
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
	duracion float not null,
	costo float not null,
	cupoTotal int not null,
    cupoDisponible int not null,
	idTipo int not null,
	foreign key (idTipo) references tipo (id)
);

create table aula(
	nro int primary key,
	ubicacion varchar(30)not null,
	capacidad int not null
);

create table horario(
	id int primary key,
	horaInicio varchar(5) not null,
	horaFin varchar(5) not null
);

create table gestion(
	nro int primary key,
	nombre varchar(30) not null
);

create table dias(
	id int primary key,
	diasUsados varchar(30) not null
);

create table grupo(
	id int primary key,
	nombre varchar(30) not null,
	fechaInicio date not null,
	fechaFin date not null,
	cupoDisponible int not null,
	nroAula int not null,
	codigoCurso int not null,
	idHorario int not null,
	idDias int not null,
	nroGestion int not null,
	codigoDocente int not null,
	foreign key(nroAula)references aula(nro),
	foreign key(codigoCurso)references curso(codigo),
	foreign key(idHorario)references horario(id),
	foreign key(idDias)references dias(id),
	foreign key(nroGestion)references gestion(nro),
	foreign key(codigoDocente)references docente(codigo)
);

create table inscripcion(
	nro int primary key,
	fecha date not null,
	montoTotal float not null,
    montoFaltante float not null,
	notaFinal int not null,
	codigoPersonalAdministrativo int not null,
	codigoAlumno int not null,
    idGrupo int not null,
	foreign key (codigoPersonalAdministrativo) references personalAdministrativo(codigo),
	foreign key (codigoAlumno) references alumno(codigo),
	foreign key (idGrupo) references grupo(id)
);

create table cuota(
	nroInscripcion int,
	nro int,
	montoTotal float not null,
	montoFaltante float not null,
	primary key(nroInscripcion,nro),
	foreign key(nroInscripcion) references inscripcion(nro)
);

create table pagoDeCuota(
	nroInscripcion int not null,
	nroCuota int not null,
	nro int not null,
	fecha date not null,
	monto float not null,
	primary key(nroInscripcion,nroCuota,nro),
	foreign key (nroInscripcion,nroCuota) references cuota(nroInscripcion,nro)
);

insert into profesion values (1,'Ingenieria Industrial');
insert into profesion values (2,'Ingenieria Quimica');
insert into profesion values (3,'Ingenieria Petrolera');
insert into profesion values (4,'Ingenieria en Sistemas');

insert into nivelDeEstudio values (1, 'Educacion superior');

insert into persona values (1,111,'Abigail','Gutierrez','Justiniano',72520129,'abigutierrez@gmail.com','1995-02-12',1,0,0);
insert into persona values (2,222,'Sebastian','Alvarez','Roca',72520129,'sebasalvarez@gmail.com','1985-08-26',1,0,0);
insert into persona values (3,333,'Pablo','Ricaldi','Moron',72520129,'pabloricaldi@gmail.com','1988-10-12',1,0,0);
insert into persona values (4,444,'Luisa','Gallardo','Suarez',72520129,'luisagallardo@gmail.com','1992-04-12',1,0,0);
insert into persona values (5,555,'Carlos','Sandoval','Padilla',72520129,'carlossandoval@gmail.com','1996-07-12',0,1,0);
insert into persona values (6,666,'Juan','Zegarra','Lopez',72520129,'juanzegarra@gmail.com','1991-06-11',0,1,0);
insert into persona values (7,777,'Norma','Soliz','Lujan',72520129,'normasoliz@gmail.com','1987-12-22',0,0,1);
insert into persona values (8,888,'Karen','Perez','Herrera',76385791,'karenperez@gmail.com','1995-02-18',0,0,1);
insert into persona values (9,999,'Simon','Aguilar','Duran',79230092,'simonaguilar@gmail.com','1995-02-18',0,0,1);

insert into persona_profesion values (1,1);
insert into persona_profesion values (2,2);
insert into persona_profesion values (3,3);
insert into persona_profesion values (4,3);
insert into persona_profesion values (5,4);
insert into persona_profesion values (6,2);
insert into persona_profesion values (7,3);
insert into persona_profesion values (8,4);
insert into persona_profesion values (9,3);

insert into persona_nivelDeEstudio values (1,1);
insert into persona_nivelDeEstudio values (2,1);
insert into persona_nivelDeEstudio values (3,1);
insert into persona_nivelDeEstudio values (4,1);
insert into persona_nivelDeEstudio values (5,1);
insert into persona_nivelDeEstudio values (6,1);
insert into persona_nivelDeEstudio values (7,1);
insert into persona_nivelDeEstudio values (8,1);
insert into persona_nivelDeEstudio values (9,1);

insert into alumno values (1,'UAGRM',1);
insert into alumno values (2,'UDABOL',2);
insert into alumno values (3,'UAGRM',3);
insert into alumno values (4,'UAGRM',4);

insert into usuario values ('Abigail','abigail123',10,1);
insert into usuario values ('Sebastian','sebastian123',10,2);
insert into usuario values ('Luisa','luisa123',20,4);
insert into usuario values ('Juan','juan123',10,6);
insert into usuario values ('Norma','norma123',30,7);
insert into usuario values ('Karen','karen123',20,8);
insert into usuario values ('Simon','simon123',10,9);

insert into departamento values (1,'Departamento de ventas',0);
insert into departamento values (2,'Departamento de marketing',0);
insert into departamento values (3,'Departamento de R.R.H.H.',0);

insert into cargo values (1,'Ejecutivo de ventas',0,1);
insert into cargo values (4,'Director de publicidad',0,2);
insert into cargo values (3,'Director de ventas',0,2);
insert into cargo values (2,'Desempleado',0,3);

insert into estadoCivil values(1,'Soltero');
insert into estadoCivil values(2,'Casado');
insert into estadoCivil values(3,'Separado');
insert into estadoCivil values(4,'Divorciado');
insert into estadoCivil values(5,'Viudo');

insert into personalAdministrativo values (1,7,2,'Radial 13, Quinto anillo','2013-03-11',0,2);
insert into personalAdministrativo values (2,8,4,'Radial 13, Quinto anillo','2004-06-28',3,3);
insert into personalAdministrativo values (3,9,3,'Radial 13, Quinto anillo','2010-01-23',2,4);

insert into docente values (1,5,'UDABOL','Cuarto anillo, Av. Beni');
insert into docente values (2,6,'TIGO','Quinto anillo, Doble via a la guardia');

insert into tipo values (1,'Continuo');
insert into tipo values (2,'Postgrado');

insert into docente_tipo values (1,2);
insert into docente_tipo values (2,1);
insert into docente_tipo values (2,2);

insert into curso values (1,'Excel Basico',3,2500,25,25,1);
insert into curso values (2,'Word Avanzado',1,2000,20,20,1);
insert into curso values (3,'Maestria en Procesos',2,2000,25,25,2);
insert into curso values (4,'Maestria en excabacion',3,3000,25,25,2);

insert into aula values (1,'Primer piso',25);
insert into aula values (2,'Segundo piso',20);
insert into aula values (3,'Segundo piso',25);
insert into aula values (4,'Tercer piso',25);

insert into horario values (1,'10:00','12:00');
insert into horario values (2,'15:00','18:00');
insert into horario values (3,'20:00','22:00');

insert into gestion values (1,'1-2018');
insert into gestion values (2,'2-2018');

insert into dias values (1,'Lunes-Miercoles-Viernes');
insert into dias values (2,'Martes-Jueves');
insert into dias values (3,'Sabado');

insert into grupo values (1,'Mañana',1,1,1,1,1,1);
insert into grupo values (2,'Tarde',2,3,2,1,1,2);
insert into grupo values (3,'Noche',3,2,3,3,2,1);
insert into grupo values (4,'Mañana',4,4,1,3,2,2);
insert into grupo values (5,'Tarde',2,1,2,2,1,2);

insert into inscripcion values (1,'2018-01-26',2500,2500,70,1,1,1);
insert into inscripcion values (2,'2018-01-22',2000,2000,88,1,2,2);
insert into inscripcion values (3,'2018-01-24',2000,2000,63,1,3,3);
insert into inscripcion values (4,'2018-01-26',3000,3000,92,1,4,4);

delete from personalAdministrativo where codigo=1
select * from grupo
select * from personalAdministrativo;

update persona set nombre='Carmen' where ci=888;

update usuario set nombre='Carmen' where codigoPersona=8;

update horario set horaInicio='15:00' where id=1;

update horario set horaFin='17:00' where id=1;

update curso set duracion=1 where codigo=4;

update notaDeVenta set fecha='2018-01-20' where nro=3;

delete from usuario where nombre='Norma';

delete from usuario where nombre='Simon';

delete from aula where nro=3;











