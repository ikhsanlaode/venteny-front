<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Cookie;
use Auth;
class VacationController extends Controller
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

	    public function index(Request $request)
	    {
	    	$client = new Client();
	    	$url = env('API_URL').'/vacation';
	    	$result = $client->get($url, [
	                'headers' => [
	                    'Authorization' => 'Bearer '. $this->token,
	                    'Accept'     => 'application/json',
	                ],

	                'query' => [
	                	'entities' => 'user'
	                ]
	        ]);

	        $data = json_decode((string) $result->getBody());

	        return view('vacation',compact('data'));

	    }

	    public function createMax()
	    {
	    	return view('vacation-max');
	    }

	    public function create()
	    {
	    	$client = new Client();
	    	$url = env('API_URL').'/employee';
	    	$result = $client->get($url, [
	                'headers' => [
	                    'Authorization' => 'Bearer '. $this->token,
	                    'Accept'     => 'application/json',
	                ],
	        ]);

	        $data = json_decode((string) $result->getBody());
	    	return view('vacation-request',compact('data'));
	    }

	    public function storeMax(Request $request)
	    {
	    	$client = new Client();
	    	$url = env('API_URL').'/vacation/max';
	    	$result = $client->post($url, [
						'headers' => [
							'Authorization' => 'Bearer '. $this->token,
							'Accept'     => 'application/json',
						],

						'form_params' => [
							'total' => $request->total,
						]
					]);

	        $data = json_decode((string) $result->getBody());

	        return redirect('/dashboard');
	    }

	    public function store(Request $request)
	    {
	    	$client = new Client();
	    	$url = env('API_URL').'/vacation/';
	    	$result = $client->post($url, [
						'headers' => [
							'Authorization' => 'Bearer '. $this->token,
							'Accept'     => 'application/json',
						],

						'form_params' => [
							'user_id' => $request->user_id,
							'start_at' => $request->start_at,
							'end_at' => $request->end_at,
							'description' => $request->description,
						]
					]);

	        $data = json_decode((string) $result->getBody());

	        return redirect('/dashboard');
	    }

	    public function approve(Request $request, $id)
	    {
	    	$client = new Client();
	    	$url = env('API_URL').'/vacation/status/'.$id;
	    	$result = $client->post($url, [
						'headers' => [
							'Authorization' => 'Bearer '. $this->token,
							'Accept'     => 'application/json',
						],

						'form_params' => [
							'status' => 1,
						]
					]);

	        $data = json_decode((string) $result->getBody());

	        return redirect('/dashboard');
	    }

	    public function reject(Request $request, $id)
	    {
	    	$client = new Client();
	    	$url = env('API_URL').'/vacation/status/'.$id;
	    	$result = $client->post($url, [
						'headers' => [
							'Authorization' => 'Bearer '. $this->token,
							'Accept'     => 'application/json',
						],

						'form_params' => [
							'status' => 2,
						]
					]);

	        $data = json_decode((string) $result->getBody());

	        return redirect('/dashboard');
	    }
}
