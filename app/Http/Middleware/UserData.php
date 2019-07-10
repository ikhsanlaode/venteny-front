<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class UserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $http = new \GuzzleHttp\Client;
        $user = $http->get(env('API_URL').'/auth/details', [
                        'headers' => [
                            'Authorization' => 'Bearer '. Cookie::get('token'),
                            'Accept'     => 'application/json',
                        ],
                    ]);


        $data = json_decode((string) $user->getBody());


        $request->attributes->add(['user' => $data]);
        return $next($request);
    }
}
