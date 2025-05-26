<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Intervention\Image\Laravel\Facades\Image;


class PerfilController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => [
                'required',
                'email',
                'max:60',
                'unique:users,email,' . auth()->user()->id
            ],
        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() .  "." . $imagen->extension();

            $imagenServidor = Image::read($imagen->getPathname())
                ->cover(1000, 1000, 'center');
            // El comentario de abajo es para la versión anterior de intervention/image
            // $imagenServidor = Image::make($imagen);
            // $imagenServidor->fit(1000,1000,null,'center');
            //public_path apunta a la carpeta public
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // Guardar Cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        // Si no se sube una imagen revisa si hay una en la bd y si no entonces la deja como null
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;

        $usuario->save();

        // Redireccionar

        return redirect()->route('posts.index', $usuario->username);
    }
}
