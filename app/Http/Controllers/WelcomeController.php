<?php

namespace App\Http\Controllers;

use App\Models\plat;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome', [
            'plats' => plat::all(),
        ]);
    }
}
