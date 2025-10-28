<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SitemapController extends Controller
{
 

    public function generate(Request $request) {
        $cacheKey = 'product_list_' . md5('products/' . env('MIX_UUID'));
        if(Cache::has($cacheKey))
        {
            $categories = Cache::get($cacheKey);
        }else{
            $apiResponse = Http::get(env('MIX_CUSTOMER_BASE_URL') . 'products/' . env('MIX_UUID') );
            $categories = $apiResponse->json();
            Cache::add($cacheKey, $categories, 15);
        } 
        $domainUrl = $request->root();
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml .= "<url> 
                    <loc>".$domainUrl."/</loc>
                    <lastmod>".date("Y-m-d H:i:s" )  . "</lastmod>
                    <changefreq>daily</changefreq><priority>1.0</priority> 
                </url><url> 
                    <loc>".$domainUrl."/politique-de-confidentialite</loc>
                    <lastmod>".date("Y-m-d H:i:s" )  . "</lastmod>
                    <changefreq>daily</changefreq><priority>1.0</priority> 
                </url>
                <url> 
                    <loc>".$domainUrl."/produits</loc>
                    <lastmod>".date("Y-m-d H:i:s" )  . "</lastmod>
                    <changefreq>daily</changefreq><priority>1.0</priority> 
                </url>
                <url> 
                    <loc>".$domainUrl."/auth/signin</loc>
                    <lastmod>".date("Y-m-d H:i:s" )  . "</lastmod>
                    <changefreq>daily</changefreq><priority>1.0</priority> 
                </url>
                <url> 
                    <loc>".$domainUrl."/auth/signup</loc>
                    <lastmod>".date("Y-m-d H:i:s" )  . "</lastmod>
                    <changefreq>daily</changefreq><priority>1.0</priority> 
                </url>
                <url> 
                    <loc>".$domainUrl."/contactez-nous</loc>
                    <lastmod>".date("Y-m-d H:i:s" )  . "</lastmod>
                    <changefreq>daily</changefreq><priority>1.0</priority> 
                </url> ";
         foreach ($categories['data'] as $category){
            foreach ($category['products'] as $product){
                $xml .= "<url> <loc>". route('single-product', $product['slug']) ."</loc>";
                $xml .="<lastmod>".  date("Y-m-d H:i:s",  strtotime($product['updated_at']) )  ."</lastmod>";
                $xml .="<changefreq>daily</changefreq><priority>1.0</priority> </url> ";
            }
        }
        $xml .='</urlset>';
        return response($xml)->header('Content-Type', 'text/xml');
    }


}
