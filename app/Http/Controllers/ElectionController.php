<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('election.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('election.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        return view('election.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        return view('election.edit', compact('election'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        //
    }
}
