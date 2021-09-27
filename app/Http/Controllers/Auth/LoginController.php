<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        Auth::attempt($data);
        if(Auth::check()) {
            $users = User::where('email', $request->email)->first();
            if (!empty($users)) {
                # code...
                if (Hash::check($request->password, $users->password)) {
                    # code...
                    $session = [
                        'id' => $users->id,
                        'role' => $users->role,
                        'nama' => $users->name,
                        'image' => $users->image
                    ];

                    session($session);
                    if(session('role') == 1) {
                        Session::flash('success', 'Selamat datang'. ' ' .session('nama'));
                        return redirect('/admin');
                    } else {
                        Session::flash('success', 'Selamat datang'. ' ' . session('nama'));
                        return redirect('/');
                    }
                }
            }
        } else {
            Session::flash('error', 'Email atau Password salah, Harap cek kembali');
            return redirect('/login');
            
        }
    }

    public function logout()
	{
        Session::flush();
		Auth::logout();
		return redirect('/login');
	}
}
