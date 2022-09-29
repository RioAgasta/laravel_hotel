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
            abort(403, 'Role anda tidak bisa mengakses halaman ini');
        }
    }

    private function WhichRoleCanAccessWhichPages(){
        return [
            'Tamu' => [
                '/',
                'profile',
                'pesan/{id}',
                'formPesan/{id}',
                'ubahData',
                'invoice',
                'kamar',
                'setting',
            ],
            'Resepsionis' => [
                '/',
                'profile',
                'history',
                'reservation',
                'ubahData',
                'search',
                'searchDate',
                'kamar',
                'setting',
            ],
            'Admin' => [
                '/',
                'profile',
                'ubahData',
                'ubahKamar',
                'tambahKamarForm',
                'tambahKamar',
                'kamar',
                'ubahKamarForm/{id}',
                'ubahKamar/{id}',
                'hapusKamar/{id}',
                'setting',
            ],
            'God' => [
                '/',
                'tampilan',
                'profile',
                'ubahData',
                'reservation',
                'tambahKamarForm',
                'tambahKamar',
                'setting',
                'search',
                'searchDate',
                'invoice',
                'kamar',
                'pesan/{id}',
                'formPesan/{id}',
                'ubahKamarForm/{id}',
                'ubahKamar/{id}',
                'hapusKamar/{id}',
            ],
        ];
    }
}