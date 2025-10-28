{{-- Desktop --}}
<nav class="navbar navbar-expand-lg main_menu liv-navbar hide-mobile ">
    <div class="container">
        <a href="/" class="router-link-active  navbar-brand">
            <x-lazyimage :id="'logo'" width="75" height="75" :src="asset('img/logo-le-cinq-5-black.webp')" :placeholder="asset('img/logo-le-cinq-5-black.webp')"
                alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'img-fluid'" />
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><i
                class="far fa-bars menu_icon_bar" aria-hidden="true"></i><i class="far fa-times close_icon_close"
                aria-hidden="true"></i></button>
        <div class="navbar-collapse collapses" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="{{ Route::currentRouteName() == 'home' ? 'router-link-active' : '' }} nav-link">Accueil</a>
                </li>
                <li class="nav-item"><a href="{{ route('produits') }}"
                        class="{{ Route::currentRouteName() == 'produits' ? 'router-link-active' : '' }} nav-link">Produits
                    </a></li>
                <li class="nav-item"><a href="{{ route('a-propos') }}"
                        class="{{ Route::currentRouteName() == 'a-propos' ? 'router-link-active' : '' }} nav-link">À propos
                         </a>
                </li>
                <li class="nav-item"><a href="{{ route('contactez-nous') }}"
                        class="{{ Route::currentRouteName() == 'contactez-nous' ? 'router-link-active' : '' }} nav-link">Contactez-nous</a>
                </li>
            </ul>
            <layouts-desktop-header-links-right :store="{{ json_encode($store) }}"></layouts-desktop-header-links-right>
        </div>
    </div>
</nav>
{{-- Mobile --}}
<div class="display-flex-mobile">
    <layouts-mobile-header-links-left></layouts-mobile-header-links-left>
    <a href="/" class="navbar-brand ml-5">
        <x-lazyimage width="75" height="75" :src="asset('img/logo-le-cinq-5-black.webp')" :placeholder="asset('img/logo-le-cinq-5-black.webp')"
            alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'logoMobile'" />


    </a>
    <layouts-mobile-header-links-right></layouts-mobile-header-links-right>
</div>
<div class="tf__scroll_btn" id="backToTopButton"></div>
