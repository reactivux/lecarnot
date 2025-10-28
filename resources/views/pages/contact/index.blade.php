@extends('layouts.master')
@section('meta')
    <title>  Le Carnot - Contactez nous – Fast Food Gourmand à Le Neubourg </title>
    <meta name="description"
        content="Chez Le Carnot, c’est la mamma qui régale : pizzas croustillantes, produits frais, et livraison chaude comme sortie du four !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('contactez-nous') }}" >
    <meta property="og:type" content="article" >
    <meta property="og:title" content="Le Carnot - Contactez nous – Fast Food Gourmand à Le Neubourg" >
    <meta property="og:description"
        content="Chez Le Carnot, c’est la mamma qui régale : pizzas croustillantes, produits frais, et livraison chaude comme sortie du four !" >
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}" >
@endsection
@section('content')
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
                        <img srcset="{{ asset('img/10.webp') }} 320w, {{ asset('img/10.webp') }} 1024w"
                            sizes="(max-width: 600px) 320px, 1024px" src="{{ asset('img/10.webp') }}"
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
                {{-- <div class="col-lg-4 col-xxl-4 col-xl-4 col-sm-6 col-md-6 hide-mobile">
                     <div class="image-wrapper">
                        <img srcset="{{ asset('img/12.webp') }} 320w, {{ asset('img/12.webp') }} 1024w"
                            sizes="(max-width: 600px) 320px, 1024px" src="{{ asset('img/12.webp') }}"
                            class="attachment-thumbnail size-thumbnail" alt="À propos Le Carnot -Pizzas, Fast Food Gourmand à Le Neubourg ">
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    {{-- Include   contact --}}
    @include('pages.home.contact')

@endsection
