<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    // Antes de ejecutar el index, primero se ejecutará el constructor para verificar si el usuario está autenticado
    public function __construct()
    {
        // Este controlador va a estar protegido, excepto los siguentes métodos, que están en except['']
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user)
    {
        // dd($user->username);

        // Con el paginate activamos el modo de paginación, en este caso quiero mostrar 12 publicaciones en una página, y si hay más, mostrar en otra página
        $posts = Post::where('user_id', $user->id)->paginate(12);

        return view('dashboard', [
            'user'  => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'      => 'required|max:255',
            'descripcion' => 'required',
            'imagen'      => 'required'
        ]);

        // Crear el registro
        /*Post::create([
            'titulo'      => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen'      => $request->imagen,
            'user_id'     => $request->user()->id
        ]);*/

        // Otra forma de crear registro
        /*
        $post = new Post;
        $post->titulo      = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen      = $request->imagen;
        $post->user_id     = auth()->user()->id;
        $post->save();
        */

        // otra forma de crear registro
        $request->user()->posts()->create([
            'titulo'      => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen'      => $request->imagen,
            'user_id'     => $request->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        // dd('Eliminando', $post->id);
        $this->authorize('delete', $post);
        $post->delete();

        // Eliminar imagen
        $imagen_path = public_path('uploads/' . $post->imagen);
        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
