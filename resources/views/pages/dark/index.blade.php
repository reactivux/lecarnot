@extends('layouts.master')
@section('meta')
    <title> Contactez Le Carnot : Votre Satisfaction, Notre Mission</title>
    <meta name="description"
        content="Besoin d'assistance, d'une commande spéciale ou simplement envie de partager vos impressions? Contactez Le Carnot dès maintenant.">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('contactez-nous') }}" >
    <meta property="og:type" content="article" >
    <meta property="og:title" content="Contactez  Le Carnot : Votre Satisfaction, Notre Mission" >
    <meta property="og:description"
        content="Besoin d'assistance, d'une commande spéciale ou simplement envie de partager vos impressions? Contactez Le Carnot dès maintenant." >
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}" >
@endsection
@section('content')
    <section class="tf__custom_banner position-relative">
        <div class="bg-header-3 lazy-background" data-src="https://ocrusty.scalax.co/img/le-cinq-5-bg-bannier.webp"
            style="background-image: url(&quot;https://ocrusty.scalax.co/img/le-cinq-5-bg-bannier.webp&quot;);"></div>
        <div class="tf__custom_banner_overlay"><span class="banner_shape_2">
                <x-lazyimage width="75" height="75" :src="asset('img/tree_2.webp')" :placeholder="asset('img/tree_2.webp')"
                    alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'lazy img-fluid w-100'" />
            </span><span class="banner_shape_4">
                <x-lazyimage width="75" height="75" :src="asset('img/tree_4.webp')" :placeholder="asset('img/tree_4.webp')"
                    alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'lazy img-fluid w-100'" />
            </span><span class="banner_shape_5">
                <x-lazyimage width="75" height="75" :src="asset('img/tree_5.webp')" :placeholder="asset('img/tree_5.webp')"
                    alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'lazy img-fluid w-100'" />
            </span><span class="banner_shape_6">
                <x-lazyimage width="75" height="75" :src="asset('img/tree_6.webp')" :placeholder="asset('img/tree_6.webp')"
                    alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'lazy img-fluid w-100'" />
            </span>
            <div class="banner_content_text h-100 row d-flex justify-content-center align-items-center pl_80 pr_80">
                <div class="col-md-10 text-center m-0-auto col-text">
                    <div class="banner_txt">
                        <div class="banner_h1">
                            <h1 class="title title-h1"> Bienvenue à </h1>
                        </div>
                        <div class="banner_h2">
                            <h2> Le Carnot </h2>
                        </div>
                        <div class="banner_p">
                            <p> Première bouchée, plaisir immédiat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center col-img">
                    <div class="banner_img w-40 m-0-auto">
                        <x-lazyimage width="75" height="75" :src="asset('img/price_burger.webp')" :placeholder="asset('img/price_burger.webp')"
                            alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'lazy img-fluid w-100'" />
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- Top categories --}}
    @if ($topCategories)
        <section class="section section-top-categories df__pt df__pb primary-bg section-bg-after position-relative">
            <div class="container">
                <div class="row position-relative">
                    <div class="col-12">
                        <div class="heading ">
                            <h3 class="subtitle subtitle-h3 ">Une variété alléchante de délices à déguster</h3>
                            <h2 class="title title-h2 title-h2-center">Toutes nos catégories </h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="categories-swiper  categories-list">
                            <div class="swiper-wrapper ">
                                @foreach ($topCategories as $categorie)
                                    <div class="swiper-slide">
                                        <a class="w-100" href="/produits/#{{ $categorie['name'] }}" title="Burgers">
                                            <div class="w-100 category-item">
                                                <div class="category-head">
                                                    <div class="category-img">
                                                        @if (isset($categorie['bankimage']) && $categorie['bankimage'] !== null)
                                                            <x-lazyimage width="175" height="175" :src="env('MIX_BASE_URL') .
                                                                $categorie['bankimage']['path_image']"
                                                                :placeholder="env('MIX_BASE_URL') .
                                                                    $categorie['bankimage']['path_image']" :alt="$categorie['name']" :class="''" />
                                                        @else
                                                            <x-lazyimage width="175" height="175" :src="env('MIX_APP_URL') . env('MIX_DEFAULT_IMAGE')"
                                                                :placeholder="env('MIX_APP_URL') .
                                                                    env('MIX_DEFAULT_IMAGE')" :alt="$categorie['name']" :class="''" />
                                                        @endif
                                                    </div>
                                                    <div class="category-name">
                                                        <h3 class="title title-h3">{{ $categorie['name'] }}</h3>
                                                        <div class="category-total">
                                                            <span class="total">
                                                                {{ $categorie['total_products'] }}
                                                                produits
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="display-mobile swiper-button-prev"></div>
                            <div class="display-mobile swiper-button-next"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- end top categories --}}

    <section
        class="section section-opening-hours  section-opening-hours-bg-coverdf__pt df__pb secondary-bg section-bg-after">
        <div class="container">
            <div class="  row align-center z-index-1 position-relative">
                <div class="col-xl-4 col-lg-6">
                    <div class=" df__mr_80 ">
                        <div class="content_text d-flex justify-content-center align-items-center  ">
                            <div class="df__pt_25 df__pt df__pb_25">
                                <div class="heading">
                                    <h2 class="title title-h2 title-h2-left">Notre histoire </h2>
                                </div>
                                <div class="tf__about_us_text">
                                    <p class="text"><strong>Le Carnot</strong> est devenu le repère ultime des amateurs de
                                        saveurs
                                        rapides et délicieuses. </p>
                                    <p class="text"> Notre histoire commence avec la passion de rendre les repas rapides
                                        tout aussi
                                        savoureux que satisfaisants. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <x-lazyimage width="175" height="175" :src="asset('img/le-cinq-5-kebab.webp')" :placeholder="asset('img/le-cinq-5-kebab.webp')" alt="Le Carnot"
                        :class="'img-fluid w-100 h-100'" />
                </div>
                <div class="col-xl-4 col-lg-12 df__pl_50">
                    <div class="text-light home-worktimes list-hours ">
                        <home-opening-times></home-opening-times>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section section-about df__pt df__pb  position-relative primary-bg">
        <div class="about-thumb about-thumb-left">
            <div class="item"
                style="background-image: url(https://validthemes.net/site-template/restan/assets/img/about/2.jpg);"></div>
            <div class="item"
                style="background-image: url(https://validthemes.net/site-template/restan/assets/img/about/3.jpg);"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="about-style-one-info heading secondary-bg">
                        <img src="https://validthemes.net/site-template/restan/assets/img/shape/2.png"
                            alt="Image Not Found">
                        <h3 class="subtitle subtitle-h3   ">About us</h3>
                        <h2 class="title title-h2 title-h2-left  ">We Invite You <br> To Visit Our Restaurant
                        </h2>
                        <p class="text">
                            A relaxing and pleasant atmosphere, good jazz, dinner, and cocktails. The Patio Time Bar opens
                            in the center of Florence. The only bar inspired by the 1960s, it will give you a experience
                            that you’ll have a hard time forgetting.
                        </p>
                        <a class="buttons buttons-theme buttons-md animation mt_10" href="about-us.html">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- contact --}}
    <section class="section section-contact df__pt df__pb primary-bg  position-relative">
        <div class="container">
            <div class="row position-relative">
                <div class="col-md-7">
                    <div class="heading ">
                        <h3 class="subtitle subtitle-h3 ">contact</h3>
                        <h2 class="title title-h2 title-h2-center">Contactez nous </h2>
                    </div>
                    <p class="text">
                        A relaxing and pleasant atmosphere, good jazz, dinner, and cocktails. The Patio Time Bar
                        opens
                        in the center of Florence. The only bar inspired by the 1960s, it will give you a
                        experience
                        that you’ll have a hard time forgetting.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-info ">
                        <div class="contact-item">
                            <div class="contact-media-group">
                                <div class="contact-icon-wrapper">
                                    <div class="contact-icon">
                                        <span class="icon icon-contact  icon-location"></span>

                                    </div>
                                </div>
                                <div class="contact-content  ">
                                    <div class=" title">Adresse</div>
                                    <div class=" subtitle">
                                        <p class="text-color item">
                                            2 Rue Carnot, 27110 Le Neubourg, France
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-media-group">
                                <div class="contact-icon-wrapper">
                                    <div class="contact-icon">
                                        <span class="icon icon-contact  icon-phone"></span>

                                    </div>
                                </div>
                                <div class="contact-content  ">
                                    <div class=" title">Numéro de téléphone</div>
                                    <div class=" subtitle">
                                        <a class="text-color item" href="tel:++33278989368" rel="nofollow">
                                            +33 2 78 98 93 68
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- end contact --}}


    <section class="section section-map df__pt df__pb  position-relative secondary-bg">
        <div class="container">
            <div class="tf__contact_map_area">
                <div class="row    ">
                    <div class="col-12">
                        <div class="heading ">
                            <h3 class="subtitle subtitle-h3 ">Une variété alléchante de délices à déguster</h3>
                            <h2 class="title title-h2 title-h2-center">Toutes nos catégories </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <div class="tf__contact_map"><a class="w-100 h-100" target="_blank"
                                href="https://www.google.com/maps/place/44+Rue+de+Louviers,+27400+Acquigny,+France/@49.1763567,1.1782507,16z/data=!4m6!3m5!1s0x47e13b189ca8519f:0x3ca8f774076f87b7!8m2!3d49.1765847!4d1.1737017!16s%2Fg%2F11pkb34z0c?entry=ttu">
                                <x-lazyimage width="75" height="75" :src="asset('img/map-home.webp')" :placeholder="asset('img/map-home.webp')"
                                    alt=" Le Carnot - Street Food Croustillante et Savoureuse "
                                    :class="'img-fluid'" />

                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section section-txt-img df__pt df__pb position-relative primary-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class=" section_content  ">
                        <div class="heading">
                            <h3 class="subtitle subtitle-h3  ">About us</h3>
                            <h2 class="title title-h2 title-h2-left  ">We Invite You To Visit Our
                                Restaurant
                            </h2>
                        </div>
                        <p class="text">
                            A relaxing and pleasant atmosphere, good jazz, dinner, and cocktails. The Patio Time Bar
                            opens
                            in the center of Florence. The only bar inspired by the 1960s, it will give you a experience
                            that you’ll have a hard time forgetting.
                        </p>
                        <a class="buttons buttons-theme buttons-md animation mt_10" href="about-us.html">Discover
                            More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img h-100">
                        <x-lazyimage width="75" height="75" :src="asset('img/pizza.webp')" :placeholder="asset('img/pizza.webp')"
                            alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="'img-fluid'" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-services position-relative secondary-bg">
        <div class="services-list">
            <div class="service-item">
                <div class="item-icon-wrapper">
                    <div class="item-icon-holder">
                        <span class="item-icon-background">
                            <img loading="lazy" decoding="async" width="114" height="85"
                                src="https://dishify.siswebapp.com/wp-content/uploads/2024/04/icon-bg-white.png"
                                class="attachment-thumbnail size-thumbnail" alt=""> </span>
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-box-tissue" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M383.88,287.82l64-192H338.47a70.2,70.2,0,0,1-66.59-48,70.21,70.21,0,0,0-66.6-48H63.88l64,288Zm-384,192a32,32,0,0,0,32,32h448a32,32,0,0,0,32-32v-64H-.12Zm480-256H438.94l-21.33,64h14.27a16,16,0,0,1,0,32h-352a16,16,0,1,1,0-32H95.09l-14.22-64h-49a32,32,0,0,0-32,32v128h512v-128A32,32,0,0,0,479.88,223.82Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="item-content">
                    <h3 class="item-title">
                        Authenticité
                    </h3>
                    <div class="item-text">
                        <p>Nous privilégions des ingrédients locaux et de première qualité, garantissant ainsi la fraîcheur
                            et la qualité exceptionnelle de nos produits.</p>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="item-icon-wrapper">
                    <div class="item-icon-holder">
                        <span class="item-icon-background">
                            <img loading="lazy" decoding="async" width="114" height="85"
                                src="https://dishify.siswebapp.com/wp-content/uploads/2024/04/icon-bg-white.png"
                                class="attachment-thumbnail size-thumbnail" alt=""> </span>
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-box-tissue" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M383.88,287.82l64-192H338.47a70.2,70.2,0,0,1-66.59-48,70.21,70.21,0,0,0-66.6-48H63.88l64,288Zm-384,192a32,32,0,0,0,32,32h448a32,32,0,0,0,32-32v-64H-.12Zm480-256H438.94l-21.33,64h14.27a16,16,0,0,1,0,32h-352a16,16,0,1,1,0-32H95.09l-14.22-64h-49a32,32,0,0,0-32,32v128h512v-128A32,32,0,0,0,479.88,223.82Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="item-content">
                    <h3 class="item-title">
                        Distinctif
                    </h3>
                    <div class="item-text">
                        <p> Tous nos sandwichs sont préparés sur le grill, conférant à chaque bouchée une saveur grillée
                            distinctive qui intensifie le caractère juteux et délicieux de nos créations. </p>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="item-icon-wrapper">
                    <div class="item-icon-holder">
                        <span class="item-icon-background">
                            <img loading="lazy" decoding="async" width="114" height="85"
                                src="https://dishify.siswebapp.com/wp-content/uploads/2024/04/icon-bg-white.png"
                                class="attachment-thumbnail size-thumbnail" alt=""> </span>
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-box-tissue" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M383.88,287.82l64-192H338.47a70.2,70.2,0,0,1-66.59-48,70.21,70.21,0,0,0-66.6-48H63.88l64,288Zm-384,192a32,32,0,0,0,32,32h448a32,32,0,0,0,32-32v-64H-.12Zm480-256H438.94l-21.33,64h14.27a16,16,0,0,1,0,32h-352a16,16,0,1,1,0-32H95.09l-14.22-64h-49a32,32,0,0,0-32,32v128h512v-128A32,32,0,0,0,479.88,223.82Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="item-content">
                    <h3 class="item-title">
                        À la demande </h3>
                    <div class="item-text">
                        <p> Chaque sandwich est confectionné à la demande, juste au moment de votre commande, assurant ainsi
                            une expérience culinaire personnalisée et toujours fraîche. </p>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="item-icon-wrapper">
                    <div class="item-icon-holder">
                        <span class="item-icon-background">
                            <img loading="lazy" decoding="async" width="114" height="85"
                                src="https://dishify.siswebapp.com/wp-content/uploads/2024/04/icon-bg-white.png"
                                class="attachment-thumbnail size-thumbnail" alt=""> </span>
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-box-tissue" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M383.88,287.82l64-192H338.47a70.2,70.2,0,0,1-66.59-48,70.21,70.21,0,0,0-66.6-48H63.88l64,288Zm-384,192a32,32,0,0,0,32,32h448a32,32,0,0,0,32-32v-64H-.12Zm480-256H438.94l-21.33,64h14.27a16,16,0,0,1,0,32h-352a16,16,0,1,1,0-32H95.09l-14.22-64h-49a32,32,0,0,0-32,32v128h512v-128A32,32,0,0,0,479.88,223.82Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="item-content">
                    <h3 class="item-title">
                        30 MINUTES DELIVERY
                    </h3>
                    <div class="item-text">
                        <p>The Bigsurf Wave Board an innovative and water equipment designed for riders looking to conquer
                            the</p>
                    </div>
                </div>
            </div>

        </div>
    </section>



@endsection
