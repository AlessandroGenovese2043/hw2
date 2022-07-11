
<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?> 
       <title>Ricerca</title>
       <script src="<?php echo e(url('js/ricerca.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "<?php echo e(url('home')); ?>" id = 'home'> Home </a>
            <a href = "<?php echo e(url('newPost')); ?>"> Nuovo Post </a>
            <a href = '<?php echo e(url( "preferiti")); ?>'>Preferiti</a>
            <a href="<?php echo e(url('logout')); ?>" >Logout</a>
            </div>
            </nav>
        </header>
        <section id = "new_post">
            <div id ="flex" class ='preferiti'>
                <strong >Cerca consigli sulla tua meta desiderata</strong>
                <em id='pref_em'>(I risultati saranno in ordine cronologico)</em>
                <seciton id ='feed' >
                    <form class='form_comments' id='search_form'>
                        <input type="text" name="ricerca" maxlength="50" placeholder="Scrivi qui dove vorresti andare" class="input_comment" id = 'ricerca'>
                        <input type="submit" value="Cerca" class="submit_comment" id='submit_ricerca' >
                    </form>
                </seciton>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.homelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/ricerca.blade.php ENDPATH**/ ?>