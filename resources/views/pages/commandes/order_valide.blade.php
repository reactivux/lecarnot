@extends('layouts.master')
@section('meta')
    <title>Le Carnot –  Fast Food Gourmand à Le Neubourg  </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot –  Fast Food Gourmand à Le Neubourg  ">
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}">
@endsection
@section('content')
    <section class="breadcrumb m_0">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1 class="title title-h1">Votre commande N° {{ $order_id }} à été réussie</h1>
                </div>
            </div>
        </div>
    </section>
    <section class=" df__pt df__pb xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 wow fadeInUp text-center" data-wow-duration="1s"
                    style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                    <div class="text-center order_valide">
                        <div class="text-center  icon_valide">
                        </div>
                        <h3 class="title title-h3 mb_10">Le restaurant a reçu votre commande</h3>
                        <a class="buttons buttons-theme buttons-md  mt_25 mb_0"
                            href="{{ route('details-commande', ['id' => $order_id]) }}">
                            Voir détails
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
