/*1	Validar que la persona que realiza 
	la venta pertenece al departamento de ventas*/
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
	ROLLBACK TRANSACTION
end

/*1	Aumentar la cantidad de cargos en un departamento
	al ingresar un nuevo cargo*/
create trigger aumentarCantidadEnDepartamento
on cargo for insert as
if()
begin
end;

