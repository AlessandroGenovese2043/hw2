
<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
        <title>Home</title>
        <script src="<?php echo e(url('js/home.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "<?php echo e(url('home')); ?>" id = 'home'> Home </a>
            <a href = "<?php echo e(url('newPost')); ?>"> Nuovo Post </a>
            <a href = '<?php echo e(url("preferiti")); ?>'>Preferiti</a>
            <a href = '<?php echo e(url("ricerca")); ?>'>Ricerca</a>
            <a href="<?php echo e(url('logout')); ?>" >Logout</a>
            </div>
            </nav>
        </header>
        <div id='sezioni'>
            <section class = 'profile'>
            <div id="profile-flex">
            <div id="profile">
                <img src='https://pianetasocial.it/wp-content/uploads/2013/10/faccia.jpg'>
            </div>
            
                <p> &#64;<?php echo e($user['username']); ?> </p>
            </div>
            <p> Nome: <?php echo e($user['nome']); ?> </p>
            <p> Cognome:  <?php echo e($user['cognome']); ?></p>
            <p> Email: <?php echo e($user['email']); ?></p>
            <p> Numero di post: <?php echo e($user['number_posts']); ?> </p>
            
            </section>
            <section id = 'feed'>
   
            </section>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.homelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/home.blade.php ENDPATH**/ ?>