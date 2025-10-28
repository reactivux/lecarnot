@extends('layouts.master')
@section('meta')
    <title>Le Carnot - Produits – Fast Food Gourmand à Le Neubourg </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg ! ">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('produits') }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot –  Fast Food Gourmand à Le Neubourg  ">
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg ! ">
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}">
    <link rel="preload" as="image" href="{{ asset('img/bg-product.webp') }}">
@endsection
@section('content')
    <main>
        <section class="parallax-section    ">
            <img src="{{ asset('img/le-cinq-5-chicken-avec-frite.webp') }}" class="parallax" alt="Parallax Image">
            <div class="overlay-gradient"></div>
            <div class="position-absolute top-0 end-0">
                <modal-openingtimes></modal-openingtimes>
            </div>
            <div class="overlay-content  ">
                <div class="container position-relative">

                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="breadcrumb_text information">
                                <h1 class="title title-h1">{{ $store['name'] ?? 'Le Carnot' }}</h1>
                                <div class="address">
                                    <h2>
                                        <span class="fs1" aria-hidden="true" data-icon=""></span>
                                        {{ $store['address'] ?? '2 Rue Carnot, 27110 Le Neubourg, France ' }}

                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <opening-times></opening-times>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @if (isset($store['config_loyalty'][0]))
            <loyaltycard-component :config_loyalty="{{ json_encode($store['config_loyalty'][0]) }}"></loyaltycard-component>
        @endif

        <products-component :categories="{{ json_encode($categories) }}"></products-component>

    </main>
@endsection