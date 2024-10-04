<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $elections = Election::all(['id', 'title']);
        $selected_election = $request->input('selected_election');
        $election = $selected_election ?
            Election::where('id', $selected_election)->first() :
            Election::latest()->first();
        $election->loadCount('votes');

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

        return view('admin.dashboard', compact('elections', 'election', 'selected_election', 'chartData'));
    }
}
