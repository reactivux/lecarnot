@extends('layouts.master')
@section('meta')
    <title>Le Carnot  | Détails de commande - Fast Food Gourmand à Le Neubourg  </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot  | Fast Food Gourmand à Le Neubourg  ">
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}">
@endsection
@section('content')
    <section class="breadcrumb m_0">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1 class="title title-h1">Details commande N° {{ $order_id }}</h1>
                    <ul>
                        <li><a href="/" class="">Accueil</a></li>
                        <li><a href="/commandes" class="link-bold">commandes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <details-commande :order_id="{{ $order_id }}"></details-commande>


    {{-- <div class="container margin-main-content plr-10-per">
        <div class="row">
            <div class="col-md-">
                <div class="row justify-content-center mt_50 mb_50">
                    <div class="col-xl-7">
                        <div class="mb-2"><b>Informations personnelles</b></div>
                        @if ($order['deliveryaddress'] == null)
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    <span class="text-uppercase">
                                        {{ $order['customer']['firstName'] }}
                                        {{ $order['customer']['lastName'] }}
                                    </span>
                                </li>
                                @if ($order['cacaddress'] != null)
                                    <li class="text-muted">
                                        <span class="text-uppercase">
                                            {{ $order['cacaddress']['address'] }}
                                        </span>
                                    </li>
                                @endif
                                <li class="text-muted">
                                    <span class="text-uppercase">
                                        {{ $order['customer']['phone'] }}
                                    </span>
                                </li>
                                @if ($order['customer']['email'] != null)
                                    <li class="text-muted">
                                        <span>
                                            {{ $order['customer']['email'] }}
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        @if ($order['deliveryaddress'] != null)
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    <span class="text-uppercase">
                                        {{ $order['deliveryaddress']['firstName'] }}
                                        {{ $order['deliveryaddress']['lastName'] }}
                                    </span>
                                </li>
                                <li class="text-muted">
                                    <span class="text-uppercase">
                                        {{ $order['deliveryaddress']['address'] }}
                                    </span>
                                </li>
                                <li class="text-muted">
                                    <span class="text-uppercase">
                                        {{ $order['deliveryaddress']['phone'] }}
                                    </span>
                                </li>
                                @if ($order['customer']['email'] != null)
                                    <li class="text-muted">
                                        <span>
                                            {{ $order['customer']['email'] }}
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                    <div class="col-xl-5 text-end">
                        <ul class="list-unstyled">
                            <li class="text-muted">
                                <span class="fw-bolds">Restaurant :
                                </span>
                                <span class="">{{ $order['store_name'] }}</span>
                            </li>
                            <li class="text-muted">
                                <span class="fw-bolds">Date de la commande :
                                </span>
                                <span
                                    class="">{{ \Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d/%m/%Y à %H:%M') }}</span>
                            </li>
                            @if ($order['planified'])
                                <li class="text-muted">
                                    <span class="fw-bolds">Planifier : </span>
                                    <span
                                        class="">{{ \Carbon\Carbon::parse($order['planified_at'])->formatLocalized('%d/%m/%Y à %H:%M') }}</span>
                                </li>
                            @endif
                            <li class="text-muted">
                                <span class="me-1 fw-bolds"> Mode choisi
                                    :
                                </span>
                                <span class="text-black fw-bolds">
                                    {{ __('order.deliverytype.' . $order['type']) }}
                                </span>
                            </li>
                            @if ($order['type'] == 'at_place')
                                <li class="text-muted">
                                    @if ($order['table'] != null)
                                        <span>
                                            <span class="me-1 fw-bolds"> N° Table : </span>
                                            <span class="text-black fw-bolds">
                                                {{ $order['table']['table_number'] }}
                                            </span>
                                        </span>
                                    @endif
                                </li>
                            @endif
                            <li class="text-muted">
                                <span>
                                    <span class="me-1 fw-bolds">Paiement
                                        :
                                    </span>
                                    @if ($order['is_paid'])
                                        <span>
                                            effectue
                                        </span>
                                    @elseif (!$order['is_paid'] && $order['type'] == 'cac')
                                        <span>
                                            caisse
                                        </span>
                                    @elseif(!$order['is_paid'] && $order['type'] == 'liv')
                                        <span>
                                            livraison
                                        </span>
                                    @elseif(!$order['is_paid'] && $order['type'] == 'at_place')
                                        <span>
                                            caisse
                                        </span>
                                    @endif
                                </span>
                            </li>
                            <li class="text-muted">
                                <span>
                                    <i class="fas fa-circle" style="color: #84b0ca"></i>
                                    <span class="me-1 fw-bolds">État :
                                    </span><span class="badge text-black fw-bolds">
                                        {{ __('order.status.' . $order['status']) }}
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                @if ($order['status'] == 'canceled')
                    <div class="order-canceled row my-2 mx-1 justify-content-center">
                        <div class="col-md-12">
                            <p>
                                Votre commande a été annulée sur <b>{{ $order['store_name'] }}</b>.
                            </p>
                            <p>
                                Si votre commande a été prépayée, le remboursement de montant
                                <b> {{ $order['total_amount'] }} €</b> sera crédité sur votre compte
                                entre 7 et 10 jours
                            </p>
                            <p>Nous espérons vous revoir bientôt sur Le Carnot.</p>
                        </div>
                    </div>
                @endif
                <div class="row mt_40 mb_40">
                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <div class="tf_dashboard_order">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="tf__pro_status Produits">Produits</th>
                                            <th class="tf__pro_status Prix unitaire">Prix unitaire</th>
                                            <th class="tf__pro_status Total">Total</th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        @if (isset($order['elements_order']))
                                            @foreach ($order['elements_order'] as $element)
                                                <tr>
                                                    <td class="tf__pro_status" data-title="Nom du produit">
                                                        <span class="qte-font-weight">{{ $element['quantity'] }}</span>
                                                        x Name here
                                                        @if (isset($element['sub_elements_order']))
                                                            @foreach ($element['sub_elements_order'] as $sub_element)
                                                                <div class="sub_elements_order" style="margin-left: 11px">
                                                                    @if ($sub_element['type'] != 'size')
                                                                        <div>
                                                                            @if ($sub_element['quantity'] > 0)
                                                                                <span class="subproduct">
                                                                                    <span
                                                                                        class="qte-font-weight subproduct">{{ $sub_element['quantity'] }}</span>
                                                                                    x
                                                                                    {{ $sub_element['sub_product']['name'] }},
                                                                                    {{ $sub_element['price'] }} €
                                                                                </span>
                                                                            @else
                                                                                <span class="subproduct">
                                                                                    <span
                                                                                        class="qte-font-weight subproduct">Sans</span>
                                                                                    {{ $sub_element['sub_product']['name'] }}
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @if (isset($element['promo']))
                                                            <p>
                                                                <span>
                                                                    element.DiscountPromotionProducts.text
                                                                 </span>
                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td class="tf__pro_status" data-title="Total">
                                                        15 $
                                                     </td>
                                                    <td class="tf__pro_status" data-title="Total">
                                                        @if (isset($element['promo']))
                                                            <p class="text-decoration-line-through mt_0 mb_0">
                                                                element.DiscountPromotionProducts.totalPriceWithoutDiscount
                                                            </p>
                                                        @endif
                                                        <p class="mt_0 mb_0">
                                                            $ {{ $element['total_amount_element_subelements'] }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt_40 mb_40">
                    <div class="col-xl-7">
                        @if ($order['comment'] != null)
                            <p class="text-black float-start">
                                <b>Commentaire :</b><br />
                                <span class="text-black me-3">
                                    {{ $order['comment'] }}
                                </span>
                            </p>
                        @endif
                    </div>

                    <div class="col-xl-5 text-end">
                        <p class="text-black">
                            <span class="text-black me-3"> Total de la commande : </span><span>
                                <b>
                                    total 15
                                </b>
                            </span>
                        </p>
                        @if ($order['promocode'] != null)
                            <p class="text-black">
                                <span class="text-black me-3">
                                    Promo code
                                    <b>{{ $order['promocode']['code_number'] }}, -{{ $order['promocode']['percentage'] }}
                                        %</b>
                                    : </span><span>
                                    <b>
                                        - here add discount promocode
                                    </b>
                                </span>
                            </p>
                        @endif
                        @if ($order['loyalty_card'] != null)
                            <p class="text-black">
                                <span class="text-black me-3">
                                    Carte de fidélité {{ $order['loyalty_card']['percentage'] }}% : </span><span>
                                    <b>
                                        - DiscountLoyaltyCard
                                    </b>
                                </span>
                            </p>
                        @endif
                        @if ($order['type'] != 'liv' && $order['fees'] != null && $order['fees'] > 0)
                            <p class="text-black">
                                <span class="text-black me-3">
                                    Frais de livraison : </span><span>
                                    <b>
                                        {{ $order['fees'] }}
                                    </b>
                                </span>
                            </p>
                        @endif

                        <p class="text-black">
                            <span class="text-black me-3">
                                TotalAmount : </span><span>
                                <b>
                                    {{ $order['total_amount'] }}
                                </b>
                            </span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
@endsection
