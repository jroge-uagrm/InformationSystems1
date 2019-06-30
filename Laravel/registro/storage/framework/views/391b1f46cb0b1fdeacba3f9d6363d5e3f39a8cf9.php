<?php /* C:\Users\Usuario\Desktop\SI 1\Proyecto\SistemasdeInformacion\Laravel\registro\resources\views/inicio.blade.php */ ?>
<?php $__env->startSection('body'); ?>
    <div class="centro">
        <ul class="tabs">
            <a href="cursos"><span>Cursos
            </span></a>
            <a href="informacion"><span>Informacion
            </span></a>
            <a href="contactanos"><span>Contáctanos
            </span></a>
            <a href="iniciarSesion"><span>Iniciar Sesion
            </span></a>
        </ul>
        <div class="parrafo">
            <br>
            <?php $__env->startSection('parrafo'); ?>
            <?php echo $__env->yieldSection(); ?>
            <br>
            <label class="transparente">space</label>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>