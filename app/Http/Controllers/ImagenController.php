<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() .  "." . $imagen->extension();
        
        $imagenServidor = Image::read($imagen->getPathname())
        ->cover(1000,1000,'center');
        // El comentario de abajo es para la versión anterior de intervention/image
        // $imagenServidor = Image::make($imagen);
        // $imagenServidor->fit(1000,1000,null,'center');
        //public_path apunta a la carpeta public
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);


        return response()->json(['imagen' => $nombreImagen ]);
    }
}
