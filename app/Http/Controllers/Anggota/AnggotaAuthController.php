<?php

namespace App\Http\Controllers\Anggota;

use App\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AnggotaAuthController extends Controller
{
    use AuthenticatesUsers;
	protected $guardName = 'anggota';

	protected $loginRoute;

	public function __construct()
    {
        $this->middleware('guest:anggota')->except('postLogout');
        $this->loginRoute = route('anggota.login');
    }

	public function getLogin()
    {
        return view('admin.anggota.anggota_login');
    }

    public function postLogout()
    {
        Auth::guard($this->guardName)->logout();
        Session::flush();
        return redirect()->guest($this->loginRoute);
    }

	public function postLogin(Request $request)
    {
        $this->validate($request, [
            'EMAIL_ANGGOTA' => 'required|email',
            'NO_TELP_ANGGOTA' => 'required|max:13'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $credential = [
            'EMAIL_ANGGOTA' => $request->input('EMAIL_ANGGOTA'),
            'NO_TELP_ANGGOTA' => $request->input('password')
        ];

        
        if (Auth::guard($this->guardName)->attempt($credential)) {

            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended();

        } else {
            $this->incrementLoginAttempts($request);

            return redirect()->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }

} 