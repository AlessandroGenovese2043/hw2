
<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
        <title>Nuovo_Post</title>
        <script src="<?php echo e(url('js/newPost.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "<?php echo e(url('home')); ?>" id = 'home'> Home </a>
            <a href = '<?php echo e(url( "preferiti")); ?>'>Preferiti</a>
            <a href = '<?php echo e(url("ricerca")); ?>'>Ricerca</a>
            <a href="<?php echo e(url('logout')); ?> " >Logout</a>
            </div>
            </nav>
        </header>
        <section id = "new_post">
            <div id ="flex">
                <strong>Nuovo Post </strong>
                <p>Descrivi la tua esperienza di viaggio e in più qualche consiglio per aiutare altri amanti dei viaggi come te! </p>
            </div>
            <form method = 'post' id = 'ricerca'>
                <?php echo csrf_field(); ?>
                    <label> Seleziona il contenuto che vuoi caricare (Immagine o Sticker) </label>
                    <div class ='select'>
                    <label><input data-radio-id="1" type="radio" name="type" value="image" class = 'radio' ><img data-image-id="1" class= 'image' src = './images/image_search.png'></label>
                    <label><input data-radio-id="2" type="radio" name="type" value="giphy" class = 'radio' ><img data-image-id="2" class= 'image' src = './images/image_sticker.png'></label>
                    </div>
                    <div id="div_input">
                        <div><label><input type = 'text'  name='ricerca' id = 'search_input' maxlength="50"></label></div>
                        <label><input type = 'submit' value = 'Cerca'></label>
                    </div>
                    
            </form>
            <form method = 'post' id = 'second' action= "<?php echo e(route('docaricamento')); ?>">
                <?php echo csrf_field(); ?>
                <label>Descrizione<textarea name="textarea" maxlength="1500" placeholder="Scrivi qui"></textarea></label>
                <label><input type="checkbox" name = 'tips' value= 'tips' id = "check_tip">Inserire dei consigli</label>
                <div class = 'hidden' id = 'div_tip' >
                    <label>Consiglio<textarea name="textarea_tips" maxlength="100" placeholder="Scrivi qui"></textarea></label> 
                </div>
                <label>&nbsp;<input type='submit' id = 'submit' value='Pubblica'></label>
            </form>
            
        </section>
        <section class = 'logoapi' >
            <a class ='hidden' href = 'https://giphy.com/'><img src = './images/PoweredBy_200px-White_HorizLogo.png'></a>
            
            <a id ='logo_pixabay' class = 'hidden' href="https://pixabay.com/"><img src = './images/logo_pixabay.png'></a>
        </section>

        <section class = 'hidden results'> 
            
            <div data-choice-id="1">
                <label><input data-radio-id = '1' type="radio" name="select" value="1" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="2">
                <label><input data-radio-id = '2' type="radio" name="select" value="2" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="3">
                <label><input data-radio-id = '3' type="radio" name="select" value="3" class = 'select_radio' form = 'second' ></label>
            </div>

            <div data-choice-id="4">
                <label><input data-radio-id = '4' type="radio" name="select" value="4" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="5">
                <label><input data-radio-id = '5' type="radio" name="select" value="5" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="6">
               <label><input data-radio-id = '6' type="radio" name="select" value="6" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="7">
                <label><input data-radio-id = '7' type="radio" name="select" value="7" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="8">
                <label><input data-radio-id = '8' type="radio" name="select" value="8" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="9">
                <label><input data-radio-id = '9'  type="radio" name="select" value="9" class = 'select_radio' form = 'second'></label>
            </div>
            <div data-choice-id="10">
                <label><input data-radio-id = '10'  type="radio" name="select" value="10" class = 'select_radio' form = 'second' ></label>  
            </div>
            <div data-choice-id="11">
                <label><input data-radio-id = '11' type="radio" name="select" value="11" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="12">
                <label><input data-radio-id = '12' type="radio" name="select" value="12" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="13">
                <label><input data-radio-id = '13' type="radio" name="select" value="13" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="14">
                <label><input data-radio-id = '14' type="radio" name="select" value="14" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="15">
                <label><input data-radio-id = '15' type="radio" name="select" value="15" class = 'select_radio' form = 'second'></label>
            </div>

            <div data-choice-id="16">
                <label><input data-radio-id = '16' type="radio" name="select" value="16" class = 'select_radio' form = 'second'></label>
            </div>
             
      </section>



        <section id = 'modal-view' class = 'hidden'>
        </section>
        <section id ='post_caricato' class = 'hidden fixed font'>
                <div>
                    <p class = 'errore'> Post caricato correttamente!</p> <br><br>
                    <a href = '<?php echo e(url("home")); ?>'> Torna alla home </a>
                    <a href = '<?php echo e(url("newPost")); ?>'> Pubblica nuovo post </a>
                </div>
         </section>
        <section id ='post_noncaricato' class = 'hidden fixed font'>
                <div>
                    <p class = 'errore'> Errore caricamento Post</p> <br><br>
                    <a href = '<?php echo e(url("newPost")); ?>'> Carica nuovo Post </a>
                </div>
        </section>

        <section id = 'errore' class = 'hidden'></section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.homelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework\laravelhw2\resources\views/newPost.blade.php ENDPATH**/ ?>