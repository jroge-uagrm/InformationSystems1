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
from curso,notaVenta,alumno,persona
where alumno.codigo=notaVenta.codigoAlumno and
		notaVenta.codigoCurso=curso.codigo and
		alumno.codigoPersona=persona.codigo and
		persona.nombre='Juan' and
		persona.apellidoPaterno='Perez'

/*4	Mostrar a los trabajadores que realizaron ventas el 2019-02-02*/
select persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno
from personalAdministrativo,notaVenta,persona
where notaVenta.codigoPersonalAdministrativo=personalAdministrativo.codigo and
		persona.codigo=personalAdministrativo.codigoPersona and
		notaVenta.fecha='2019-02-02'

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
from aula,grupo,curso
where grupo.codigoCurso=curso.codigo and
		aula.nro=grupo.nroAula and
		curso.idTipo = tipo.id and
		tipo.nombre='postGrado'

/*8 Mostrar todas las ventas que se hicieron 
con un intervalo de pago Mensual*/
select  notaVenta.nro,notaVenta.fecha
from notaVenta,metodoDePago,intervaloDePago
where notaVenta.idMetodoPago=metodoDePago.id and
		metodoDePago.idIntervaloDePago=intervaloDePago.id and
		intervaloDePago.nombre='Mensual'

/*9	Mostrar las aulas en las que Juan Perez pasa clases*/
select aula.nro,aula.ubicacion
from persona,alumno,notaVenta,curso,grupo,aula
where	persona.codigo=alumno.codigoPersona and
		alumno.codigo=notaVenta.codigoAlumno and
		curso.codigo=notaVenta.codigoCurso and
		grupo.codigoCurso=curso.codigo and
		aula.nro=grupo.nroAula

/*10 Mostrar la cantidad de cuotas por pagar
	 de la nota de venta 3*/
select count(*)
from cuota,metodoDePago,notaVenta
where notaVenta.idMetodoPago=metodoDePago.id and
		metodoDePago.id=cuota.idMetodoDePago and
		notaVenta.nro=3 and cuota.estado=0

/*11Mostrar los cursos en los que se inscribieron 
	mas de 10 personas*/
select curso.codigo,curso.nombre
from curso,notaVenta
where notaVenta.codigoCurso=curso.codigo
group by count(*)
having count(*)>10

/*12Mostrar los cursos pagados por cada alumno*/
select persona.nombre,persona.apellidoPaterno,curso.nombre
from alumno,notaVenta,persona,curso
where persona.codigo=alumno.codigoPersona and
		alumno.codigo=notaVenta.codigoAlumno and
		notaVenta.codigoCurso=curso.codigo

/*13Mostrar la cantidad de inscritos en cada curso*/
select curso.nombre, count(*) as Inscritos
from notaDeVenta,curso
where notaDeVenta.codigoCurso=curso.codigo
group by curso.nombre

/*14Mostrar la cantidad de grupos en las que dará clases
	un docente por la mañana*/


/*15Mostrar las gestiones en las que un docente dio cursos
	de postgrado*/


/*16Mostrar los alumnos mayores a 30 años que esten inscritos
	en cursos y que tengan mas de 8 cuotas*/


/*17Mostrar los personales administrativos que no tienen usuario
	(nuevos) y que trabajan en el departamento de ventas*/


/*18*/



select * from notaDeVenta
select * from intervaloDePago
select * from metodoDePago
select * from cuota
















