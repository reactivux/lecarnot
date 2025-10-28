<footer class="section section-footer primary-bg  ">
    <div class="container">
        <div class="row justify-content-between pt_30 pb_30">
            <div class="z-index-9 col-md-3 mt_15 mb_15  hide-mobile">
                <div class="footer-content text-center">
                    <?php if (isset($component)) { $__componentOriginal85dbc3d6eba3b1569594dc330239d046e2fd4b15 = $component; } ?>
<?php $component = App\View\Components\lazyimage::resolve(['src' => asset('img/logo-le-cinq-5-black.webp'),'placeholder' => asset('img/logo-le-cinq-5-black.webp'),'alt' => 'Le Carnot - Street Food Croustillante et Savoureuse','class' => 'img-fluid footer-img'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </div>
            </div>
            <div class="z-index-9 col-md-3 mt_15 mb_15">
                <div class="footer-content text-start">
                    <h3 class="footer-title title-color">Nous contacter</h3>
                    <ul class="footer-list">
                        <li class="list-item">
                            <p class="item item-color">
                                2 Rue Carnot, 27110 Le Neubourg, France
                            </p>
                        </li>
                        <li class="list-item"><a class="item item-color" href="tel:++33278989368">
                                +33 2 78 98 93 68
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="z-index-9 col-md-3 mt_15 mb_15">
                <div class="footer-content text-start">
                    <h3 class="footer-title title-color">Meilleures catégories</h3>
                    <ul class="footer-list">
                        <?php if($topCategories): ?>
                            <?php    $i = 0; ?>
                            <?php $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php        $i++; ?>
                                <?php if($i <= 4): ?>
                                    <li class="list-item">
                                        <a class="item item-color"
                                            href="<?php echo e(route('produits')); ?>#<?php echo e($categorie['name']); ?>">
                                            <?php echo e($categorie['name']); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="z-index-9 col-md-3 mt_15 mb_15">
                <div class="footer-content text-start">
                    <h3 class="footer-title title-color">Infos légales</h3>
                    <ul class="footer-list">
                        <li class="list-item"><a class="item item-color" href="/mentions-legals"> Mentions légales </a>
                        </li>
                        <li class="list-item"><a class="item item-color" href="/politique-de-confidentialite"> Politique
                                de
                                confidentialité
                            </a></li>
                        <li class="list-item"><a class="item item-color"
                                href="/conditions-generales-de-vente-et-utilisation"> CGV-CGU</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pb_20 pt_20 footer-copyright">
            <div class="col-md-6 z-index-9">
                <p class="text-start  black-color">
                    © <?php echo e(date('Y')); ?> - Le Carnot - Réalisé par
                    <a class="reactivux-link" href="https://reactivux.com" target="_blank">reactivux.com</a>
                </p>
            </div>
             
        </div>
    </div>
</footer>
<?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/layouts/footer.blade.php ENDPATH**/ ?>