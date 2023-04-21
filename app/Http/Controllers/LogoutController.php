<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        // cerrar sesión
        auth()->logout();

        // Redireccionar al login cuando cierre sesión
        return redirect()->route('login');
    }
}
