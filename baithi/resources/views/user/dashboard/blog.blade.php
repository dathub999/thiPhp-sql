@extends('user.layout.layout')
@section('content')

<section class="breadcrumb-blog set-bg" data-setbg="{{asset('user')}}/img/hero/hero-2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Blog</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('user')}}/img/blog/blog-1.jpeg"></div>
                    <div class="blog__item__text">
                        <span><img src="{{asset('user')}}/img/icon/calendar.png" alt=""> 13 July 2023</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="{{url('/blogrm')}}">Read More</a>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('user')}}/img/blog/blog-2.jpeg"></div>
                    <div class="blog__item__text">
                        <span><img src="{{asset('user')}}/img/icon/calendar.png" alt=""> 13 February 2023</span>
                        <h5>Eight ways to eat healthy and lead a healthier life</h5>
                        <a href="{{url('/blogrm2')}}">Read More</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection