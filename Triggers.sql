/*1	Validar que el cargo de la persona que realiza 
	la venta pertenece al departamento de ventas*/
create trigger validacionVenta
on notaDeVenta
for insert
as
if ((
	select departamento.nombre
	from personalAdministrativo,cargo,departamento
	where inserted.codigoPersonalAdministrativo=personalAdministrativo.codigo and
			personalAdministratico.idCargo=cargo.id and
			cargo.idDepartamento=departamento.id)!='Departamento de ventas')
begin
	print 'El trabajador no pertenece al depto. de ventas.'
	ROLLBACK TRANSACTION
end

/*1	Aumentar la cantidad de Cargos en un departamento*/

