<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function show() {
        return view('test', [
            'hi' => 'Hello from Laravel controller'
        ]);
    }
}
