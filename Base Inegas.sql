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
	estado varchar(30) not null,
	idDepartamento int not null,
	foreign key (idDepartamento) references departamento (id)
);

create table personalAdministrativo(
	codigo int primary key,
	codigoPersona int not null,
	profesion varchar(40),
	idCargo int not null,
	foreign key (codigoPersona) references persona (codigo),
	foreign key (idCargo) references cargo (id)
);

create table intervaloDePago(
	id int primary key,
	nombre varchar(40) not null
);

create table metodoPago(
	id int primary key,
	nombre varchar(40) not null,
	monto float not null,
	plazo int not null,
	idIntervaloDePago int not null,
	foreign key(idIntervaloDePago) references intervaloDePago(id)
);

create table notaVenta(
	nro int primary key,
	fecha date not null,
	codigoAdministrativo int not null,
	codigoAlumno int not null,
	idMetodoPago int not null,
	foreign key (codigoAdministrativo) references personalAdministrativo (codigoPersona),
	foreign key (codigoAlumno) references alumno (codigoPersona),
	foreign key (idMetodoPago) references metodoPago (id)
);

create table cuota(
	idMetodoDePago int,
	id int,
	monto float not null,
	estado varchar(40) not null,
	idIntervaloDePago int not null,
	primary key(idMetodoDePago, id),
	foreign key(idMetodoDePago) references metodoDePago(id),
	foreign key(idIntervaloDePago) references intervaloDePago(id)
);

create table docente(
	codigoPersona int primary key,
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
	foreign key(nroAula)references aula(nro),
	foreign key(codigoCurso)references curso(codigo),
	foreign key(idHorario)references horario(id)
);

create table grupo_gestion(
	idGrupo int,
	nroGestion int,
	primary key (idGrupo, nroGestion),
	foreign key (idGrupo) references grupo (id),
	foreign key (nroGestion) references gestion (nro)
);

insert into persona values (1,111,'Abigail','Gutierrez','Justiniano',72520129,'abigutierrez@gmail.com','1995-02-12');
insert into persona values (2,222,'Sebastian','Alvarez','Roca',72520129,'sebasalvarez@gmail.com','1985-08-26');
insert into persona values (3,333,'Pablo','Ricaldi','Moron',72520129,'pabloricaldi@gmail.com','1988-10-12');
insert into persona values (4,444,'Luisa','Gallardo','Suarez',72520129,'luisagallardo@gmail.com','1992-04-12');
insert into persona values (5,555,'Carlos','Sandoval','Padilla',72520129,'carlossandoval@gmail.com','1996-07-12');
insert into persona values (6,666,'Juan','Zegarra','Lopez',72520129,'juanzegarra@gmail.com','1991-06-11');
insert into persona values (7,777,'Norma','Soliz','Lujan',72520129,'normasoliz@gmail.com','1987-12-22');
insert into persona values (8,888,'Karen','Perez','Herrera',76385791,'karenperez@gmail.com','1995-02-18');

insert into alumno values (11,1,);