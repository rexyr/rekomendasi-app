<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    public function edit()
    {
        $cafe = Cafe::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        return view('pages.owner.cafe.edit', compact('cafe'));
    }

    public function update(Cafe $cafe)
    {
        $validator = validator(request()->all(), [
            'price' => ['required'],
            'open' => ['required', 'date_format:H:i'],
            'close' => ['required', 'date_format:H:i', 'after:open']
        ])->validate();

        $cafe->update($validator);

        return redirect()->route('owner.cafe.edit')->with('status', 'Sukses mengubah cafe');
    }
}
