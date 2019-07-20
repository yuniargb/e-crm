<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;
use App\Pelanggan;
use Illuminate\Support\Facades\Hash;

class LoginPelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pelanggan', ['except' => ['logout', 'register']]);
    }

    public function showLoginForm()
    {
        return view('frontend.signin');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:pelanggans,email',
            'password' => 'required'
        ];

        $message = [
            'required' => 'Please fill this field',
            'email' => 'Email is invalid',
            'exists' => 'Your email is not registered'
        ];

        $this->validate($request, $rules, $message);

        // Attempt to log user in
        if (Auth::guard('pelanggan')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('pelanggan.dashboard'));
        }

        return redirect()->back();
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = Pelanggan::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::guard('pelanggan')->login($existingUser, true);
        } else {
            $newUser                    = new Pelanggan;
            $newUser->nama_pelanggan    = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar            = $user->getAvatar();
            $newUser->save();

            Auth::guard('pelanggan')->login($newUser, true);
        }

        return redirect('/customer');
    }

    public function register(Request $request)
    {
        $rules = [
            'namer' => 'required',
            'phone' => 'required',
            'emailr' => 'required|email|unique:pelanggans,email',
            'passwordr' => 'required'
        ];

        $message = [
            'required' => 'Please fill this field',
            'email' => 'Email is invalid',
            'unique' => 'This email has been used'
        ];

        $this->validate($request, $rules, $message);

        $user                    = new Pelanggan;
        $user->nama_pelanggan    = $request->namer;
        $user->no_telp           = $request->phone;
        $user->email             = $request->emailr;
        $user->email_verified_at = now();
        $user->password          = Hash::make($request->passwordr);
        $user->save();

        Auth::guard('pelanggan')->login($user, true);
        return redirect('/customer');
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();
        return redirect('/');
    }
}
