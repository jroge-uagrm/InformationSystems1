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

create table notaVenta(
	nro int primary key,
	fecha date not null,
	codigoAdministrativo int not null,
	codigoAlumno int not null,
	idMetodoPago int not null,
	foreign key (codigoAdministrativo) references personalAdministrativo(codigo),
	foreign key (codigoAlumno) references alumno (codigo),
	foreign key (idMetodoPago) references metodoDePago (id)
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
	capacidad int not null
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



