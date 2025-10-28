@extends('layouts.master')
@section('meta')
   <title>Le Carnot –  Fast Food Gourmand à Le Neubourg  </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('home') }}" >
    <meta property="og:type" content="article" >
    <meta property="og:title" content="Le Carnot –  Fast Food Gourmand à Le Neubourg  " >
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !" >
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}" >
@endsection
@section('content')
    <section class="tf__signin pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-duration="1s"
                style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                <div class="col-xl-6 col-sm-10 col-md-8 col-lg-6">
                    <div class="tf__login_area item-bg-color  ">
                        <h2 class="title title-h2 mb_10 text-center d-block">Rejoignez-nous dès maintenant !</h2>
                        <p class="text text-center d-block"> Inscrivez-vous pour continuer </p>
                        <form method="POST" action="{{ route('customer.signup') }}">
                            @csrf
                            <div class="mb_25">
                                <input placeholder="Email" name="email" type="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                                @error('status422.email')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb_25">
                                <input placeholder="Prénom" name="firstName" type="text" value="{{ old('firstName') }}">
                                @error('firstName')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb_25">
                                <input placeholder="Nom" name="lastName" type="text" value="{{ old('lastName') }}">
                                @error('lastName')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb_25">
                                <input placeholder="Téléphone" name="phone" type="text" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb_25">
                                <input placeholder="Mot de passe" name="password" type="password">
                                @error('password')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb_25">
                                <input placeholder="Confirmation mot de passe" name="password_confirmation" type="password">
                                @error('password_confirmation')
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            @error('status401')
                                <div class="mb_25">
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                </div>
                            @enderror
                            @error('status400')
                                <div class="mb_25 alert alert-danger">
                                    <div class="text-start help error-danger">{{ __($message) }}</div>
                                </div>
                            @enderror

                            <button class="buttons buttons-theme buttons-md w-100" type="submit"> Je m'inscris</button>
                        </Form>
                        <div class="create_account text-center black-color">
                            <div><b> Déjà membre ?</b></div>
                            <a href="{{ route('signin') }}{{ Request::get('to') ? '/?to=' . Request::get('to') : '' }}">
                                Connectez-vous ici
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
