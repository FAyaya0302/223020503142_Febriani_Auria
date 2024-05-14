<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import return type View
use Illuminate\View\View;

class DasboardController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        return view('dashboard');
    }
}