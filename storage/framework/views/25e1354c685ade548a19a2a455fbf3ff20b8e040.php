
<?php $__env->startSection('meta'); ?>
    <title>Le Carnot –  Fast Food Gourmand à Le Neubourg  </title>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="tf__signin pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-duration="1s"
                style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                <div class="col-xl-6 col-sm-10 col-md-8 col-lg-6">
                    <div class="tf__login_area item-bg-color ">
                        <h2 class="title title-h2 mb_10 text-center d-block">Bienvenue de nouveau ! </h2>
                        <p class="text text-center d-block">Connectez-vous ici</p>
                        <form class="sign-form" method="post" action="<?php echo e(route('customer.signin')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="redirectTo"
                                value="<?php echo e(Request::get('to') ? Request::get('to') : 'home'); ?>">
                            <div class="mb_25">
                                <input placeholder="Email" name="email" value="<?php echo e(old('email')); ?>">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-start help error-danger"><?php echo e(__($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb_25">
                                <input placeholder="Mot de passe" type="password" name="password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-start help error-danger"> <?php echo e(__($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php $__errorArgs = ['status401'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="mb_25">
                                    <div class="text-start help error-danger"><?php echo e(__($message)); ?></div>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['status403'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="mb_25">
                                    <div class="text-start help error-danger"><?php echo e(__($message)); ?></div>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <button class="buttons buttons-theme buttons-md w-100" type="submit">Je me connecte</button>
                        </Form>
                        <div class="create_account text-center black-color">
                            <div><b>Vous n'avez pas encore de compte ?</b></div>
                            <a href="<?php echo e(route('signup')); ?><?php echo e(Request::get('to') ? '/?to=' . Request::get('to') : ''); ?>">
                                Créez-en un maintenant !</a>
                            <div>
                                <a href="<?php echo e(route('recover-password')); ?>"> Mot de passe oublié</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/pages/auth/signin.blade.php ENDPATH**/ ?>