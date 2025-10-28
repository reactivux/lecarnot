
<?php $__env->startSection('meta'); ?>
    <title>À Propos du Carnot | Fast Food Gourmand à Le Neubourg </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="<?php echo e(route('a-propos')); ?>" >
    <meta property="og:type" content="article" >
    <meta property="og:title" content=" À Propos du Carnot  | Fast Food Gourmand à Le Neubourg " >
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !" >
    <meta property="og:image" content="<?php echo e(asset('img/pizza.webp')); ?>" >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
            <section class="breadcrumb m_0">
                <div class="breadcrumb_overlay">
                    <div class="container">
                        <div class="breadcrumb_text">
                            <h1 class="title title-h1">À Propos</h1>
                            <ul>
                                <li><a href="/" class="">Accueil</a></li>
                                <li><a href="/a-propos" class=" link-bold">À Propos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

    <section class="gallery df__pt  df__pb   primary-bg  position-relative" id="gallery">
        <div class="container gallery__container">
            <div class="row text-center">
                <div class="col-md-12 mb-3">
                    <h2 class="title title-h2-left  ">
                        À Propos du Carnot
                    </h2>
                    <p class="text">
                        Chez Le Carnot, la passion du goût est au cœur de chaque création. Nos chefs préparent chaque plat
                        avec soin : viandes
                        savoureuses, sauces maison, pains moelleux et fromages fondants… tout est pensé pour éveiller vos
                        papilles.
                    </p>
                    <p class="text">
                        Envie d’un burger bien garni, d’un tacos plein de saveurs ou d’une pizza au feu de bois ?
                        Ici, chaque recette est une explosion de goûts, à savourer sur place, à emporter ou livrée chez vous
                        en un rien de
                        temps.
                    </p>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6 gallery__left">
                    <img src="<?php echo e(asset('img/10.webp')); ?>" alt="Left Image" class="gallery__image">
                </div>
                <div class="col-md-6 gallery__right">
                    <div class="row g-3">
                        <div class="col-md-12 ">
                            <img src="<?php echo e(asset('img/11.webp')); ?>" alt="Top Right Image" class="gallery__image">
                        </div>
                        <div class="col-md-12 ">
                            <img src="<?php echo e(asset('img/12.webp')); ?>" alt="Bottom Right Image" class="gallery__image">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/pages/about/index.blade.php ENDPATH**/ ?>