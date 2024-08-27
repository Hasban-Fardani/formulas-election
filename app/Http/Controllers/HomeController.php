<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {   
        $elections = Election::active()->get();
        return view('home', compact('elections'));
    }
}
