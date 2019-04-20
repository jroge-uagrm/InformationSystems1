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

/*7	Verificar que al crear un cargo
	este cargo inicia con estado inactivo (0)*/
create trigger estadoInicialCargo
on cargo for insert as
if((select estado
	from inserted)!=0)
begin
	print 'El estado del cargo debe iniciar como inactivo'
	rollback tran
end

/*8	Actualizar un cargo a estado activo cuando
	se inserta a una persona en ese cargo*/
create trigger actualizarCargo
on personalAdministrativo for insert as
declare @idCarg int
set @idCarg=(select idCargo from inserted)
update cargo set estado=1 where id=@idCarg

/*8	Actualizar un cargo a estado inactivo cuando
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
deallocate cursorCargos




/*9	Validar que la persona que realiza 
	la venta pertenece al departamento de ventas*/
create trigger validarTrabajadorEnVenta
on notaVenta for insert as
if((select departamento.nombre
	from personalAdministrativo,cargo,departamento,inserted
	where inserted.codigoPersonalAdministrativo=personalAdministrativo.codigo and
			personalAdministrativo.idCargo=cargo.id and
			cargo.idDepartamento=departamento.id)!='Departamento de ventas')
begin
	print 'El trabajador no pertenece al depto. de ventas.'
	rollback tran
end

/*10Reducir el monto de un metodo de pago cuando se 
	inserta un pago de una cuota de dicho metodo de pago
	y la cuota se actualiza a pagada*/
create trigger reducirMonto
on pagoDeCuota for insert as
declare @monto float
declare @idMetodoPago float
declare @nroCuota int
set @nroCuota=(select nroCuota from inserted)
set @monto=(select monto 
			from inserted,cuota 
			where inserted.nroCuota=cuota.nro)
set @idMetodoPago=(select idMetodoDePago
					from inserted)
update metodoDePago set monto=monto-@monto where id=@idMetodoPago
update cuota set estado=1 where nro=@nroCuota

/*11Crear N cuotas en funcion a su plazo 
	y a su intervalo de pago*/
create trigger crearCuotas
on metodoDePago for insert as
declare @idMetodo int
declare @cantidadDeCuotas int
declare @plazoACumplir int
declare @intervalo int
declare @montoPorCuota float
set @idMetodo=(select id from inserted)
set @plazoACumplir=(select plazo from inserted)
set @intervalo=(select idIntervaloDePago from inserted)
set @cantidadDeCuotas=( 12 * @plazoACumplir ) / @intervalo
set @montoPorCuota=(select monto from inserted)/@cantidadDeCuotas
declare @contador int
declare @cuotasExistentes int
set @cuotasExistentes=(select count(*)from cuota)
set @contador=1
while(@contador<=@cantidadDeCuotas)
begin
	insert into cuota values(@idMetodo,@contador+@cuotasExistentes,@montoPorCuota,0)
	set @contador=@contador+1
end

/*12No eliminar a los trabajadores
	que realizaron al menos una nota de venta*/
create trigger noEliminarTrabajador
on personalAdministrativo for delete as
declare @codigoTrabajador int
set @codigoTrabajador = (select codigo from deleted)
if((select count(*)
	from notaVenta
	where codigoPersonalAdministrativo=@codigoTrabajador)>0)
begin
update personalAdministrativo set idCargo=2 where codigo=@codigoTrabajador
end










