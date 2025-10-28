
<?php $__env->startSection('meta'); ?>
    <title>Le Carnot - Adresses de livraison – Fast Food Gourmand à Le Neubourg </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="<?php echo e(route('home')); ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot - Adresses de livraison – Fast Food Gourmand à Le Neubourg ">
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta property="og:image" content="<?php echo e(asset('img/pizza.webp')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="breadcrumb m_0">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1 class="title title-h1">Vos adresses de livraison</h1>
                    <ul>
                        <li><a href="/" class="">Accueil</a></li>
                        <li><a class="link-bold">Adresse</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class=" df__pt df__pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp">
                    <div class="tf_dashboard_order">
                        <div class="table-responsive">
                            
                            
                            
                            <deliveries-addresses key="list-addresses"></deliveries-addresses>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/pages/deliveries_addresses/index.blade.php ENDPATH**/ ?>