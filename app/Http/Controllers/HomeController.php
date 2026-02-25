<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (auth()->check()) {
            return redirect()->route('game.index');
        }

        return view('welcome');
    }
}
