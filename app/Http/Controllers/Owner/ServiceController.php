<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $cafe = Cafe::query()
            ->with('services')
            ->whereBelongsTo(auth()->user())
            ->first();

        return view('pages.owner.services.index', compact('cafe'));
    }

    public function create()
    {
        return view('pages.owner.services.create');
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $cafe = Cafe::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $cafe->services()->create($validator->validated());

        return redirect()->route('owner.services.index')->with('status', 'Sukses menambah fasilitias');
    }

    public function edit(Service $service)
    {
        return view('pages.owner.services.edit', compact('service'));
    }

    public function update(Service $service)
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $service->update($validator->validated());

        return redirect()->route('owner.services.index')->with('status', "Sukses mengubah fasilitias {$service->name}");
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('owner.services.index')->with('status', "Sukses menghapus fasilitias {$service->name}");
    }
}
