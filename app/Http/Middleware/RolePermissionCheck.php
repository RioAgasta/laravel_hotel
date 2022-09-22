<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

class RolePermissionCheck
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
        $userRole = auth()->user()->role; //Ngambil data role akun
        $currentRoute = Route::current()->uri; //Ngubah route jadi String
        if(in_array($currentRoute, $this->WhichRoleCanAccessWhichPages()[$userRole])){
            return $next($request);
        } else {
            abort(403, 'mmpus error');
        }
    }

    private function WhichRoleCanAccessWhichPages(){
        return [
            'Tamu' => [
                '/',
                'superior',
                'deluxe',
                'profile',
                'pesan',
                'formPesan/{id}',
                'ubahData',
                'tampilan',
                'reservation',
            ],
            'Resepsionis' => [
                '/',
                'profile',
                'history',
                'reservation',
                'ubahData',
                'tampilan',
            ],
            'Admin' => [
                '/',
                'tampilan',
                'profile',
                'ubahData',
                'ubahKamar',
                'tambahKamar',
                'superior',
                'deluxe',
            ]
        ];
    }
}
