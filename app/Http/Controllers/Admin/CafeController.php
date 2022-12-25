<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Order;
use App\Models\User;

class CafeController extends Controller
{
    public function index()
    {
        $cafes = Cafe::query()
            ->with('user')
            ->withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->get();

        return view('pages.admin.cafe.index', compact('cafes'));
    }

    public function create()
    {
        return view('pages.admin.cafe.create');
    }

    public function store(CafeRequest $cafeRequest)
    {
        $owner = User::create([
            'name' => $cafeRequest->name,
            'email' => $cafeRequest->email,
            'username' => $cafeRequest->username,
            'phone' => $cafeRequest->phone,
            'password' => bcrypt($cafeRequest->phone),
            'role' => User::ROLE_OWNER
        ]);

        $cafe = Cafe::create([
            'name' => $cafeRequest->cafe_name,
            'user_id' => $owner->id,
            'address' => $cafeRequest->address,
            'price' => $cafeRequest->price,
            'open' => '08:00',
            'close' => '17:00'
        ]);

        if ($cafeRequest->hasFile('photo')) {
            $photo = $cafeRequest->file('photo');
            $url = $photo->move('images/cafes', $photo->hashName());

            $cafe->update([
                'photo' => $url->getPath() . '/' . $url->getFilename()
            ]);
        }

        return redirect()->route('admin.cafes.index')->with('status', 'Sukses menambah cafe');
    }

    public function destroy(Cafe $cafe)
    {
        User::find($cafe->user_id)->delete();

        return redirect()->route('admin.cafes.index')->with('status', 'Sukses menghapus cafe');
    }

    public function order(Cafe $cafe)
    {
        $cafe->load(['orders.user', 'orders.capster']);

        $cafe->orders->transform(function ($order) {
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

        return view('pages.admin.cafe.order', compact('cafe'));
    }

    public function facilities(Cafe $cafe)
    {
        $cafe->load(['facilities']);

        return view('pages.admin.cafe.facilities', compact('cafe'));
    }

    public function services(Cafe $cafe)
    {
        $cafe->load(['services']);

        return view('pages.admin.cafe.services', compact('cafe'));
    }

    public function capsters(Cafe $cafe)
    {
        $cafe->load(['capsters']);

        return view('pages.admin.cafe.capsters', compact('cafe'));
    }
}
