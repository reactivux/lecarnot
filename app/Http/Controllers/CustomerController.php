<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{


    public function fetchDeliveriesAddresses( Request $request )
    {

        return view('pages.deliveries_addresses.index', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ] );
    }

    public function fetchOrders(Request $request)
    {

        return view('pages.commandes.index', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ] );
    }

    public function fetchDetailsOrder(Request $request, $id)
    {

        return view('pages.commandes.details', ['order_id' => $id , 'store' => $request->query('store') ,'topCategories' => $request->query('topCategories')] );

    }

    public function commandeValider(Request $request, $id = null)
    {
        if($id)
            return view('pages.commandes.order_valide', ['order_id' => $id , 'store' => $request->query('store') ,'topCategories' => $request->query('topCategories') ]);
        else {
            return redirect()->route('home');
        }
    }

    public function getCheckout(Request $request)
    {

        return view('pages.checkout', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
    }


    /***Route auth */
     public function pageSignIn(Request $request)
    {
       // dd($request->query('to') ) ;
        return view('pages.auth.signin', ['store' => $request->query('store'), 'to' => $request->query('to') ,'topCategories' => $request->query('topCategories')]);
    }
    public function signin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:6',
         ]);
        $redirectTo = $request->input('redirectTo') ? $request->input('redirectTo') : 'home';
        $response = Http::post(env('MIX_CUSTOMER_BASE_URL') . 'signin', $validatedData);
        if ($response->status() == 401) {
            return redirect()->back()->withInput()->withErrors([
                'status401' => 'validation.status401',
            ]);
        } else if ($response->status() == 403) {
            return redirect()->back()->withInput()->withErrors([
                'status403' => 'validation.status403',
            ]);
        }
        $signin = $response->json();
        /** If url has /?to=checkout, redirect to page checkout if not redirect to page home */
        return view('pages.auth.signin', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ] )->with(['token' => $signin, 'redirectTo' => $redirectTo ]);
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'email|required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'regex:/^(\+)?\d+$/|min:9|max:12',
        ]);
 
        $headers = [
            'Content-type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = $request->all();
        try{
            $client = new \GuzzleHttp\Client();
            $response = $client->request(
                'POST',
                env('MIX_CUSTOMER_BASE_URL') . 'signup/' . env('MIX_UUID'),
                array(
                    'headers' => $headers,
                    'json' => $body
                    )
                );
        }catch(ClientException $e){
            if ($e->getCode() == 400) {
                return redirect()->back()->withInput()->withErrors([
                    'status400' => 'validation.status400',
                ]);
            }else if ($e->getCode() == 401) {
                return redirect()->back()->withInput()->withErrors([
                    'status401' => 'validation.status401',
                ]);
            }else if ($e->getCode() == 422) 
                return redirect()->back()->withInput()->withErrors([
                    'status422.email' => 'validation.status422.email',
                ]);
        }
        return view('pages.auth.success_signup', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories') ]);
     }

    public function verify(Request $request)
    {
        $url = 'email' . explode('email', $request->getRequestUri())[1];
        $response = Http::get(env('MIX_CUSTOMER_BASE_URL') . $url);
        return view('pages.auth.success_verification', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories')]);
    }

    public function getResetPassword(Request $request, $reset_token = null)
    {
        if(isset($reset_token))
            return view('pages.auth.reset_password', ['reset_token' => $reset_token, 'store' => $request->query('store'),'topCategories' => $request->query('topCategories')]);
        else
            return redirect()->route('home') ;
    }

    public function resetPassword(Request $request)
    {
        $validatedData = $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed'
        ]);

        $response = Http::post(env('MIX_CUSTOMER_BASE_URL') . 'password/reset', $request->all(['token', 'password', 'password_confirmation']));
        if ($response->status() == 200) {
            return view('pages.auth.success_password', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories')]);
        }else if ($response->status() == 404) {
            return redirect()->back()->withInput()->withErrors([
                'status404' => "Utilisateur n'existe pas"
            ]);
        }

    }

    public function recoverPassword(Request $request)
    {
        $validatedData = $request->validate([
            'uuid' => 'required',
            'email' => 'required'
        ]);
        $response = Http::post(env('MIX_CUSTOMER_BASE_URL') . 'password/recover', $request->all(['uuid', 'email']));
        if ($response->status() == 200) {
            return view('pages.auth.verify_reset_password', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories')]);
        } else if ($response->status() == 424) {
            return redirect()->back()->withInput()->withErrors([
                'status422' => 'Mail not sent',
            ]);
        }
        else if ($response->status() == 404) {
            return redirect()->back()->withInput()->withErrors([
                'status404' => "Email n'existe pas",
            ]);
        }
     }

    public function editPassword(Request $request)
    {
         $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);
        $response = Http::post(env('MIX_CUSTOMER_BASE_URL') . 'password/profile-reset', $request->all(['email', 'password', 'password_confirmation']));
        if ($response->status() == 200) {
            return view('pages.auth.success_password', ['store' => $request->query('store'),'topCategories' => $request->query('topCategories')]);
        }else if ($response->status() == 404) {
            return redirect()->back()->withInput()->withErrors([
                'status404' => "Utilisateur n'existe pas"
            ]);
        }

    }






}
