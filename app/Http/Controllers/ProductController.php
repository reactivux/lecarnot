<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function Cart(Request $request)
    {
        $cacheKey = 'product_list_' . md5('products/' . env('MIX_UUID'));
        if (Cache::has($cacheKey)) {
            $categories = Cache::get($cacheKey);
        } else {
            $apiResponse = Http::get(env('MIX_CUSTOMER_BASE_URL') . 'products/' . env('MIX_UUID'));
            $categories = $apiResponse->json();
            Cache::add($cacheKey, $categories, 15);
        }
        return view('pages.products.cart', ['categories' => $categories['data'], 'store' => $request->query('store'), 'topCategories' => $request->query('topCategories')]);
    }

    public function fetchProducts(Request $request)
    {
        $cacheKey = 'product_list_' . md5('products/' . env('MIX_UUID'));
        if (Cache::has($cacheKey)) {
            $categories = Cache::get($cacheKey);
        } else {
            $apiResponse = Http::get(env('MIX_CUSTOMER_BASE_URL') . 'products/' . env('MIX_UUID'));
            $categories = $apiResponse->json();
            Cache::add($cacheKey, $categories, 15);
        }

        return view('pages.products.index', ['categories' => $categories['data'], 'store' => $request->query('store'), 'topCategories' => $request->query('topCategories')]);
    }

    public function fetchCategories(Request $request)
    {
        // $cacheKey = 'top_categories_list_' . md5('top-categories/' . env('MIX_UUID'));
        // if(Cache::has($cacheKey))
        // {
        //     $topCategories = Cache::get($cacheKey);
        // }else{
        //     $apiResponse = Http::timeout(3000)->get(env('MIX_CUSTOMER_BASE_URL') . 'top-categories/' . env('MIX_UUID') ) ;
        //     $topCategories = $apiResponse->json();
        //     Cache::add($cacheKey, $topCategories, 15);
        // } 
       
        //  $cacheKey = 'current_promotions_list_' . md5('current-promotions/' . env('MIX_UUID'));
        // if (Cache::has($cacheKey)) {
        //     $currentPromos = Cache::get($cacheKey);
        // } else {
        //     $apiResponse = Http::timeout(3000)->get(env('MIX_CUSTOMER_BASE_URL') . 'current-promotions/' . env('MIX_UUID'));
        //     $currentPromos = $apiResponse->json();
        //     Cache::add($cacheKey, $currentPromos, 15);
        // } 

        $cacheKey = 'categories_products_list_' . md5('category-products/' . env('MIX_UUID'));
        if (Cache::has($cacheKey)) {
            $categoriesProducts = Cache::get($cacheKey);
        } else {
            $apiResponse = Http::timeout(3000)->post(env('MIX_CUSTOMER_BASE_URL') . 'category-products/' . env('MIX_UUID'), [
                "name" => ["Nos pizzas Sauce Tomate", "Nos pizzas Crème fraiche", "Nos pizzas spéciales"],
                "limit"  => "4"
            ]);

            $categoriesProducts = $apiResponse->json();

            Cache::add($cacheKey, $categoriesProducts, 15);
        }

        //
        return view('pages.home.index', [   'categoriesProducts' => $categoriesProducts['data'] ?? [],    'store' => $request->query('store'), 'topCategories' => $request->query('topCategories')]);
    }

    public function singleProduct(Request $request, $slug = null)
    {
        $response = Http::get(env('MIX_CUSTOMER_BASE_URL') . 'slugProducts/'  . env('MIX_UUID') . '/' . $slug);
        $product = $response->json(); 
        if ($product['data'])
            return view('pages.products.singleproduct', ['product' => $product['data'], 'store' => $request->query('store'), 'topCategories' => $request->query('topCategories')]);
        else
            return redirect()->route('produits');
    }
}
