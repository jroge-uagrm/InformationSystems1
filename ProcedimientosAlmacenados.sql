use SIinegas
/*1 Obtener la cantidad de cupos disponibles
	para un curso*/
create function cuposDisponibles(@codigoCurso int)returns int
as begin
	declare @cuposVendidos int
	set @cuposVendidos= (
		select count(*)
		from notaDeVenta,curso
		where codigoCurso=codigo and
				codigo=@codigoCurso)
	declare @cuposDelCurso int 
	set @cuposDelCurso = (
		select capacidad
		from curso 
		where codigo=@codigoCurso)
	declare @cuposDisponibles int
	set @cuposDisponibles=@cuposDelCurso-@cuposVendidos;
	return @cuposDisponibles
end

/*2 Obtener el monto que falta por pagar
	de una nota de venta*/
	use SIinegas;
create function montoPorPagar(@nroNotaDeVenta int)returns float
as begin
	declare @cantidadDeCuotasNoPagadas int
	set @cantidadDeCuotasNoPagadas=(
		select count(*)
		from cuota
		where cuota.nroNotaDeVenta=@nroNotaDeVenta and
			cuota.estado=0)
	declare @montoFaltante float
	set @montoFaltante=@cantidadDeCuotasNoPagadas*(
		select monto
		from cuota 
		where nroNotaDeVenta=@nroNotaDeVenta)
	return @montoFaltante
end

/*3 Obtener la cantidad de cuotas que falta 
	por pagar de una nota de venta*/
	use SIinegas;
create function cantidadDeCuotasPorPagar(@nroNotaDeVenta int)returns int
as begin
	declare @cantidadDeCuotasNoPagadas int
	set @cantidadDeCuotasNoPagadas=(
		select count(*)
		from cuota
		where cuota.nroNotaDeVenta=@nroNotaDeVenta and
			cuota.estado=0)
	declare @montoFaltante float
	set @montoFaltante=@cantidadDeCuotasNoPagadas*(
		select monto
		from cuota 
		where nroNotaDeVenta=@nroNotaDeVenta)
	return @montoFaltante
end

/*4 Obtener el monto ganado
	en un determinado mes*/
create function montoGanado (@nroMes int)returns float
as begin
	declare @nroPagoDeCuota int
	declare @montoGanado float
	set @montoGanado=0
	declare cursorNroPagoDeCuota cursor for(
		select nro 
		from pagoDeCuota
		where month(fecha)=@nroMes)
	open cursorNroPagoDeCuota
	fetch from cursorNroPagoDeCuota into @nroPagoDeCuota
	while(@@FETCH_STATUS=0)
	begin
		set @montoGanado=@montoGanado+(
			select monto
			from cuota,pagoDeCuota
			where pagoDeCuota.nroCuota=cuota.nro and
					pagoDeCuota.nro=@nroPagoDeCuota)
		fetch from cursorNroPagoDeCuota into @nroPagoDeCuota
	end
	close cursorNroPagoDeCuot
	deallocate cursorNroPagoDeCuota
	return @montoGanado
end
select SIinegas.dbo.montoGanado(1)

/*5 Ver la lista de inscritos en un curso*/
create function listaDeInscritos(@nombreCurso varchar(30))
returns table
as
return (select persona.codigo, persona.ci,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno
		from persona,alumno,notaDeVenta,curso
		where persona.codigo=alumno.codigoPersona and alumno.codigo=notaDeVenta.codigoAlumno
				and curso.codigo=notaDeVenta.codigoCurso and curso.nombre=@nombreCurso)

/*Ver los vendedores que vendieron mas de dos veces en el
	mismo dia en algun mes*/
create function vendedoresQueVendieronMasDeDosVeces(@mes int)
returns table
as
return (select persona.codigo,persona.ci,persona.nombre,count(*)as cantidadVentas
		from persona,departamento,cargo,personalAdministrativo,notaDeVenta
		where departamento.id=cargo.idDepartamento and cargo.id=personalAdministrativo.idCargo
				and personalAdministrativo.codigo=notaDeVenta.codigoPersonalAdministrativo and
				persona.codigo=personalAdministrativo.codigoPersona and
				month(notaDeVenta.fecha)=@mes and departamento.nombre='Departamento de ventas'
		group by persona.codigo,persona.ci,persona.nombre
		having count(*)>2)



				