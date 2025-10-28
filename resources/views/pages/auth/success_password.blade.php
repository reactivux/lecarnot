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
    <section class="tf__signin pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 wow fadeInUp text-center" data-wow-duration="1s"
                    style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                    <div class="text-center order_valide ">
                        <div class="text-center  icon_valide">
                        </div>
                        <h2 class="title title-h2">Votre mot de passe a été modifié.</h2>
                        <a class="buttons buttons-theme buttons-md  mt_25 mb_0" href="{{ route('signin') }}">
                            Connectez-vous
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
