
<nav class="navbar navbar-expand-lg main_menu liv-navbar hide-mobile ">
    <div class="container">
        <a href="/" class="router-link-active  navbar-brand">
            <?php if (isset($component)) { $__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15 = $component; } ?>
<?php $component = App\View\Components\lazyimage::resolve(['id' => 'logo','src' => asset('img/logo-le-cinq-5-black.webp'),'placeholder' => asset('img/logo-le-cinq-5-black.webp'),'alt' => 'Le Carnot - Street Food Croustillante et Savoureuse','class' => 'img-fluid'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lazyimage'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\lazyimage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '75','height' => '75']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15)): ?>
<?php $component = $__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15; ?>
<?php unset($__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15); ?>
<?php endif; ?>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><i
                class="far fa-bars menu_icon_bar" aria-hidden="true"></i><i class="far fa-times close_icon_close"
                aria-hidden="true"></i></button>
        <div class="navbar-collapse collapses" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'home' ? 'router-link-active' : ''); ?> nav-link">Accueil</a>
                </li>
                <li class="nav-item"><a href="<?php echo e(route('produits')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'produits' ? 'router-link-active' : ''); ?> nav-link">Produits
                    </a></li>
                <li class="nav-item"><a href="<?php echo e(route('a-propos')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'a-propos' ? 'router-link-active' : ''); ?> nav-link">À propos
                         </a>
                </li>
                <li class="nav-item"><a href="<?php echo e(route('contactez-nous')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'contactez-nous' ? 'router-link-active' : ''); ?> nav-link">Contactez-nous</a>
                </li>
            </ul>
            <layouts-desktop-header-links-right :store="<?php echo e(json_encode($store)); ?>"></layouts-desktop-header-links-right>
        </div>
    </div>
</nav>

<div class="display-flex-mobile">
    <layouts-mobile-header-links-left></layouts-mobile-header-links-left>
    <a href="/" class="navbar-brand ml-5">
        <?php if (isset($component)) { $__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15 = $component; } ?>
<?php $component = App\View\Components\lazyimage::resolve(['src' => asset('img/logo-le-cinq-5-black.webp'),'placeholder' => asset('img/logo-le-cinq-5-black.webp'),'alt' => 'Le Carnot - Street Food Croustillante et Savoureuse','class' => 'logoMobile'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lazyimage'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\lazyimage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '75','height' => '75']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15)): ?>
<?php $component = $__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15; ?>
<?php unset($__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15); ?>
<?php endif; ?>


    </a>
    <layouts-mobile-header-links-right></layouts-mobile-header-links-right>
</div>
<div class="tf__scroll_btn" id="backToTopButton"></div>
<?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/layouts/header.blade.php ENDPATH**/ ?>