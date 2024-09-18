<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::withCount('candidates')
            ->latest()
            ->paginate(10);
        return view('admin.election.list', compact('elections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        Election::create($data);

        return redirect()->route('admin.election.index')->with('success', 'Pemilihan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Election $election)
    {
        $edit = $request->input('edit') ?? false;
        $election->load('candidates');
        $candidates = Candidate::where('election_id', $election->id)
            ->withCount('votes')
            ->get();
        return view('admin.election.show', compact('election', 'edit', 'candidates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $election->update($data);

        return redirect()->route('admin.election.index')->with('success', 'Pemilihan berhasil diperbarui');
    }
}
