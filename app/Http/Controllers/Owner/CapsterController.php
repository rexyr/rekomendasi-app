<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\CapsterRequest;
use App\Models\Cafe;
use App\Models\Capster;

class CapsterController extends Controller
{
    public function index()
    {
        $cafe = Cafe::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $capsters = Capster::query()
            ->whereBelongsTo($cafe)
            ->get();

        return view('pages.owner.capster.index', compact('capsters', 'cafe'));
    }

    public function create()
    {
        return view('pages.owner.capster.create');
    }

    public function store(CapsterRequest $capsterRequest)
    {
        $cafe = Cafe::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $cafe->capsters()->create(array_merge($capsterRequest->validated(), [
            'photo' => url($capsterRequest->file('photo')->move('capster/' . $cafe->id, now()->timestamp . '.' . $capsterRequest->file('photo')->getClientOriginalExtension()))
        ]));

        return redirect()->route('owner.capsters.index')->with('status', 'Sukses menambah capster');
    }

    public function edit(Capster $capster)
    {
        return view('pages.owner.capster.edit', compact('capster'));
    }

    public function update(CapsterRequest $capsterRequest, Capster $capster)
    {
        $capster->update([
            'name' => $capsterRequest->name,
            'age' => $capsterRequest->age,
        ]);

        if ($capsterRequest->hasFile('photo')) {
            $capster->update([
                'photo' => url($capsterRequest->file('photo')->move('capster/' . $capster->cafe_id, now()->timestamp . '.' . $capsterRequest->file('photo')->getClientOriginalExtension()))
            ]);
        }

        return redirect()->route('owner.capsters.index')->with('status', "Sukses mengubah capster {$capster->name}");
    }

    public function destroy(Capster $capster)
    {
        $capster->delete();

        return redirect()->route('owner.capsters.index')->with('status', "Sukses menghapus capster {$capster->name}");
    }
}
