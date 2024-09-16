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
        $election->load('candidates');
        return view('user.election.show', compact('election'));
    }

    public function vote(Candidate $candidate)
    {
        Vote::create([
            'user_id' => Auth::user()->id,
            'candidate_id' => $candidate->id,
            'election_id' => $candidate->election_id
        ]);

        return redirect()->route('user.home');
    }

    public function results(Election $election)
    {
        $candidates = $election->candidates()->get();
        $data = $candidates->map(function ($candidate) {
            return [
                'candidate' => $candidate,
                'votes' => $candidate->votes()->count()
            ];
        });
        return view('user.election.results', compact('election', 'data'));
    }
}
