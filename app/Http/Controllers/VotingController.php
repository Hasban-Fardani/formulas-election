<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function election(Election $election)
    {
        return 'hi';
    }
}
