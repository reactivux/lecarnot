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
            <div class="row justify-content-center wow fadeInUp" data-wow-duration="1s"
                style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                <div class="col-xl-6 col-sm-10 col-md-8 col-lg-6">
                    <div class="tf__login_area item-bg-color ">
                        <h2 class="title title-h2 mb_10 text-center d-block">Réinitialisation du mot de passe</h2>
                        <p class="text text-center ">Veuillez saisir votre e-mail pour réinitialiser votre mot de passe </p>
                        <form class="sign-form" method="post" action="{{ route('customer.recoverPassword') }}">
                            @csrf
                            <div class="mb_25">
                                <input placeholder="uuid" name="uuid" type="hidden" value="{{ env('MIX_UUID') }}">
                            </div>
                            <div class="mb_25">
                                <input placeholder="Email" name="email" type="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-start help error-danger">{{ $message }}</div>
                                @enderror
                                @error('status424')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                                @error('status404')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <button class="buttons buttons-theme buttons-md w-100" type="submit">Réinitialiser</button>
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
