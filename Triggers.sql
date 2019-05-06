use SIinegas;
/*1 Verificar que el alumno a registrar
	sea de tipo alumno*/
create trigger verificarTipoAlumno
on alumno for insert as
if((select persona.tipoAlumno
	from persona,inserted
	where inserted.codigoPersona=persona.codigo)=0)
begin
	print 'No es de tipo alumno'
	rollback tran
end;

/*2 Verificar que el docente a registrar
	sea de tipo docente*/
create trigger verificarTipoDocente
on docente for insert as
if((select persona.tipoDocente
	from persona,inserted
	where inserted.codigoPersona=persona.codigo)=0)
begin
	print 'No es de tipo docente'
	rollback tran
end;

/*3 Verificar que el trabajador a registrar
	sea de tipo trabajador*/
create trigger verificarTipoTrabajador
on personalAdministrativo for insert as
if((select persona.tipoTrabajador
	from persona,inserted
	where inserted.codigoPersona=persona.codigo)=0)
begin
	print 'No es de tipo trabajador'
	rollback tran
end;

/*4 Aumentar la cantidad de cargos en un departamento
	al añadir un nuevo cargo*/
create trigger cantidadDepartamento
on cargo for insert as
declare @idDpto int
set @idDpto=(select idDepartamento from inserted)
	update departamento 
	set cantidadCargos=cantidadCargos+1 
	where departamento.id=@idDpto;

/*5 Disminuir la cantidad de cargos en un departamento
	al eliminar un cargo*/
create trigger cantidadDepartamentoB
on cargo for delete as
declare @idDpto int
	declare idDeptoCursor cursor for (select idDepartamento from deleted)
	open idDeptoCursor
	fetch from idDeptoCursor into @idDpto
	while(@@FETCH_STATUS=0)
	begin
		update departamento 
		set cantidadCargos=cantidadCargos-1 
		where departamento.id=@idDpto
	 	fetch from idDeptoCursor into @idDpto	
	end
	close idDeptoCursor;
	deallocate idDeptoCursor;

/*6	Verificar que la cantidad de cargos incial
	al crear un departamento sea 0*/
create trigger cantidadIncialDepartamento
on departamento for insert as
if((select cantidadCargos
	from inserted)!=0)
begin
	print 'Cantidad de cargos debe empezar con 0'
	rollback tran;
end;

/*7	Verificar que al crear un cargo
	este cargo inicia con estado inactivo (0)*/
create trigger estadoInicialCargo
on cargo for insert as
if((select estado
	from inserted)!=0)
begin
	print 'El estado del cargo debe iniciar como inactivo'
	rollback tran
end;

/*8	Actualizar un cargo a estado activo cuando
	se inserta a una persona en ese cargo*/
create trigger actualizarCargo
on personalAdministrativo for insert as
declare @idCarg int
set @idCarg=(select idCargo from inserted)
update cargo set estado=1 where id=@idCarg;

/*9	Actualizar un cargo a estado inactivo cuando
	no existan personas en ese cargo*/
create trigger actualizarCargoB
on personalAdministrativo for delete as
declare @idCarg int
declare cursorCargos cursor for(select idCargo from deleted)
open cursorCargos
fetch from cursorCargos into @idCarg
while(@@FETCH_STATUS=0)
begin
	if((select count(*) 
		from personalAdministrativo 
		where idCargo=@idCarg)=0)
	begin
		update cargo set estado=0 where id=@idCarg
	end
	fetch from cursorCargos into @idCarg
end
close cursorCargos
deallocate cursorCargos;

/*10Validar que la persona que realiza 
	la venta pertenece al departamento de ventas*/
create trigger validarTrabajadorEnVenta
on inscripcion for insert as
if((select departamento.nombre
	from personalAdministrativo,cargo,departamento,inserted
	where inserted.codigoPersonalAdministrativo=personalAdministrativo.codigo and
			personalAdministrativo.idCargo=cargo.id and
			cargo.idDepartamento=departamento.id)!='Departamento de ventas')
begin
	print 'El trabajador no pertenece al depto. de ventas.'
	rollback tran
end;

/*11Crear N cuotas en funcion a la inscripcion*/
create trigger crearCuotas
on inscripcion for insert as
declare @nroInscripcion int=(
	select nro 
	from inserted)
declare @cantidadDeCuotas float=(
	select duracion
	from curso,grupo,inserted
	where inserted.idGrupo=grupo.id and
		grupo.codigoCurso=curso.codigo)
declare @contador int=1
declare @montoPorCuota float=(
	select costo
	from curso,grupo,inserted
	where inserted.idGrupo=grupo.id and
		grupo.codigoCurso=curso.codigo)
if(@cantidadDeCuotas<=1)
begin
	insert into cuota values(
		@nroInscripcion,
		@contador,
		@montoPorCuota,
		@montoPorCuota);
end
else
begin
	set @montoPorCuota=@montoPorCuota-(0.20*@montoPorCuota)	
	set @montoPorCuota=@montoPorCuota/@cantidadDeCuotas
	while(@contador<=@cantidadDeCuotas)
	begin
		insert into cuota values(
			@nroInscripcion,
			@contador,
			@montoPorCuota,
			@montoPorCuota);
		set @contador=@contador+1;
	end
end;

/*12No añadir un grupo que utiliza la misma aula
	en el mismo horario en los mismos dias
	de otro grupo*/
create trigger noAñadirGrupo
on grupo for insert as
if((select count(*)
	from grupo,inserted
	where grupo.idHorario=inserted.idHorario and
			grupo.nroAula=inserted.nroAula and
			grupo.idDias=inserted.idDias)>0)
begin
	print 'No se puede repetir misma aula en mismo horario';
	rollback tran;
end;

