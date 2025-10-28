@extends('layouts.master')
@section('meta')
    <title>Le Carnot - {{ $product['category']['name'] . ' - ' . $product['name'] }} </title>
     <meta name="description"
        content="Bienvenue chez Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot - {{ $product['category']['name'] . ' - ' . $product['name'] }} ">
    <meta property="og:description"
        content="Bienvenue chez Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}">


@endsection
@section('content')
    <main>
        <section class="breadcrumb m_0">
            <div class="breadcrumb_overlay">
                <div class="container">
                    <div class="breadcrumb_text">
                        <h1 class="title title-h1">{{ $product['category']['name'] }}, {{ $product['name'] }} </h1>
                    </div>
                </div>
            </div>
        </section>
        <singleproduct-component :single-product="{{ json_encode($product) }}"></singleproduct-component>
    </main>
@endsection
