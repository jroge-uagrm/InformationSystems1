use SIinegas;
/*1	Mostrar los trabajadores del
	departamento de ventas*/
select persona.codigo,persona.nombre,apellidoPaterno,apellidoMaterno
from departamento,cargo,personalAdministrativo,persona
where persona.codigo=personalAdministrativo.codigoPersona and
	personalAdministrativo.idCargo=cargo.id and
	cargo.idDepartamento=departamento.id and
	departamento.nombre='Departamento de ventas'

/*2	Mostrar los docentes que dan cursos de postGrado*/
select persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno
from docente,tipo,docente_tipo,persona
where persona.codigo=docente.codigoPersona and
		docente_tipo.codigoDocente=docente.codigo and
		docente_tipo.idTipo=tipo.id and
		tipo.nombre='PostGrado'

/*3	Mostrar los cursos del alumno Juan Perez*/
select curso.codigo,curso.nombre
from curso,notaDeVenta,alumno,persona
where alumno.codigo=notaDeVenta.codigoAlumno and
		notaDeVenta.codigoCurso=curso.codigo and
		alumno.codigoPersona=persona.codigo and
		persona.nombre='Juan' and
		persona.apellidoPaterno='Perez'

/*4	Mostrar a los trabajadores que realizaron ventas el 2019-02-02*/
select persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno
from personalAdministrativo,notaDeVenta,persona
where notaDeVenta.codigoPersonalAdministrativo=personalAdministrativo.codigo and
		persona.codigo=personalAdministrativo.codigoPersona and
		notaDeVenta.fecha='2019-02-02'

/*5	Mostrar a los docentes y sus usuarios*/
select persona.nombre,usuario.nombre
from persona,usuario,personalAdministrativo
where persona.codigo=personalAdministrativo.codigoPersona and
		usuario.codigoPersona=persona.codigo

/*6 Mostrar en cuantos grupos se da el curso Excel basico*/
select count(*)
from grupo,curso
where curso.codigo=grupo.codigoCurso and
		curso.nombre='Excel basico'

/*7	Mostrar la cantidad de aulas usadas para todos 
	los cursos de postGrado*/
select count(*)
from aula,grupo,curso,tipo
where grupo.codigoCurso=curso.codigo and
		aula.nro=grupo.nroAula and
		curso.idTipo = tipo.id and
		tipo.nombre='Postgrado'

/*8 Mostrar todas las ventas que se hicieron 
con un intervalo de pago Mensual*/
select  notaDeVenta.nro,notaDeVenta.fecha
from notaDeVenta,metodoDePago,intervaloDePago
where notaDeVenta.idMetodoPago=metodoDePago.id and
		metodoDePago.idIntervaloDePago=intervaloDePago.id and
		intervaloDePago.nombre='Mensual'

/*9	Mostrar las aulas en las que Juan Perez pasa clases*/
select aula.nro,aula.ubicacion
from persona,alumno,notaDeVenta,curso,grupo,aula
where	persona.codigo=alumno.codigoPersona and
		alumno.codigo=notaDeVenta.codigoAlumno and
		curso.codigo=notaDeVenta.codigoCurso and
		grupo.codigoCurso=curso.codigo and
		aula.nro=grupo.nroAula

/*10 Mostrar la cantidad de cuotas por pagar
	 de la nota de venta 3*/
select count(*)
from cuota,metodoDePago,notaDeVenta
where notaDeVenta.idMetodoPago=metodoDePago.id and
		metodoDePago.id=cuota.idMetodoDePago and
		notaDeVenta.nro=3 and cuota.estado=0

/*11Mostrar los cursos en los que se inscribieron 
	mas de 10 personas*/
select curso.codigo,curso.nombre
from curso,notaDeVenta
where notaDeVenta.codigoCurso=curso.codigo
group by count(*)
having count(*)>10

/*12Mostrar los cursos pagados por cada alumno*/
select persona.nombre,persona.apellidoPaterno,curso.nombre
from alumno,notaVenta,persona,curso
where persona.codigo=alumno.codigoPersona and
		alumno.codigo=notaVenta.codigoAlumno and
		notaVenta.codigoCurso=curso.codigo

/*13Mostrar la cantidad de inscritos en cada curso*/
select curso.nombre, count(*) as inscritos
from notaDeVenta,curso
where notaDeVenta.codigoCurso=curso.codigo
group by curso.nombre

/*14Mostrar la cantidad de grupos en las que dará clases
	un docente por la tarde*/
select persona.nombre,count(*)as cantidadGrupos
from grupo,docente,persona
where docente.codigo=grupo.codigoDocente and 
		docente.codigoPersona=persona.codigo and
		grupo.nombre='Tarde'
group by persona.nombre

/*15Mostrar las gestiones en las que el docente Juan dio cursos
	de postgrado*/
select gestion.nro,gestion.nombre
from gestion,grupo,docente,tipo,docente_tipo,persona
where gestion.nro=grupo.nroGestion and
		docente.codigo=grupo.codigoDocente and
		docente.codigo=docente_tipo.codigoDocente and
		docente_tipo.idTipo=tipo.id and 
		docente.codigoPersona=persona.codigo and
		persona.nombre='Juan' and tipo.nombre='Postgrado'

/*16Mostrar los alumnos que esten inscritos
	en cursos Continuos*/
	select persona.nombre
	from persona,alumno,notaDeVenta,curso,tipo
	where persona.codigo=alumno.codigoPersona and 
			alumno.codigo=notaDeVenta.codigoAlumno and
			notaDeVenta.codigoCurso=curso.codigo and
			curso.idTipo=tipo.id and tipo.nombre='Continuo'

/*17Mostrar los personales administrativos ordenados por el apellido que
	no tienen usuario(nuevos) y trabajan en el departamento de ventas*/
select persona.nombre,persona.apellidoPaterno
from persona,personalAdministrativo,usuario,cargo,departamento
where persona.codigo=personalAdministrativo.codigo and 
		persona.codigo=usuario.codigoPersona and cargo.id=personalAdministrativo.idCargo
		and cargo.idDepartamento=departamento.id and departamento.nombre='Departamento de Ventas'
order by persona.apellidoPaterno asc

/*18Mostrar la cantidad de alumnos que hay en cada aula*/
select aula.nro,aula.ubicacion,aula.capacidad, count(*)as cantidadAlumnos
from persona,alumno,notaDeVenta,curso,grupo,aula
where persona.codigo=alumno.codigoPersona and alumno.codigo=notaDeVenta.codigoAlumno
		and notaDeVenta.codigoCurso=curso.codigo and curso.codigo=grupo.codigoCurso
		and grupo.nroAula=aula.nro
group by aula.nro,aula.ubicacion,aula.capacidad

/*19Mostrar los cursos con sus respectivas aulas en las que se dará clases en la tarde*/
select curso.nombre,aula.nro,aula.ubicacion
from curso,grupo,aula
where curso.codigo=grupo.codigoCurso and grupo.nroAula=aula.nro and grupo.nombre='Tarde'

/*20Mostrar los personales aministrativos que trabajan en el departamento de ventas
	que tengan mas de 30 años*/
select persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno
from persona,personalAdministrativo,cargo,departamento
where persona.codigo=personalAdministrativo.codigoPersona and personalAdministrativo.idCargo=cargo.id
		and cargo.idDepartamento=departamento.id and departamento.nombre='Departamento de venta' and
		year(getdate())-year(persona.fechaNacimiento)>30

/*21Monto total ganado por cada curso*/
select curso.codigo,curso.nombre,sum(notaDeVenta.monto)as total
from notaDeVenta,curso
where notaDeVenta.codigoCurso=curso.codigo
group by curso.codigo,curso.nombre

/*22Mostrar monto pagado de cada nota de venta hasta la fecha*/
select notaDeVenta.nro,notaDeVenta.fecha,sum(cuota.monto)as totalPagado
from notaDeVenta,cuota,pagoDeCuota
where notaDeVenta.nro=cuota.nroNotaDeVenta and cuota.nro=pagoDeCuota.nroCuota
		and getdate()>=pagoDeCuota.fecha
group by notaDeVenta.nro,notaDeVenta.fecha

/*23Mostrar los cursos que se vendieron en la fecha 2018-01-26 con
	método de pago Rapido*/
select curso.codigo,curso.nombre
from notaDeVenta,curso,metodoDePago
where notaDeVenta.codigoCurso=curso.codigo and notaDeVenta.idMetodoPago=metodoDePago.id
		and notaDeVenta.fecha='2018-01-26' and metodoDePago.nombre='Rapido'

/*24Mostrar los horarios y aula de cada curso*/
select curso.nombre,horario.horaInicio,horario.horaFin,aula.nro
from horario,grupo,curso,aula
where horario.id=grupo.idHorario and grupo.codigocurso=curso.codigo
		and aula.nro=grupo.nroAula

/*25Mostrar a los alumnos que terminaron de pagar todas sus cuotas*/
select persona.nombre,persona.apellidoPaterno,persona.ci
from alumno,notaDeVenta,cuota,persona
where persona.codigo=alumno.codigoPersona and
		notaDeVenta.codigoAlumno=alumno.codigo and
		cuota.nroNotaDeVenta not in(
			select nroNotaDeVenta
			from cuota
			where cuota.estado=0)

/*26Mostrar todos los cursos que se dieron por gestion*/
select gestion.nombre,curso.codigo,curso.nombre
from gestion,curso,grupo
where gestion.nro=grupo.nroGestion and
		grupo.codigoCurso=curso.codigo

/*27Mostrar a los alumnos que pagaron en efectivo*/
select alumno.codigo,persona.nombre,persona.apellidoPaterno
from alumno,persona,notaDeVenta,metodoDePago
where persona.codigo=alumno.codigoPersona and
		notaDeVenta.codigoAlumno=alumno.codigo and
		notaDeVenta.idMetodoPago=metodoDePago.id and
		metodoDePago.idIntervaloDePago=10

/*28Mostrar a las personas que son docentes y alumnos*/
select nombre,apellidoPaterno,ci
from persona,alumno,docente
where persona.codigo=alumno.codigoPersona and
		persona.codigo=docente.codigoPersona

/*29Mostrar los horarios disponibles de cada aula*/
select aula.nro,aula.ubicacion,horario.horaInicio,horario.horaFin
from aula,horario,grupo
where aula.nro=grupo.nroAula and
		grupo.idHorario<>horario.id

/*30Mostrar la cantidad de ventas de cursos
	de postgrado en el mes actual*/
select count(*)
from alumno,notaDeVenta,curso,tipo
where alumno.codigo=notaDeVenta.codigoAlumno and
		notaDeVenta.codigoCurso=curso.codigo and
		curso.idTipo=2 and
		month(notaDeVenta.fecha)=month(getdate())













