<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Cookie;
use Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
    	$client = new Client();
    	$url = env('API_URL').'/auth/login';
    	$result = $client->post($url,[
    		'form_params' => [
    			'email' => $request->email,
    			'password' => $request->password
    		]
    	]);

    	$data = json_decode($result->getBody());

    	Cookie::queue(Cookie::make('token', $data->success->token));

    	return redirect('/dashboard');
    }

    public function logout(Request $request){
	  	Auth::logout();
	  	$request->session('token')->flush();
        Cookie::queue(Cookie::forget('token'));
	  	return redirect('/');
    }

}
