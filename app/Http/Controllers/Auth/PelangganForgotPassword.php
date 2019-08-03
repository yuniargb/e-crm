<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PelangganForgotPassword extends Controller
{
    public function forget()
    {
        return view('auth.passwords.forget');
    }

    public function request(Request $request)
    {
        $rules = [
            'email' => 'required|exists:pelanggans,email',
        ];

        $message = [
            'required' => 'Please fill this field',
            'exists' => 'We cant find account with this email'
        ];

        $this->validate($request, $rules, $message);

        $plg = Pelanggan::where('email', $request->email)->first();

        Mail::send('auth.passwords.send-email', ['plg' => $plg], function ($mail) use ($plg) {
            $mail->to($plg->email)
                ->from('mikatravelindonesia@gmail.com', 'Mika Tour Indonesia')
                ->subject('Reset Password');
        });
        Session::flash('success', 'We have e-mailed your password reset link');
        return redirect('/password/forget');
    }

    public function reset($id)
    {
        $plg = Pelanggan::find($id);
        return view('auth.passwords.change', compact('plg'));
    }

    public function change(Request $request, $id)
    {
        $plg = Pelanggan::find($id);
        $plg->password = Hash::make($request->password);
        $plg->save();

        Auth::guard('pelanggan')->login($plg, true);
        return redirect('/customer');
    }
}
