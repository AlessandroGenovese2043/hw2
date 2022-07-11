

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
    <title>Login</title>
    <script src="<?php echo e(url('js/login.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content1'); ?>
<h1> Login</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>
<form method='post'>
            <?php echo csrf_field(); ?>
            <label class = 'login' >Username o email <input type='text' name='username' id = 'username' value = '<?php echo e(old("username")); ?>'></label>
            <label class = 'login'>Password <input type='password' name='password' id = 'password'></label>
            <label id = 'last_label'><a href="<?php echo e(url('register')); ?>">Registrati</a><input type='submit' id = 'submit' value='Accedi'></label>
            <div class = 'username'></div>
            <div class = 'password'></div>
            <div class = 'errore'>
            <?php if($error == 'campi_errati'): ?>
            <p>Username e/o password errati</p>
            <?php elseif($error == 'campi_mancanti'): ?>
            <p>Inserisci sia username sia password.p>
            <?php endif; ?>
            
            </div>
        </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/login.blade.php ENDPATH**/ ?>