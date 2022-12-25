<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $cafe = Cafe::query()
            ->with('facilities')
            ->whereBelongsTo(auth()->user())
            ->first();

        return view('pages.owner.facilities.index', compact('cafe'));
    }

    public function create()
    {
        return view('pages.owner.facilities.create');
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $cafe = Cafe::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $cafe->facilities()->create($validator->validated());

        return redirect()->route('owner.facilities.index')->with('status', 'Sukses menambah fasilitias');
    }

    public function edit(Facility $facility)
    {
        return view('pages.owner.facilities.edit', compact('facility'));
    }

    public function update(Facility $facility)
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $facility->update($validator->validated());

        return redirect()->route('owner.facilities.index')->with('status', "Sukses mengubah fasilitias {$facility->name}");
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('owner.facilities.index')->with('status', "Sukses menghapus fasilitias {$facility->name}");
    }
}
