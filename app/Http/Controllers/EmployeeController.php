<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Cookie;

class EmployeeController extends Controller
{
	private $token;
	
	public function __construct() {
        $this->middleware(function ($request, $next){
            $this->token = Cookie::get('token');
            if(!isset($this->token)){
                Auth::logout();
                $request->session('token')->flush();
                Cookie::queue(Cookie::forget('token'));
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function create(Request $request)
    {
    	return view('create-employee');
    }

    public function store(Request $request)
    {

    	$client = new Client();
    	$url = env('API_URL').'/employee';
    	$result = $client->post($url, [
					'headers' => [
						'Authorization' => 'Bearer '. $this->token,
						'Accept'     => 'application/json',
					],

					'form_params' => [
						'name' => $request->name,
						'email' => $request->email,
						'password' => $request->password
					]
				]);

        $data = json_decode((string) $result->getBody());

        return redirect('/dashboard');
    }
}
