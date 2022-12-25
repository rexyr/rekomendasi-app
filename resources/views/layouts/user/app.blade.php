<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">


</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> groco </a>

    <nav class="navbar">
        <a href="{{ route('user.home') }}">home</a>
        <a href="#features">features</a>
        <a href="#products">products</a>
        <a href="#categories">categories</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-calendar-check" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="{{ route('user.search') }}" class="search-form" method="get">
        <input type="search" name="search" id="search-box" placeholder="search here..." autofocus>
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="{{ url('assets/image/cart-img-1.png') }}" alt="">
            <div class="content">
                <h3>watermelon</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="{{ url('assets/image/cart-img-2.png') }}" alt="">
            <div class="content">
                <h3>onion</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="assets/image/cart-img-3.png" alt="">
            <div class="content">
                <h3>chicken</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="total"> total : $19.69/- </div>
        <a href="#" class="btn">checkout</a>
    </div>
<div class="sub-menu-warp">
    <div class="sub-menu">
        <div class="user-info">
            <img src="{{ url ('images/ProfilePictures/user.png') }}" alt="">
            <h2>james Aldrino</h2>
        </div>
        <hr>
        
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sub-menu-link">
            <img src="{{ url('images/icons/logout2.png') }}" alt="">
            <p>Logout</p>
            <span>></span>
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </div>
</div>
</header>

<!-- header section ends -->

<!-- products section starts  -->

{{-- <section class="products" id="products">

    <h1 class="heading">Recommended For You:</span></h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
            @foreach ($cafes as $cafe)
            <div class="swiper-slide box">
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
        </div>

    </div>


</section> --}}

<!-- products section ends -->

@yield('content')

<!-- footer section starts  -->


<!-- footer section ends -->














<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="{{ url('assets/js/script.js') }}"></script>


</body>
</html>