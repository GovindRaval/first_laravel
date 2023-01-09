<?php

namespace App\Http\Controllers\Web\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Session;
use App\Helpers\Helper;

class LoginController extends Controller
{

    private $module   = '';
    private $langFile = 'web';

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    /**
     * Show the login .
     */
    public function showLoginForm()
    {
        $url = url()->previous();
        session()->put('previous_url', $url);
        return view('web.user.login', compact('url'));
    }

    public function login(Request $request)
    {
        $validate    = $request->validate([
            'email'    => 'required',
            'password' => 'required',
                ], [
            'email.required'    => \Lang::get($this->langFile . '.error-req-email'),
            'password.required' => \Lang::get($this->langFile . '.error-req-password'),
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1]))
        {
            // Authentication passed...
            $user = Auth::user();
            if ($user)
            {
                $user->last_login = date("Y-m-d H:i:s");
                $user->login_type = 'website';
                $user->save();
            }
            if (isset($request->url))
            {
                return redirect()->to($request->url);
            }
            return redirect()->route('web.index');
        }
        else
        {
            return redirect()->route('web.user.login')->with('error', \Lang::get($this->langFile . '.invalid-credentials'));
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('web.user.login');
    }

}
