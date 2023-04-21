<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Comprobar si las credenciales son correctas
        //Si está autenticado devuelve un true, sino un false
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales Incorrectas.');
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
