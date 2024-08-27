<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function election(Election $election)
    {
        $election->load('candidates');
        return view('election.public', compact('election'));
    }

    public function vote(Candidate $candidate)
    {
        return 'voted';
    }
}
