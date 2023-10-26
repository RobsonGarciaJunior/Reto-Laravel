<?php

namespace App\Http\Controllers;

use App\Models\Incidency;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $incidencies = Incidency::where('userId', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('home', ['incidencies' => $incidencies]);
    }
}
