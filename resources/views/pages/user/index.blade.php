@extends('layouts.user.app')

@section('content')
    {{-- <div class="recom-area">
        <div class="recom-area-header">
            <h2>Recommendations<span> for you :</span></h2>
        </div>
        <div class="recom-area-content">
            @foreach ($cafes as $cafe)
                @if ($loop->index == ceil(($cafeCount - 1) / 2))
                    <input type="radio" name="slider" id="slide_{{ $loop->index }}" value="{{ $loop->index }}"
                        class="slider_radio" checked>
                @else
                    <input type="radio" name="slider" id="slide_{{ $loop->index }}" value="{{ $loop->index }}"
                        class="slider_radio">
                @endif
            @endforeach

            <div class="slides-holder">
                @foreach ($cafes as $cafe)
                    <label for="slide_{{ $loop->index }}" class="slider-item"
                        onclick="CardSelected({{ $loop->index }})">
                        <div class="card shop-card">

                            <div class="shop-image" style="background-image: url('{{ asset($cafe->photo) }}')"></div>

                            <div class="shop-desc">
                                <h3 class="shop-name">{{ $cafe->name }}</h3>
                                <h4 class="shop-address">{{ $cafe->address }}</h4>
                                <div class="shop-rating">
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
                                <a class="shop-detail" href="{{ route('user.detail', $cafe) }}">View Detail</a>
                            </div>
                        </div>
                    </label>
                @endforeach

                <div id="nextBtn" class="recom-next" onclick="changeSlide(1)">&gt;</div>
                <div id="prevBtn" class="recom-prev" onclick="changeSlide(-1)">&lt;</div>
            </div>
        </div>
    </div> --}}
    <!-- features section starts  -->

    <!-- home section starts  -->

<section class="home">

    <div class="content">
        <div class="hero-slider-content-2">
            <h4 class="animated">Trade-in offer</h4>
            <h2 class="animated fw-900">Supper value deals</h2>
            <h1 class="animated fw-900 text-brand">On all products</h1>
            <a class="animated btn btn-brush btn-brush-3" href="product-details.html"> Shop Now </a>
        </div>
        {{-- <h3>fresh and <span>organic</span> products for your</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam libero nostrum veniam facere tempore nisi.</p>
        <a href="#" class="btn">shop now</a> --}}
    </div>
    <div class="single-slider-img single-slider-img-1">
        <img class="animated slider-1-1" src="assets/image/bg/home-img-3.png" alt="">
    </div>

</section>

<!-- home section ends -->
    

<section class="features" id="features">

    <h1 class="heading"><span>List Caffe</span></h1>
    <div class="box-container">
        @foreach ($cafes as $cafe)
        <div class="box">
            <img src="{{ asset($cafe->photo) }}" alt="">
            <h3>{{ $cafe->name }}</h3>
            <h4>{{ $cafe->address }}</h4>
            <div class="shop-rating">
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
            <a class="btn" href="{{ route('user.detail', $cafe) }}">View Detail</a>
        </div>
        @endforeach
        {{-- <div class="box">
            <img src="assets/image/feature-img-2.png" alt="">
            <h3>free delivery</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="assets/image/feature-img-3.png" alt="">
            <h3>easy payments</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="#" class="btn">read more</a>
        </div> --}}

    </div>

</section>

<!-- features section ends -->
@endsection

@section('additional-script')
@endsection
