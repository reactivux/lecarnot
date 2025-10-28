@extends('layouts.master')
@section('meta')
    <title>Le Carnot - Commandes | Fast Food Gourmand à Le Neubourg  </title>
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
                    <h1 class="title title-h1">Historique des commandes</h1>
                    <ul>
                        <li><a href="/" class="">Accueil</a></li>
                        <li><a class="link-bold">commandes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <commandes-component></commandes-component>
    {{-- <section class=" df__pt df__pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp">
                    <div class="tf_dashboard_order">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="tf__pro_status N° Commande">N° Commande</th>
                                        <th class="tf__pro_status Date">Date</th>
                                        <th class="tf__pro_status Livraison">Livraison</th>
                                        <th class="tf__pro_status État">État</th>
                                        <th class="tf__pro_status Total">Total</th>
                                        <th class="tf__pro_status Paiement">Paiement</th>
                                        <th class="tf__pro_status Action">Action</th>
                                    </tr>
                                </tbody>
                                @foreach ($orders['data'] as $order)
                                    <tbody>
                                        <tr class="">
                                            <td class="tf__pro_status" data-title="Commande">n° {{ $order['id'] }}
                                            </td>
                                            <td class="tf__pro_status" data-title="Date">
                                                {{ \Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d/%m/%Y à %H:%M') }}
                                            </td>
                                            <td class="tf__pro_status" data-title="Livraison">
                                                {{ __('order.deliverytype.' . $order['type']) }}
                                            </td>
                                            <td class="tf__pro_status" data-title="État">
                                                <span class="status pending"> {{ __('order.status.' . $order['status']) }}
                                                </span>
                                            </td>
                                            <td class="tf__pro_status" data-title="Total"> {{ $order['total_amount'] }} €
                                                pour 1
                                                article(s) </td>
                                            <td class="tf__pro_status" data-title="Paiement">
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
                                            </td>
                                            <td class="tf__pro_status" data-title="Actions"><a
                                                    href="{{ route('fetchDetailsOrder', ['id' => $order['id']]) }}"
                                                    class="color-secondaire">Voir</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf__pagination mt_50">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="...">

                            @if ($orders['last_page'] > 1)
                                <ul class="pagination">
                                    @if ($orders['current_page'] > 1)
                                        <li class="page-item">
                                            <a class="page-link first_last prev "
                                                href="{{ route('fetchOrders') }}?page={{ $orders['current_page'] - 1 }}">
                                            </a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $orders['last_page']; $i++)
                                        <li class=" page-item">
                                            <a class="page-link  {{ $i === $orders['current_page'] ? 'activated' : '' }}"
                                                href="{{ route('fetchOrders') }}?page={{ $i }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($orders['current_page'] < $orders['last_page'])
                                        <li class="page-item">
                                            <a
                                                class="page-link first_last next"href="{{ route('fetchOrders') }}?page={{ $orders['current_page'] + 1 }}">
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            @endif

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
