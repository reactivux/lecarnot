<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class storeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         $cacheKey = 'store_' . md5('stores/' . env('MIX_UUID'));
        if(Cache::has($cacheKey))
        {
            $store = Cache::get($cacheKey); 
        }else{
            $apiResponse = Http::timeout(3000)->get(env('MIX_CUSTOMER_BASE_URL') . 'stores/' . env('MIX_UUID')) ;
            $store = $apiResponse->json();
          //  dd(env('MIX_CUSTOMER_BASE_URL') . 'stores/' . env('MIX_UUID'));
            $store = $store['data'] ;
            Cache::add($cacheKey, $store, 30);
        }
         $cacheKey = 'top_categories_list_' . md5('top-categories/' . env('MIX_UUID'));
        if(Cache::has($cacheKey))
        {
            $ListTopCategories = Cache::get($cacheKey);
        }else{
            $apiResponse = Http::timeout(3000)->get(env('MIX_CUSTOMER_BASE_URL') . 'top-categories/' . env('MIX_UUID') ) ;
            $ListTopCategories = $apiResponse->json();
            Cache::add($cacheKey, $ListTopCategories, 15);
        }
        $topCategories = $ListTopCategories['data'];
         $request->merge(compact('store', 'topCategories'));
        return $next($request);  
    }
}
