<?php /* C:\Users\Usuario\Desktop\SI 1\Proyecto\SistemasdeInformacion\Laravel\registro\resources\views/iniciarSesion.blade.php */ ?>
<?php $__env->startSection('parrafo'); ?>
<br>
    <form method="POST" action="usuario">
        <label for="nombreUsuario"> 
            Usuario:
            <br>
            <input type="text"name="nombreUsuario" value="<?php echo e(old('nombreUsuario')); ?>">
            <?php echo $errors->first('nombreUsuario','<span class="error">:message</span>'); ?>

        </label>
        <br><br>
        <label for="contrasenhaUsuario">
            Contraseña:
            <br>
            <input type="password"name="contrasenhaUsuario">
            <?php echo $errors->first('contrasenhaUsuario','<span class="error">:message</span>'); ?>

        </label>
        <br><br>
        <label for ="tipoPersona">
            <input type="radio"name="tipoPersona"value="A"checked>
            Alumno
            <br>
            <input type="radio"name="tipoPersona" value="D"> 
            Docente
            <br>
            <input type="radio"name="tipoPersona" value="T">
            Trabajador
            <!-- {s!s!s$errors->first('tipoPersona','<span class=error>:message</span>')!!} -->
        <br><br><br>
        <button class="boton"type="submit" value="Iniciar Sesion">Iniciar Sesion</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inicio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>