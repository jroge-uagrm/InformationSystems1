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

create table usuario(
	nombre varchar(30) not null,
	contraseña varchar(30) not null,
	privilegio int not null,
	codigoPersona int not null,
	foreign key(codigoPersona)references persona(codigo)
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
	plazo int not null,
	idIntervaloDePago int not null,
	foreign key(idIntervaloDePago) references intervaloDePago(id)
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
	monto float not null,
	codigoPersonalAdministrativo int not null,
	codigoAlumno int not null,
	idMetodoPago int not null,
	codigoCurso int not null,
	foreign key (codigoPersonalAdministrativo) references personalAdministrativo(codigo),
	foreign key (codigoAlumno) references alumno (codigo),
	foreign key (idMetodoPago) references metodoDePago (id),
	foreign key (codigoCurso) references curso (codigo)
);

create table cuota(
	nroNotaDeVenta int,
	nro int,
	monto float not null,
	estado bit not null,
	primary key(nroNotaDeVenta,nro),
	foreign key(nroNotaDeVenta) references notaDeVenta(nro)
);

create table pagoDeCuota(
	nro int primary key,
	fecha date not null,
	nroNotaDeVenta int not null,
	nroCuota int not null,
	foreign key (nroNotaDeVenta,nroCuota) references cuota(nroNotaDeVenta,nro)
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

create table grupo(
	id int primary key,
	nombre varchar(30) not null,
	nroAula int not null,
	codigoCurso int not null,
	idHorario int not null,
	nroGestion int not null,
	codigoDocente int not null,
	foreign key(nroAula)references aula(nro),
	foreign key(codigoCurso)references curso(codigo),
	foreign key(idHorario)references horario(id),
	foreign key(nroGestion)references gestion(nro),
	foreign key(codigoDocente)references docente(codigo)
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

insert into alumno values (1,1,'Ingeniero Petrolero');
insert into alumno values (2,2,'Ingeniero Quimico');
insert into alumno values (3,3,null);
insert into alumno values (4,4,'Ingeniero Civil');

insert into usuario values ('Abigail','abigail123',10,1);
insert into usuario values ('Sebastian','sebastian123',10,2);
insert into usuario values ('Luisa','luisa123',10,4);
insert into usuario values ('Juan','juan123',10,6);
insert into usuario values ('Norma','norma123',10,7);
insert into usuario values ('Karen','karen123',10,8);
insert into usuario values ('Simon','simon123',10,9);

insert into departamento values (1,'Departamento de ventas',0);
insert into departamento values (2,'Departamento de marketing',0);
insert into departamento values (3,'Departamento de R.R.H.H.',0);

insert into cargo values (1,'Ejecutivo de ventas',1,1);
insert into cargo values (4,'Director de publicidad',1,2);
insert into cargo values (3,'Director de ventas',1,2);
insert into cargo values (2,'Desempleado',0,3);

insert into personalAdministrativo values (1,7,2,1);
insert into personalAdministrativo values (2,8,4,3);
insert into personalAdministrativo values (3,9,3,2);

insert into intervaloDePago values (1,'Mensual');
insert into intervaloDePago values (2,'Bimestral');
insert into intervaloDePago values (3,'Trimestral');
insert into intervaloDePago values (6,'Semestral');
insert into intervaloDePago values (10,'Una vez');

insert into metodoDePago values (1,'Rapido',1,2);
insert into metodoDePago values (2,'Medio',2,2);
insert into metodoDePago values (3,'Lento',3,2);

/*LAS CUOTAS SE INSERTAN AUTOMATICAMENTE CON UN TRIGGER*/

insert into docente values (1,5,'Ingeniero Petrolero');
insert into docente values (2,6,'Ingeniero Petrolero');

insert into tipo values (1,'Continuo');
insert into tipo values (2,'Postgrado');

insert into docente_tipo values (1,2);
insert into docente_tipo values (2,1);
insert into docente_tipo values (2,2);

insert into curso values (1,'Excel Basico',3,2500,25,1);
insert into curso values (2,'Word Avanzado',1,2000,20,1);
insert into curso values (3,'Maestria en Procesos',2,2000,25,2);
insert into curso values (4,'Maestria en escabacion',3,3000,25,2)

insert into notaDeventa values (1,'2018-01-26',2500,1,1,1,1);
insert into notaDeventa values (2,'2018-01-26',2000,1,2,2,2);
insert into notaDeventa values (3,'2018-01-26',2000,1,3,3,3);
insert into notaDeventa values (4,'2018-01-26',3000,1,4,1,4);

insert into aula values (1,'Primer piso',25);
insert into aula values (2,'Segundo piso',20);
insert into aula values (3,'Segundo piso',25);
insert into aula values (4,'Tercer piso',25);

insert into horario values (1,'10:00','12:00');
insert into horario values (2,'15:00','18:00');
insert into horario values (3,'20:00','22:00');

insert into gestion values (1,'1-2018');
insert into gestion values (2,'2-2018');

insert into grupo values (1,'Mañana',1,1,1,1,1);
insert into grupo values (2,'Tarde',2,3,2,1,2);
insert into grupo values (3,'Noche',3,2,3,2,1);
insert into grupo values (4,'Mañana',4,4,1,2,2);
insert into grupo values (5,'Tarde',2,1,2,1,2);


delete from personalAdministrativo where codigo=1
select * from personalAdministrativo


update persona set nombre='Carmen' where ci=888;

update usuario set nombre='Carmen' where codigoPersona=8;

update docente set profesion='Ingeniero Industrial' where codigoPersona=5;

update horario set horaInicio='15:00' where id=1;

update horario set horaFin='17:00' where id=1;

update curso set duracion=1 where codigo=4;

update notaDeVenta set fecha='2018-01-20' where nro=3;


delete from usuario where nombre='Norma';

delete from usuario where nombre='Simon';

delete from aula where nro=3;









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



