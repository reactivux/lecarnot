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
                    <h1 class="title title-h1">MENTIONS LÉGALES</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="  df__pt df__pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb_20">
                    <h5 class="mb_10 title title-h5"> ÉDITEUR </h5>
                    <p class="text-color"> Le site <strong>{{ $_SERVER['HTTP_HOST'] }}</strong> est édité par
                        <a class="href-color" href="https://reactivux.com" target="_blank"><strong>REACTIVUX</strong> </a>,
                        Société par
                        actions
                        simplifiée au
                        capital de
                        1 000 euros, immatriculée au RCS de sous le numéro 905161352,
                    </p>
                    <p class="text-color"><b>Siège social</b> : 40 VOIE DE L’EPARGNE À VAL DE REUIL </p>
                    <p class="text-color"><b>Numéro de TVA</b> : FR11905161352 </p>
                    <p class="text-color"><b>Téléphone</b> : +33 6 67 50 24 69 </p>
                    <p class="text-color"><b>E-mail</b> : contact@reactivux.com</p>
                </div>
                <div class="col-md-12 mb_20">
                    <h5 class="mb_10 title title-h5"> HÉBERGEUR </h5>
                    <p class="text-color">OVH (shared hosting)</p>
                    <p class="text-color"><b>Siège social</b> : 2 rue Kellermann - 59100 Roubaix - France. </p>
                </div>
                <div class="col-md-12 mb_20">
                    <h5 class="mb_10 title title-h5"> PROPRIÉTÉ INTELLECTUELLE </h5>
                    <p class="text-color">L'ensemble du site, y compris sa structure et son contenu (textes, tableaux,
                        graphiques, images,
                        photographies, vidéos, sons, bases de données, applications et logiciels), est protégé par le
                        droit d'auteur et de propriété intellectuelle de <a class="href-color"
                            href="https://reactivux.com/"><strong>REACTIVUX</strong></a> ou de ses fournisseurs et
                        prestataires.</p>
                </div>
                <div class="col-md-12 mb_20">
                    <h5 class="mb_10 title title-h5"> DONNÉES PERSONNELLES </h5>
                    <p class="text-color"><a class="href-color" href="https://reactivux.com/"><strong>REACTIVUX</strong></a>
                        s'engage à mettre
                        en œuvre un
                        traitement de vos données personnelles respectueux de
                        votre vie privée et conforme à la législation française et européenne en vigueur.</p>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
