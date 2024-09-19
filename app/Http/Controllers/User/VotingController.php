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
        $candidate->load('election');
        if (Auth::user()->canVote($candidate->election)) {
            Vote::create([
                'user_id' => Auth::user()->id,
                'candidate_id' => $candidate->id,
                'election_id' => $candidate->election_id
            ]);
        }

        return redirect()->route('user.home');
    }

    public function results(Election $election)
    {
        $candidates = $election->candidates()->get();
        $data = $candidates->map(function ($candidate) {
            return [
                'label' => $candidate->name,
                'value' => $candidate->votes()->count()
            ];
        });
    
        $chartData = [
            'labels' => $data->pluck('label')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Suara',
                    'data' => $data->pluck('value')->toArray(),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];
    
        return view('user.election.results', compact('election', 'chartData'));
    }
}
