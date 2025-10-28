
<?php $__env->startSection('meta'); ?>
    <title>  Le Carnot - Contactez nous – Fast Food Gourmand à Le Neubourg </title>
    <meta name="description"
        content="Chez Le Carnot, c’est la mamma qui régale : pizzas croustillantes, produits frais, et livraison chaude comme sortie du four !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="<?php echo e(route('contactez-nous')); ?>" >
    <meta property="og:type" content="article" >
    <meta property="og:title" content="Le Carnot - Contactez nous – Fast Food Gourmand à Le Neubourg" >
    <meta property="og:description"
        content="Chez Le Carnot, c’est la mamma qui régale : pizzas croustillantes, produits frais, et livraison chaude comme sortie du four !" >
    <meta property="og:image" content="<?php echo e(asset('img/pizza.webp')); ?>" >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="breadcrumb m_0 ">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1 class="title title-h1">Contactez-nous</h1>
                    <ul>
                        <li><a href="/" class="">Accueil</a></li>
                        <li><a href="/contactez-nous" class=" link-bold">contactez-nous</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> 


    <section class="section section-contact   df__pt  primary-bg  position-relative">
        <div class="container"> 
            <div class="row  position-relative">
                <div class="col-lg-6 col-xxl-6 col-xl-6 col-sm-6 col-md-6">
                    <div class="image-wrapper">
                        <img srcset="<?php echo e(asset('img/10.webp')); ?> 320w, <?php echo e(asset('img/10.webp')); ?> 1024w"
                            sizes="(max-width: 600px) 320px, 1024px" src="<?php echo e(asset('img/10.webp')); ?>"
                            class="attachment-thumbnail size-thumbnail" alt="À propos Le Carnot -Pizzas, Fast Food Gourmand à Le Neubourg ">
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-6 col-xl-6 col-sm-6 col-md-6 ">
                    <div class=" text-center custom-p-5 h-100"
                         >
                        <div class="text-light home-worktimes list-hours h-100">
                            <home-opening-times></home-opening-times>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <?php echo $__env->make('pages.home.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/pages/contact/index.blade.php ENDPATH**/ ?>