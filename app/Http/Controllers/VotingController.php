<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
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
        Vote::create([
            'user_id' => auth()->user()->id,
            'candidate_id' => $candidate->id,
            'election_id' => $candidate->election_id
        ]);

        return redirect()->route('home');
    }

    public function results(Election $election)
    {
        $candidates = $election->candidates()->get();
        $data = $candidates->map(function ($candidate) {
            return [
                'name' => $candidate->name,
                'votes' => $candidate->votes()->count()
            ];
        });
        return view('election.results', compact('election', 'data', 'candidates'));
    }
}
