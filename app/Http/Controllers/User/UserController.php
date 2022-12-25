<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\BookingRequest;
use App\Models\Cafe;
use App\Models\Order;

class UserController extends Controller
{
    public function index() // landing page
    {
        $cafes = Cafe::query()
            ->withAvg('orders', 'review_star')
            ->orderBy('orders_avg_review_star', 'desc')
            ->get();

        $cafes->transform(function ($cafe) {
            $cafe->orders_avg_review_star = number_format($cafe->orders_avg_review_star, 1);
            $cafe->avg_review_star = intval($cafe->orders_avg_review_star);
            $cafe->avg_review_star_comma = intval(($cafe->orders_avg_review_star - $cafe->avg_review_star) * 10);
            return $cafe;
        });

        $cafeCount = $cafes->count();

        return view('pages.user.index', compact('cafes', 'cafeCount'));
    }

    public function detail(Cafe $cafe) // detail cafe
    {
        $cafe = Cafe::query()
            ->with(['services', 'facilities'])
            ->withAvg('orders', 'review_star')
            ->find($cafe->id);

        $cafe->orders_avg_review_star = number_format($cafe->orders_avg_review_star, 1);
        $cafe->avg_review_star = intval($cafe->orders_avg_review_star);
        $cafe->avg_review_star_comma = intval(($cafe->orders_avg_review_star - $cafe->avg_review_star) * 10);

        return view('pages.user.detail', compact('cafe'));
    }

    public function capster(Cafe $cafe) // list capster
    {
        $cafe = Cafe::query()
            ->with('capsters')
            ->withCount('capsters')
            ->find($cafe->id);

        $cafe->orders_avg_review_star = number_format($cafe->orders_avg_review_star, 1);
        $cafe->avg_review_star = intval($cafe->orders_avg_review_star);
        $cafe->avg_review_star_comma = intval(($cafe->orders_avg_review_star - $cafe->avg_review_star) * 10);

        return view('pages.user.capster', compact('cafe'));
    }

    public function booking(Cafe $cafe) // booking tampilan
    {
        $cafe = Cafe::query()
            ->with('capsters')
            ->withCount('capsters')
            ->find($cafe->id);

        return view('pages.user.booking', compact('cafe'));
    }

    public function bookingStore(BookingRequest $bookingRequest, Cafe $cafe) // booking capster
    {
        $cafe->orders()->create($bookingRequest->validated() + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('user.profile');
    }

    public function profile()
    {
        $orders = Order::query()
            ->with(['capster', 'cafe'])
            ->whereBelongsTo(auth()->user())
            ->get();

        return view('pages.user.profile', compact('orders'));
    }

    public function about()
    {
        return view('pages.user.about');
    }

    public function review()
    {
        $order = Order::query()
            ->whereBelongsTo(auth()->user())
            ->find(request()->order_id);

        $validator = validator(request()->all(), [
            'review_star' => ['required', 'in:1,2,3,4,5', 'integer'],
            'review_text' => ['nullable']
        ]);

        $order->update($validator->validated() + [
            'status' => Order::STATUS_REVIEWED
        ]);

        return redirect()->route('user.profile');
    }

    public function cancel()
    {
        Order::query()
            ->whereBelongsTo(auth()->user())
            ->find(request()->order_id)
            ->update([
                'status' => Order::STATUS_CANCEL
            ]);

        return redirect()->route('user.profile');
    }

    public function search(){

    }
    
}


