<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        /*return response('Hello World', 200)
            ->header('Content-Type', 'text/plain');*/

        /*return response()->json([
            'name' => Auth::user()->name,
            'message' => 'You are logged in!!',
        ]);*/

        return view('home');
    }
}
