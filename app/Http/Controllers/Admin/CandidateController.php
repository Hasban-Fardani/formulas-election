<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'leader_id' => 'nullable|exists:users,id',
            'co_leader_id' => 'nullable|exists:users,id',
            'image' => 'required|image',
            'number' => 'required|integer',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'election_id' => 'required|exists:elections,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $data = $validator->validated();

        // store image
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getExtension();
        $image->storeAs('public/candidate', $image_name);
        $data['image'] = $image_name;

        Candidate::create($data);

        return redirect()->back()->with('success', 'Kandidat berhasil dibuat');
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'leader_id' => 'required|exists:users,id',
            'co_leader_id' => 'nullable|exists:users,id',
            'image' => 'nullable|image',
            'number' => 'required|integer',
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            // store image
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getExtension();
            $image->storeAs('public/candidate', $image_name);
            $data['image'] = $image_name;
        }

        $data = $validator->validated();
        $candidate->update($data);

        return redirect()->back()->with('success', 'Kandidat berhasil diperbarui');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->back()->with('success', 'Kandidat berhasil dihapus');
    }
}
