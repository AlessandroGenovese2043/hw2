

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
        <title>Registrazione</title>
        <script src="<?php echo e(url('js/registrazione.js')); ?>" defer></script>
        <script type="text/javascript">
            const REGISTER_ROUTE = "<?php echo e(route('register')); ?>";
        </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content1'); ?>
<h1> Registrazione</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<form method='post' action= "<?php echo e(route('register')); ?>"> 
            <?php echo csrf_field(); ?>
            <label>Nome <input type='text' name='nome' id= 'nome' value = '<?php echo e(old("nome")); ?>' ></label>
            <label>Cognome <input type='text' name='cognome' id ='cognome' value = '<?php echo e(old("cognome")); ?>'></label>
            <label>E-mail <input type='text' name='email' id = 'email' value = '<?php echo e(old("email")); ?>'></label>
            <label>Username <input type='text' name='username' id = 'username' value = '<?php echo e(old("username")); ?>' ></label>
            <label>Password <input type='password' name='password' id = 'password' value = '<?php echo e(old("password")); ?>'></label>
            
            <label>Conferma Password <input type='password' name='conferma_password' id = 'conferma_password' value = '<?php echo e(old("conferma_password")); ?>'></label>
            <label><a href= "<?php echo e(url ('login')); ?>">Accedi</a><input type='submit' id = 'submit' value='Registrati'></label>
            <div class = 'campo'></div>
            <div class = 'cognome'></div>
            <div class = 'username'></div>
            <div class = 'email'></div>
            <div class = 'password'></div>
            <div class = 'conferma_password'></div>
        </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/register.blade.php ENDPATH**/ ?>