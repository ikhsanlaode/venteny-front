<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Cookie;
use Auth;

class DashboardController extends Controller
{
	private $token;
    private $user;

	public function __construct() {
        $this->middleware(function ($request, $next){
            $this->token = Cookie::get('token');
            if(!isset($this->token)){
                Auth::logout();
                $request->session('token')->flush();
                Cookie::queue(Cookie::forget('token'));
                 return redirect('login-view');
            }

            return $next($request);
        });
    }

    public function index(Request $request)
    {

        $http = new \GuzzleHttp\Client;
        $employee = $http->get(env('API_URL').'/employee', [
                        'headers' => [

                            'Authorization' => 'Bearer '. $this->token,
                            'Accept'     => 'application/json',
                        ],
                    ]);


        $data = json_decode((string) $employee->getBody());
        return view('dashboard',compact('data'));

    }
}
