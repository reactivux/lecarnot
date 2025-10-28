<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(env('APP_NAME')); ?> - Page not found</title> 
    <meta name="description"
        content="Bienvenue chez Le Carnot, la référence de la st . Poulet mariné, bowls, wings et tenders croustillants à souhait, servis avec passion.">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="<?php echo e(route('home')); ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot - Street Food Croustillante et Savoureuse">
    <meta property="og:description"
        content="Bienvenue chez Le Carnot, la référence de la st . Poulet mariné, bowls, wings et tenders croustillants à souhait, servis avec passion.">
    <meta property="og:image" content="<?php echo e(asset('img/pizza.webp')); ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');

        .main-error-page {
            min-height: 600px;
            margin: 0px auto;
            width: auto;
            max-width: 560px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .error-title {
            max-width: 529px;
            font-family: Rubik;
            font-size: 38px;
            font-weight: bold;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            text-align: center;
            color: #4b4b62;
            margin-bottom: 16px;
        }

        .error-subtitle {
            max-width: 568px;
            font-family: Rubik;
            font-size: 16px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.31;
            letter-spacing: normal;
            text-align: center;
            color: #4b4b62;
            margin-bottom: 24px;
        }



        .gohome {
            background-color: #c81414;
            border: 0px;
            padding: 0;
            margin: 0;
        }

        .gohome:hover {
            background-color: #a90909;
        }

        .gohome a,
        .gohome a:visited {
            display: block;
            padding: 8px 32px;
            color: #fff;
            text-decoration: none;
        }



        .n_404 {
            font-size: 184px;
            padding: 0px;
            margin: 0px;
            font-family: Rubik;
        }

        .n_404 .n_4 {
            color: #c81414;
        }

        .n_404 .n_0 {
            color: #ffda7f;
        }
    </style>
</head>

<body>
    <div class="main-error-page">
        <h1 class="n_404">
            <span class="n_4">4</span><span class="n_0">0</span><span class="n_4">4</span>
        </h1>

        <h1 class="error-title">
            Page introuvable
        </h1>
        <p class="error-subtitle">Cette page est temporairement indisponible ou a été supprimée.</p>

        <button class="gohome"><a href="/">Page d'accueil</a></button>


    </div>

</body>

</html>
<?php /**PATH F:\1- Work\1 - Scalax\1- Livcollect\Client customize website\1 - Clients\LeCarnot\resources\views/errors/404.blade.php ENDPATH**/ ?>