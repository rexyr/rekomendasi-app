<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function edit()
    {
        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        return view('pages.owner.barber.edit', compact('barber'));
    }

    public function update(Barber $barber)
    {
        $validator = validator(request()->all(), [
            'price' => ['required'],
            'open' => ['required', 'date_format:H:i'],
            'close' => ['required', 'date_format:H:i', 'after:open']
        ])->validate();

        $barber->update($validator);

        return redirect()->route('owner.barber.edit')->with('status', 'Sukses mengubah barber');
    }
}
