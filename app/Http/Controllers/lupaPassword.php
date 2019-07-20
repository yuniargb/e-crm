<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Staf;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class lupaPassword extends Controller
{
    public function lupaStaf()
    {
        return view('auth.forget-password');
    }
    public function formPasswordStaf($id)
    {
        $email = $id;
        return view('auth.form-password', compact('email'));
    }
    public function lupaPasswordStaf(Request $request)
    {
        $staf = Staf::where('email', $request->email)->first();

        if ($staf['email'] == true) {
            $dis = array(
                'email' => md5($request->email)
            );
            Mail::send('auth.email-forget-password', $dis, function ($mail) use ($request) {
                $mail->to($request->email)
                    ->from('mikatravelindonesia@gmail.com', 'Mika Travel Indonesia')
                    ->subject('Forget Password');
            });
            Session::flash('success', 'Email Success Sending');
            return redirect('/lupapassword');
        } else {
            Session::flash('success', 'Email Not Found');
            return redirect('/lupapassword');
        }
    }
    public function ubahPasswordStaf(Request $request)
    {
        $staf = DB::SELECT("SELECT * FROM stafs where md5(email) = '" . $request->email . "'");

        if ($staf == true) {
            if ($request->password == $request->password1) {
                $update = DB::update("UPDATE stafs set password = '" . Hash::make($request->password) . "' WHERE md5(email) = '" . $request->email . "'");
                if ($update == true) {
                    Session::flash('success', 'Password Success Change');
                    return redirect('/admin/login');
                }
            } else {
                Session::flash('success', 'Password Not Same');
                return redirect('resetpassword/' . $request->email);
            }
        } else {
            Session::flash('success', 'Email Not Found');
            return " gagal ";
        }
    }
}
