<html>
<head>
        <?php $__env->startSection('head'); ?>
        <meta charset="utf-8" />
        <link rel = "stylesheet" href = "<?php echo e(url('css/home.css')); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Smooch&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            const BASE_URL = "<?php echo e(url('/')); ?>/";
            const csrf_token = '<?php echo e(csrf_token()); ?>';
            const user_id = '<?php echo e($user["id"]); ?>';
        </script>
        <?php echo $__env->yieldSection(); ?>
    </head>
    <body>
        <main>
        <?php echo $__env->yieldContent('content'); ?>
    
        </main>
        <footer>
            <em> Alessandro Genovese 1000002043 </em>
        </footer>
    </body>
</html><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/layout/homelayout.blade.php ENDPATH**/ ?>