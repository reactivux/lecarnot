<footer class="section section-footer primary-bg  ">
    <div class="container">
        <div class="row justify-content-between pt_30 pb_30">
            <div class="z-index-9 col-md-3 mt_15 mb_15  hide-mobile">
                <div class="footer-content text-center">
                    <x-lazyimage width="75" height="75" :src="asset('img/logo-le-cinq-5-black.webp')" :placeholder="asset('img/logo-le-cinq-5-black.webp')"
                        alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'img-fluid footer-img'" />
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
                        @if ($topCategories)
                            <?php    $i = 0; ?>
                            @foreach ($topCategories as $categorie)
                                <?php        $i++; ?>
                                @if ($i <= 4)
                                    <li class="list-item">
                                        <a class="item item-color"
                                            href="{{ route('produits') }}#{{ $categorie['name'] }}">
                                            {{ $categorie['name'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
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
                    © {{ date('Y') }} - Le Carnot - Réalisé par
                    <a class="reactivux-link" href="https://reactivux.com" target="_blank">reactivux.com</a>
                </p>
            </div>
             {{-- <div class="col-md-6 z-index-9">
                <ul class="list-social-media d-flex justify-content-end align-items-center">
                 <li class="p_5">
                        <a class="m_0 p_0 icon icon-social-media icon-instagram"
                            href="https://www.instagram.com/le-cinq-5/" target="_blank" aria-label="instagram - Le Carnot"></a>
                    </li>
                    <li class="p_5">
                        <a class="m_0 p_0 icon icon-social-media icon-facebook"
                            href="https://www.facebook.com/profile.php?id=61550525664237" target="_blank" aria-label="instagram - Le Carnot"></a>
                    </li>
                </ul>
            </div>  --}}
        </div>
    </div>
</footer>
