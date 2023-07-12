@extends('user.layout.layout')
@section('content')
<!-- Map End -->
<!-- Contact Section Begin -->
<div class="contacts" style="width:100%;">

    <h2 align="center">
        <b>Contact Us</b>
    </h2>
</div>

<section class="contact spad">
    <div class="container ">
        <div class="row">


            <div class="col-md-4">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Information</span>
                    </div>
                    <ul>
                        <li>
                            <h4>Aptech</h4>
                            <p>35/6 Đường D5 , Phường 25 , Bình Thạnh <br />Thành phố Hồ Chí Minh Việt Nam.</p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact__form">
                    <form action="{{'/send'}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">@yield('abc')</div>
                            </div>
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" placeholder="Name" name="name">
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="Email" name="email">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Phone Number" name="phone">
                            </div>
                            
                            <div class="col-md-12">
                                <textarea placeholder="Message" name="mess"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0603602740275!2d106.71160187457006!3d10.806689089343946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ed00409f09%3A0x11f7708a5c77d777!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgVGjhu5FuZyDEkMOgbyB04bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIHThur8gQXB0ZWNo!5e0!3m2!1svi!2s!4v1687681449702!5m2!1svi!2s" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection