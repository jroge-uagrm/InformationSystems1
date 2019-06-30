<?php /* C:\Users\Usuario\Desktop\SI 1\Proyecto\SistemasdeInformacion\Laravel\registro\resources\views/usuarioTrabajador.blade.php */ ?>
<?php $__env->startSection('body'); ?>
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponibles">
                <a href="registrarPersona"><span>
                Registrar Persona</span></a>
                <a href="cursosTomados"><span>
                Cursos</span></a>
                <a href="miHorario"><span>
                Pagos</span></a>
                <a href="cerrarSesion"><span>
                Cerrar Sesion</span></a>
            </ul>
            <div class="mostrar">
                <?php $__env->startSection('mostrar'); ?>
                <?php echo $__env->yieldSection(); ?>
            </div>
            <div>
                <br>
                <br>
                <label class="transparente">space</label>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>