<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     // return view('home', [
    //     //     'plats' => plat::all(),
    //     // ]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
