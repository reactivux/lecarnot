@extends('layouts.master')
@section('meta')
   <title>Le Carnot - Produits –  Fast Food Gourmand à Le Neubourg  </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('home') }}" >
    <meta property="og:type" content="article" >
    <meta property="og:title" content="Le Carnot - Produits –  Fast Food Gourmand à Le Neubourg  " >
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !" >
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}" >
@endsection
@section('content')
    <main>
        <section class="breadcrumb store m_0">
            <div class="breadcrumb_overlay store">
                <div class="container position-relative">
                    <div class="position-absolute top-0 end-0">
                        <modal-openingtimes></modal-openingtimes>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb_text information">
                                <h1 class="title title-h1">Votre panier</h1>
                                <div class="address">
                                    <h2>
                                        {{ $store['name'] ?? "Le Carnot" }}
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

        <page-cart-component :categories="{{ json_encode($categories) }}"></page-cart-component>

    </main>
    <style>
        .data-product {
            display: none;
        }
    </style>
@endsection
