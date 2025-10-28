
<?php $__env->startSection('meta'); ?>
    <title>Le Carnot – Fast Food Gourmand à Le Neubourg </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="<?php echo e(route('home')); ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot –  Fast Food Gourmand à Le Neubourg  ">
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta property="og:image" content="<?php echo e(asset('img/pizza.webp')); ?>">

    <link rel="preload" as="image" href="<?php echo e(asset('img/pizza.webp')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        
        <?php echo $__env->make('pages.home.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('pages.home.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <section class="parallax-section"
            style="background-size: contain;
      background-position: center;background-image: url('<?php echo e(asset('img/cut-paper.webp')); ?>');">

            <div class="overlay-content">

                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h2 class="title title-h2 title-h2-center">PIZZA - KEBAB - BURGERS - TACOS - PANINIS - BOWLS
                            </h2>
                        </div>
                        <p class="text"> Ouvert 7J/7 de 10h30 à 14h30 et de 17h30 à 23h !</p>
                        <p class="text">
                            Sur place, à emporter ou livré chez vous, vivez l’expérience Le Carnot.
                        </p>
                    </div>
                    <div class="col-md-12 text-center "><a href="/produits"
                            class="buttons buttons-theme-cta-2 buttons-themex-border buttons-md "> Voir tous les
                            produits </a>
                    </div>
                </div>

            </div>

        </section>



        
        
        
        
        
        
        
        
        
        
        
        
        
        
        



        
        
        <?php echo $__env->make('pages.home.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        
        
        
        <?php echo $__env->make('pages.home.services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        


    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/pages/home/index.blade.php ENDPATH**/ ?>