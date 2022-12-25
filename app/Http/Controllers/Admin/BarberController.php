<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BarberRequest;
use App\Models\Barber;
use App\Models\Order;
use App\Models\User;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::query()
            ->with('user')
            ->withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->get();

        return view('pages.admin.barber.index', compact('barbers'));
    }

    public function create()
    {
        return view('pages.admin.barber.create');
    }

    public function store(BarberRequest $barberRequest)
    {
        $owner = User::create([
            'name' => $barberRequest->name,
            'email' => $barberRequest->email,
            'username' => $barberRequest->username,
            'phone' => $barberRequest->phone,
            'password' => bcrypt($barberRequest->phone),
            'role' => User::ROLE_OWNER
        ]);

        $barber = Barber::create([
            'name' => $barberRequest->barber_name,
            'user_id' => $owner->id,
            'address' => $barberRequest->address,
            'price' => $barberRequest->price,
            'open' => '08:00',
            'close' => '17:00'
        ]);

        if ($barberRequest->hasFile('photo')) {
            $photo = $barberRequest->file('photo');
            $url = $photo->move('images/barbers', $photo->hashName());

            $barber->update([
                'photo' => $url->getPath() . '/' . $url->getFilename()
            ]);
        }

        return redirect()->route('admin.barbers.index')->with('status', 'Sukses menambah barber');
    }

    public function destroy(Barber $barber)
    {
        User::find($barber->user_id)->delete();

        return redirect()->route('admin.barbers.index')->with('status', 'Sukses menghapus barber');
    }

    public function order(Barber $barber)
    {
        $barber->load(['orders.user', 'orders.capster']);

        $barber->orders->transform(function ($order) {
            switch ($order->status) {
                case Order::STATUS_WAITING:
                    $order->status = 'Waiting';
                    break;
                case Order::STATUS_CONFIRM:
                    $order->status = 'Confirm';
                    break;
                case Order::STATUS_DONE:
                    $order->status = 'Done';
                    break;
                case Order::STATUS_REJECTED:
                    $order->status = 'Rejected';
                    break;
                case Order::STATUS_CANCEL:
                    $order->status = 'Cancel';
                    break;
                case Order::STATUS_REVIEWED:
                    $order->status = 'Reviewed';
                    break;
                default:
                    $order->status = 'Unknown';
            }
            return $order;
        });

        return view('pages.admin.barber.order', compact('barber'));
    }

    public function facilities(Barber $barber)
    {
        $barber->load(['facilities']);

        return view('pages.admin.barber.facilities', compact('barber'));
    }

    public function services(Barber $barber)
    {
        $barber->load(['services']);

        return view('pages.admin.barber.services', compact('barber'));
    }

    public function capsters(Barber $barber)
    {
        $barber->load(['capsters']);

        return view('pages.admin.barber.capsters', compact('barber'));
    }
}
