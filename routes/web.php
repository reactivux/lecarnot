<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/contactez-nous', function(Request $request){
    return view('pages.contact.index', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
})->middleware('store-middleware')->name('contactez-nous');

 Route::get('/a-propos', function(Request $request){
    return view('pages.about.index', ['store' => $request->query('store') ,'topCategories' => $request->query('topCategories')]);
})->middleware('store-middleware')->name('a-propos');

Route::get('/panier', [ProductController::class, 'Cart'])->middleware('store-middleware')->name('panier');

Route::get('/', [ProductController::class, 'fetchCategories'])->middleware('store-middleware')->name('home');
Route::get('/produits', [ProductController::class, 'fetchProducts'])->middleware('store-middleware')->name('produits');
Route::get('/single-product/{slug}', [ProductController::class, 'singleProduct'])->middleware('store-middleware')->name('single-product');

/** Customer */
Route::get('/commandes', [CustomerController::class, 'fetchOrders'])->middleware('store-middleware')->name('commandes');
Route::get('/commandes/{id}', [CustomerController::class, 'fetchDetailsOrder'])->middleware('store-middleware')->name('details-commande');
Route::get('/order-sent/{id}', [CustomerController::class, 'commandeValider'])->middleware('store-middleware')->name('commandeValider');
Route::get('/adresses-livraison', [CustomerController::class, 'fetchDeliveriesAddresses'])->middleware('store-middleware')->name('adresses-livraison');
Route::get('/checkout', [CustomerController::class, 'getCheckout'])->middleware('store-middleware')->name('checkout');

/** Auth */
 
Route::get('/signin', [CustomerController::class, 'pageSignIn'])->middleware('store-middleware')->name('signin');
Route::post('/signin', [CustomerController::class, 'signin'])->middleware('store-middleware')->name('customer.signin');

 
 Route::get('/signup', function(Request $request){
    return view('pages.auth.signup', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
})->middleware('store-middleware')->name('signup');
Route::post('/signup', [CustomerController::class, 'signup'])->middleware('store-middleware')->name('customer.signup');

Route::get('email/verify/{id}/{hash}', [
    CustomerController::class,
    'verify',
])->middleware('store-middleware')->name('verification.verify');

Route::get('/recover-password', function(Request $request){
    return view('pages.auth.recover_password', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
})->middleware('store-middleware')->name('recover-password');
Route::post('/recover-password', [CustomerController::class, 'recoverPassword'])->middleware('store-middleware')->name('customer.recoverPassword');

Route::get('/reset-password/{reset_token?}', [CustomerController::class, 'getResetPassword'])->middleware('store-middleware')->name('getResetPassword');
Route::post('/reset-password', [CustomerController::class, 'resetPassword'])->middleware('store-middleware')->name('customer.resetPassword');

Route::get('/edit-password', function(Request $request){
    return view('pages.auth.edit_password', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
})->middleware('store-middleware')->name('edit-password');
Route::post('/edit-password', [CustomerController::class, 'editPassword'])->middleware('store-middleware')->name('customer.editPassword');




Route::get('/sitemap.xml',  [SitemapController::class, 'generate']);

 Route::get('/mentions-legals', function(Request $request){
    return view('pages.mentions_legales', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
})->middleware('store-middleware')->name('mentions_legales');

 Route::get('/politique-de-confidentialite', function(Request $request){
    return view('pages.politique_confidentialite', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
})->middleware('store-middleware')->name('politique_confidentialite');

 Route::get('/conditions-generales-de-vente-et-utilisation', function(Request $request){
    return view('pages./cgv_cgu', ['store' => $request->query('store') ,'topCategories' => $request->query('topCategories')]);
})->middleware('store-middleware')->name('/cgv_cgu');