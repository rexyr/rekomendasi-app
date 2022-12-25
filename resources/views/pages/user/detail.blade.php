@extends('layouts.user.app')


@section('content')
<div class="detail-area">
    <div class="detail-area-header">
        <div class="detail-header-btn">
            <a class="back-btn" href="{{ route('user.home') }}"><span>&lt;</span>
                <h4>Back</h4>
            </a>
        </div>
        <h3><span>cafeshop </span>detail</h3>
        <div class="detail-header-btn">
            <a class="choose-capster-btn" href="{{ route('user.capster', $cafe) }}">
                <h4>See Capster</h4><span>&gt;</span>
            </a>
        </div>
    </div>
    <div class="detail-area-content">
        <div class="detail-card-area">
            <div class="card detail-card">
                <div class="detail-card-image">
                    <img src="{{ asset($cafe->photo) }}" alt="asd">
                </div>
            </div>

            {{-- 'open' => date('H:i:s', rand(28800,36000)), // 08:00:00 - 10:00:00
        'close' => date('H:i:s', rand(77400,79200)), // 21:30:00 - 22:00:00 --}}
        </div>
        <div class="detail-info-area">
            <div class="detail-info-header">
                {{ $cafe->name }}
                <div class="info-rating">
                    @for ($j = 1; $j <= 5; $j++)
                        @if ($j <= $cafe->avg_review_star)
                            <div class="star-rating full-star"></div>
                        @else
                            @if ($cafe->avg_review_star_comma > 0)
                                <div class="star-rating point-{{ $cafe->avg_review_star_comma }}-star">
                                </div>
                                @php
                                    $cafe->avg_review_star_comma = 0;
                                @endphp
                            @else
                                <div class="star-rating empty-star"></div>
                            @endif
                        @endif
                    @endfor

                    <h4>({{ $cafe->orders_avg_review_star }})</h4>

                </div>
            </div>
            <div class="detail-info-row">
                <h5>Location :</h5>
                <h4>{{ $cafe->address }}</h4>
            </div>
            <div class="detail-info-row">
                <h5>Opening Hours :</h5>
                <h4>{{ $cafe->open->format('H:i') }} - {{ $cafe->close->format('H:i') }}</h4>
            </div>
            <div class="detail-info-row">
                <h5>Price :</h5>
                <h4>Rp. {{ number_format($cafe->price, 2) }},-</h4>
            </div>
            <div class="detail-info-row">
                <h5>Facilities :</h5>
                <h4>
                    @foreach ($cafe->facilities as $facilities)
                        {{ $facilities->name }}@if (!$loop->last), @endif
                    @endforeach
                </h4>
            </div>
            <div class="detail-info-row">
                <h5>Services :</h5>
                <h4>
                    @foreach ($cafe->services as $service)
                        {{ $service->name }}@if (!$loop->last), @endif
                    @endforeach
                </h4>
            </div>
        </div>
    </div>
</div>

@endsection
