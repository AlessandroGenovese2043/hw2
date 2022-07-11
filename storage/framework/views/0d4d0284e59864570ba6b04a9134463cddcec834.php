
<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?> 
       <title>Preferiti</title>
       <script src="<?php echo e(url('js/preferiti.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "<?php echo e(url('home')); ?>" id = 'home'> Home </a>
            <a href = "<?php echo e(url('newPost')); ?>"> Nuovo Post </a>
            <a href = '<?php echo e(url("ricerca")); ?>'>Ricerca</a>
            <a href="<?php echo e(url('logout')); ?>" >Logout</a>
            </div>
            </nav>
        </header>
        <section id = "new_post">
            <div id ="flex" class ='preferiti'>
                <strong>I tuoi Preferiti </strong>
                <seciton id ='feed' >

                </seciton>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.homelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/preferiti.blade.php ENDPATH**/ ?>