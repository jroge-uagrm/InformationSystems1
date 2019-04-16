create database SIinegas;
use SIinegas;

create table persona(
	codigo int primary key,
	ci int not null,
	nombre varchar(30) not null,
	apellido varchar(40) not null,
	telefono int,
	tipo char not null
);

create table privilegio(
	id int primary key,
	nivel int not null
);

create table usuario(
	nombre varchar(30) not null,
	contraseña varchar(30) not null,
	codigoPersona int not null,
	foreign key(codigoPersona)references persona(codigo)
);

create table alumno(
	codigo int primary key,
	codigoPersona int,
	fechaNacimiento date not null,
	correo varchar(50),
	foreign key(codigoPersona)references persona(codigo)
);

create table boletaDeInscripcion(
	nro int primary key,
	fecha date not null,
	codigoAlumno int not null,
	foreign key(codigoAlumno)references alumno(codigo)
);

create table aula(
	nro int primary key,
	ubicacion varchar(30)not null,
	capacidad int not null
);

create table curso(
	codigo int primary key,
	nombre varchar(30) not null,
	duracion int not null
);

create table horario(
	id int primary key,
	horaInicio int not null,
	horaFin int not null
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

create table boleta_grupo(
	nroBoleta int,
	idGrupo int,
	primary key(nroBoleta,idGrupo),
	foreign key(nroBoleta)references boletaDeInscripcion(nro),
	foreign key(idGrupo)references grupo(id)
);

create table gestion(
	nro int primary key,
	nombre varchar(30) not null
);

create table grupo_gestion(
	idGrupo int,
	nroGestion int,
	primary key (idGrupo, nroGestion),
	foreign key (idGrupo) references grupo (id),
	foreign key (nroGestion) references gestion (nro)
);

create table tipo(
	id int primary key,
	nombre varchar(30) not null
);

create table curso_tipo(
	codigoCurso int,
	idTipo int,
	primary key (codigoCurso, idTipo),
	foreign key (codigoCurso) references curso (codigo),
	foreign key (idTipo) references tipo (id)
);

create table docente(
	codigo int primary key,
	codigoPersona int,
	profesion varchar(40) not null,
	foreign key(codigoPersona)references persona(codigo)
);

create table docente_tipo(
	codigoDocente int,
	idTipo int,
	primary key (codigoDocente, idTipo), 
	foreign key (codigoDocente) references docente(codigo),
	foreign key (idTipo) references tipo (id)
);

create table metodoPago(
	id int primary key,
	nombre varchar(30) not null,
	estado varchar not null
);

create table Pago_Docente
(
idMetodoPago int,
codigoDocente int,
primary key (idMetodoPago, codigoDocente),
foreign key (idMetodoPago) references metodoPago (id),
foreign key (codigoDocente) references docente (codigo)
);

create table cargo	
(
id int primary key,
nombre varchar(30) not null,
estado varchar(30) not null,
idMetodoPago int not null,
foreign key (idMetodoPago) references metodoPago (id)
);

create table personalAdministrativo
(
correo varchar(40),
profesion varchar(40),
idCargo int not null,
foreign key (idCargo) references cargo (id)
);


