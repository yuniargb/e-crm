<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Staf;

class LoginStafController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:staf', ['except' => ['logout', 'stafLogout']]);
    }

    public function showLoginForm()
    {
        return view('auth.staf-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $rules = [
            'username' => 'required|exists:stafs,username',
            'password' => 'required'
        ];

        $message = [
            'required' => 'Please fill out this field',
            'exists' => 'Your username is not registered'
        ];

        $this->validate($request, $rules, $message);

        // Attempt to log staf in
        if (Auth::guard('staf')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // If succes return to backend
            return redirect()->intended(route('staf.dashboard'));
        }
        // If unsuccessful redirect back
        return redirect()->back()->withInput($request->only('username'));
    }

    public function stafLogout()
    {
        Auth::guard('staf')->logout();
        return redirect('/admin/login');
    }
}
