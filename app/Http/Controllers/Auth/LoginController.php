<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function authenticated()
    // {
    //     if (!Auth()->user()->email_verified_at) {
    //         auth()->logout();
    //         return redirect('/login')->with('error', 'Akun Anda belum terverifikasi.');
    //     }else{
    //         if (Auth()->user()->role == 'Anggota') {
    //             # code... 'Petugas', 'Anggota', 'Kepala'
    //             return redirect('/');
    //         } else {
    //             # code...
    //             return redirect('/home');
    //         }
    //     }
    // }
}
