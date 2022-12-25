@extends('layouts.guest')

@section('title')
    Booking Form {{ $barber->name }}
@endsection

@section('content')
    <div class="booking-area">

        <div class="booking-area-header">

            <div class="booking-header-btn">

                <a class="back-btn" href="{{ route('user.detail', $barber) }}"><span>&lt;</span>
                    <h4>Back</h4>
                </a>

            </div>

            <h3><span>Book your </span>schedule<span> at </span> <span class="yellow">{{ $barber->name }}</span>
            </h3>

            <div class="booking-header-btn">
                <!-- BIARKAN KOSONG UNTUK MEMPERTAHANKAN BENTUK -->
            </div>

        </div>

        <div class="booking-area-content">

            <form action="{{ route('user.booking.store', $barber) }}" method="POST">
                @csrf
                <div class="input-group-row">

                    <div class="input-group-col col-3">
                        <h2 class="smemew">Pick a date</h2>
                        <div class="input-group col-63">
                            <input type="date" id="date" name="order_date"
                                class="form-control no-padding @error('order_date') is-invalid @enderror"
                                value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" max="2022-04-20">
                        </div>
                        @error('order_date')
                            <div class="booking-error-message">
                                {{ $message }}
                            </div>
                        @enderror
                        <h2 class="smemew">Choose time</h2>
                        <div class="input-group col-63">
                            @php
                                $open = new DateTime($barber->open->format('H:i'));
                                $close = new DateTime($barber->close->format('H:i'));
                                $interval = DateInterval::createFromDateString('45 min');
                                $times = new DatePeriod($open, $interval, $close);
                            @endphp
                            <select name="order_time" id="time" class="form-control no-padding">

                                @foreach ($times as $time)
                                    <option value="{{ $time->format('H:i') }}">
                                        {{ $time->format('H:i') . ' - ' . $time->add($interval)->format('H:i') }}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('order_time')
                            <div class="booking-error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group-col col-7 vertical-margin-20">
                        <h2 class="smemew">Choose Capster</h2>
                        @error('capster_id')
                            <div class="booking-error-message">
                                {{ $message }}
                            </div>
                        @enderror
                        @for ($i = 0; $i < $barber->capsters_count; $i++)
                            <input type="radio" name="capster_id" id="capster{{ $i }}"
                                value="{{ $barber->capsters[$i]->id }}" class="capster-radio">
                        @endfor

                        @for ($i = 0; $i < $barber->capsters_count; $i += 2)
                            <div class="capster-row">
                                @if ($barber->capsters_count > 1)
                                    @for ($j = 0; $j < 2; $j++)
                                    @break($j + $i == $barber->capsters_count)
                                    <label for="capster{{ $i + $j }}" class="capster-choice"
                                        onclick="thisSelected({{ $i + $j }})">
                                        <img class="capster-choice-photo" src="{{ $barber->capsters[$i + $j]->photo }}"
                                            alt="">
                                        <div class="capster-choice-info">
                                            <h3>{{ $barber->capsters[$i + $j]->name }}</h3>
                                            <h5>{{ $barber->capsters[$i + $j]->age }} tahun</h5>
                                        </div>
                                    </label>
                                @endfor
                            @else
                                <label for="capster{{ $i }}" class="capster-choice"
                                    onclick="thisSelected({{ $i }})">
                                    <img class="capster-choice-photo" src="{{ $barber->capsters[$i]->photo }}" alt="">
                                    <div class="capster-choice-info">
                                        <h3>{{ $barber->capsters[$i]->name }}</h3>
                                        <h5>{{ $barber->capsters[$i]->age }} tahun</h5>
                                    </div>
                                </label>
                        @endif
                    </div>
                    @endfor
                </div>
        </div>

        <div class="input-group right">
            <button type="submit" class="form-btn col-3">Book Your Schedule</button>
        </div>
        </form>
    </div>
    </div>

@endsection
