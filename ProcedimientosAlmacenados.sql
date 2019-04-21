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

/*2 Obtener la cantidad que falta por pagar
	de una nota de venta*/
create function





				