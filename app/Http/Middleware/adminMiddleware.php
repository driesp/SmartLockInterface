<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $filtered =
      [
        'home/floorplan/*/building',
        'home/floorplan/*/*/createfloor',
        'home/floorplan/*/*/*/addlock',
        'home/users',
        'home/user/*/edit',
        'home/user/create',
        'home/user/*/delete',
        'home/locks',
        'home/lock/*/edit',
        'home/lock/*/create',
        'home/lock/*/delete',
        'home/lock/*/build',
        'home/lock/*/connect',
        'home/lock/*/*/delete',
      ];

    public function handle($request, Closure $next, $guard = null)
    {


      if ($request->user()->admin != 1 && $this->inFilteredArray($request))
       {
           return redirect('home');
       }

        return $next($request);

    }
    protected function inFilteredArray($request)
    {
      foreach ($this->filtered as $filtered) {
          if ($filtered !== '/') {
              $filtered = trim($filtered, '/');
          }
          if ($request->is($filtered)) {
              return true;
          }
      }
      return false;
    }
}
