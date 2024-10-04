<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function show(Election $election)
    {
        if (!Auth::user()->canVote($election)) {
            return redirect()->route('user.home');
        }

        $election->load('candidates');
        return view('user.election.show', compact('election'));
    }

    public function vote(Candidate $candidate)
    {
        $candidate->load('election');
        if (!Auth::user()->canVote($candidate->election)) {
            return redirect()->route('user.home');
        }

        Vote::create([
            'user_id' => Auth::user()->id,
            'candidate_id' => $candidate->id,
            'election_id' => $candidate->election_id
        ]);

        return redirect()->route('user.home');
    }

    // Deprecated. Now only admin can see the result
    // public function results(Election $election)
}
