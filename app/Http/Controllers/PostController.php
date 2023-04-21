<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Antes de ejecutar el index, primero se ejecutará el constructor para verificar si el usuario está autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        // dd($user->username);
        return view('dashboard', ['user' => $user]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
