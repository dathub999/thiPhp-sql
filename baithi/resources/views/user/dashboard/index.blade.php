@extends('user.layout.layout')
@section('content')

<section class="hero">

    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="{{asset('user')}}/img/hero/hero-3.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="{{asset('user')}}/img/hero/hero-2.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->

<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="addorderr" data-url="{{ url('addorder') }}">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    
                    <li data-filter=".new-arrivals" > <b>New Arrivals</b> </li>
                    
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach ($products as $item)
            <div class="col-md-2 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('user') }}/img/product/{{ $item->photo }}">
                        {{-- <span class="label">Sale</span> --}}
                        <ul class="product__hover">
                            <li><a href="{{ url('shop/id/' . $item->id) }}"><img style="width:40px;height:40px"
                                        src="{{ asset('user') }}/img/icon/search.png" alt=""></a>
                            </li>
                            <li><a class="addorder" data-id="{{ $item->id }}" href="{{ url('addorder/' . $item->id) }}"><img style="width:40px;height:40px"
                                src="{{ asset('user') }}/img/icon/cart1.png" alt=""></a>
                            </li>
                        </ul>
                        <span style="background-color: rgb(255, 0, 0);font-size:20px;color:aliceblue;">het hang</span>
                    </div> 
                    <div class="product__item__text" style="display: block">
                        <h6>{{ $item->name }}</h6>
                        <a class="addorder" data-id="{{ $item->id }}" href="{{ url('addorder/' . $item->id) }}" class="add-cart"><button type="button"
                                style="width:165px;border-radius:6px;display:block " align="center"
                        class="btn btn-warning" >BUY</button></a>
                        {{-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> --}}
                        <h5>$ {{ $item->price }} </h5>
                    </div> 
                </div>
            </div>
        @endforeach
            
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
{{-- <section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="{{asset('user')}}/img/product-sale.png" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        <h5>$29.99</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Deal Of The Week</span>
                    <h2>Multi-pocket Chest Bag Black</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
    
@endsection