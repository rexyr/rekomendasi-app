@extends('layouts.guest')

@section('title')
    Capster Detail
@endsection

@section('content')
    <div class="detail-area">
        <div class="detail-area-header">
            <div class="detail-header-btn">

                <a class="back-btn" href="{{ route('user.detail', $barber) }}"><span>&lt;</span>
                    <h4>Back</h4>
                </a>
            </div>
            <h3><span>Capster </span>detail</h3>
            <div class="detail-header-btn">
                <!-- BIARKAN KOSONG UNTUK MEMPERTAHANKAN BENTUK -->
            </div>
        </div>

        <div class="detail-area-content">
            <div class="detail-card-area">
                <div class="card detail-card">
                    <div class="detail-card-image" style="background-image: url('{{ asset($barber->photo) }}')"></div>
                    <div class="booking-btn-area">

                        <a href="{{ route('user.booking', $barber) }}" class="booking-link">
                            <h3>Book Your</h3>
                            <h4>Schedule Now</h4>
                            <div class="booking-btn-icon-bg"></div>
                            <div class="booking-btn-icon"></div>
                        </a>

                    </div>
                </div>
            </div>

            <div class="detail-info-area">
                <div class="detail-info-header">
                    Capster {{ $barber->name }}
                    <div class="info-rating">
                        @for ($j = 1; $j <= 5; $j++)
                            @if ($j <= $barber->avg_review_star)
                                <div class="star-rating full-star"></div>
                            @else
                                @if ($barber->avg_review_star_comma > 0)
                                    <div class="star-rating point-{{ $barber->avg_review_star_comma }}-star">
                                    </div>
                                    @php
                                        $barber->avg_review_star_comma = 0;
                                    @endphp
                                @else
                                    <div class="star-rating empty-star"></div>
                                @endif
                            @endif
                        @endfor

                        <h4>({{ $barber->orders_avg_review_star }})</h4>

                    </div>
                </div>

                @for ($i = 0; $i < $barber->capsters_count; $i += 2)
                    <div class="capster-row">
                        @if ($barber->capsters_count > 1)
                            @for ($j = 0; $j < 2; $j++)
                            @break($j + $i == $barber->capsters_count)
                            <div class="capster-col">
                                <img class="capster-photo" src="{{ $barber->capsters[$i + $j]->photo }}" alt="">
                                <div class="capster-info">
                                    <h3>{{ $barber->capsters[$i + $j]->name }}</h3>
                                    <h5>{{ $barber->capsters[$i + $j]->age }} tahun</h5>
                                </div>
                            </div>
                        @endfor
                    @else
                        <div class="capster-col">
                            <img class="capster-photo" src="{{ $barber->capsters[$i]->photo }}" alt="">
                            <div class="capster-info">
                                <h3>{{ $barber->capsters[$i]->name }}</h3>
                                <h5>{{ $barber->capsters[$i]->age }} tahun</h5>
                            </div>
                        </div>
                @endif
            </div>
            @endfor
        </div>
    </div>
    </div>

@endsection
