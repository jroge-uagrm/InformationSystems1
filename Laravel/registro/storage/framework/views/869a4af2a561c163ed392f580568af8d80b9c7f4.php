<?php /* C:\Users\Usuario\Desktop\SI 1\Proyecto\SistemasdeInformacion\Laravel\registro\resources\views/registrarPersona.blade.php */ ?>
<?php $__env->startSection('mostrar'); ?>
    <form method="POST" action="registro">
        <label for ="Carnet de Identidad">
            CI:
            <input type="text" name="CI" value="<?php echo e(old('CarnetDeIdentidad')); ?>">
            <?php echo $errors->first('CI','<span class=error>:message</span>'); ?>

        </label><br><br>
        <label for="Nombre(s)">
            Nombre(s):
            <input type="text" name="Nombre(s)" value="<?php echo e(old('Nombre(s)')); ?>">
            <?php echo $errors->first('Nombre(s)','<span class=error>:message</span>'); ?>

        </label><br><br>
        <label for="ApellidoPaterno">
            Apellido Paterno:
            <input type="text"name="ApellidoPaterno" value="<?php echo e(old('ApellidoPaterno')); ?>">
            <?php echo $errors->first('ApellidoPaterno','<span class=error>:message</span>'); ?>

        </label><br><br>
        <label for="ApellidoMaterno">
            Apellido Materno:
            <input type="text"name="ApellidoMaterno"value="<?php echo e(old('ApellidoMaterno')); ?>">
            <?php echo $errors->first('ApellidoMaterno','<span class=error>:message</span>'); ?>

        </label><br><br>
        <!-- <label for ="Sexo">
            Sexo:   HOMBRE<input type="radio" name="Sexo" value="H" >
                    MUJER<input type="radio" name="Sexo" value="M">
                     <?php echo $errors->first('Sexo','<span class=error>:message</span>'); ?>

        </label><br><br> -->
        <label for ="Telefono">
            Telefono:
            <input type="text"name="Telefono"value="<?php echo e(old('Telefono')); ?>">
            <?php echo $errors->first('Telefono','<span class=error>:message</span>'); ?>

        </label><br><br>
        <label for ="Correo">
            Correo:
            <input type="text"name="Correo"value="<?php echo e(old('Correo')); ?>">
            <?php echo $errors->first('Correo','<span class=error>:message</span>'); ?>

        </label><br><br>
        <label for ="FechaDeNacimiento">
            Fecha de Nacimiento:
            <input type="date"name="FechaDeNacimiento"value="<?php echo e(old('FechaDeNacimiento')); ?>">
            <?php echo $errors->first('FechaDeNacimiento','<span class=error>:message</span>'); ?>

        </label><br><br>
        <label for ="Nacionalidad">
            Nacionalidad:
            <input type="text"name="Nacionalidad"value="<?php echo e(old('Nacionalidad')); ?>">
            <?php echo $errors->first('Nacionalidad','<span class=error>:message</span>'); ?>

        </label><br><br>
        <input type="submit" name="Registrar" value="RegistrarPersona">
        <!-- <input type="reset" name="Borrar" value="BorrarEspacios"> -->
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('usuarioTrabajador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>