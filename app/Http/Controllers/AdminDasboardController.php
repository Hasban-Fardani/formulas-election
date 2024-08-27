<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDasboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.dashboard');
    }
}
