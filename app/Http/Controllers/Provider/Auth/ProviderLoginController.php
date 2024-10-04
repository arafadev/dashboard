<?php

namespace App\Http\Controllers\Provider\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Provider\Auth\ProviderLoginRequest;

class ProviderLoginController extends Controller
{
    public function getLogin()
    {
        return view('provider.auth.login');
    }

    public function login(ProviderLoginRequest $request)
    {
        if (auth()->guard('provider')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $notification = array(
                'message' => 'Provider Login Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('provider.dashboard')->with($notification);
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid email or password.']);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('provider')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('provider/login');
    }
}
