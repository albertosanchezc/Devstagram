<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class HomeController extends Controller implements HasMiddleware
{
    //

    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }
    public function index(Post $post)
    {
        // Obtener a quienes seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray(); //pluck nos permite traer sólo los campos especificados
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
        return view('home', [
            'posts' => $posts
        ]);
    }
}
