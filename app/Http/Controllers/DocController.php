<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Modules\Documentacion\resources\views;

class DocController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('documentacion');
        //return view('odi/Modules/Documentacion/resorces/views/pages/panel');
    }
}
