<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Utilizando make:controller, crear una clase HolaMundoController
 * con el método hola que retorna {"firstName": "Juan", "lastName": "Perez"}
 * y responde a la URL /hola
 * 
 * 16:38
 */

class HelloController extends Controller
{
    public function welcome($id) {
        return view('welcome', [
            'myVar' => $id
        ]);
    }
}
