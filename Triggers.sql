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
end

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
end

/*4 Aumentar la cantidad de cargos en un departamento
	al añadir un nuevo cargo*/
create trigger cantidadDepartamento
on cargo for insert as
declare @idDpto int
set @idDpto=(select idDepartamento from inserted)
	update departamento 
	set cantidadCargos=cantidadCargos+1 
	where departamento.id=@idDpto

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
	close idDeptoCursor

/*6	Verificar que la cantidad de cargos incial
	al crear un departamento sea 0*/
create trigger cantidadIncialDepartamento
on departamento for insert as
if((select cantidadCargos
	from inserted)!=0)
begin
	print 'Cantidad de cargos debe empezar con 0'
	rollback tran
end










/*n	Validar que la persona que realiza 
	la venta pertenece al departamento de ventas*
create trigger validarTrabajadorEnVenta
on notaDeVenta 
for insert
as
if ((
	select departamento.nombre
	from personalAdministrativo,cargo,departamento
	where inserted.codigoPersonalAdministrativo=personalAdministrativo.codigo and
			personalAdministrativo.idCargo=cargo.id and
			cargo.idDepartamento=departamento.id)!='Departamento de ventas')
begin
	print 'El trabajador no pertenece al depto. de ventas.'
	rollback tran
end*/

