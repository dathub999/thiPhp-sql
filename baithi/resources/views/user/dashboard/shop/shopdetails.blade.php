@extends('user.dashboard.shop.layout')
@section('show')
    <div class="product__details__pic">
        <div class="row">
            <div class=" col-md-1">
                <ul class="nav nav-tabs" role="tablist" style="">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab0" role="tab">
                            <div style="border-radius:15%" class="product__thumb__pic set-bg"
                                data-setbg="{{ asset('user') }}/img/product/{{ $product->photo }}">
                            </div>
                        </a>
                    </li>
                    @foreach ($imgs as $item)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-{{ $item->id }}" role="tab">
                                <div style="border-radius:15%" class="product__thumb__pic set-bg"
                                    data-setbg="{{ asset('user') }}/img/shop-details/{{ $item->photo }}">
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class=" col-md-6">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab0" role="tabpanel">
                        <div class="product__details__pic__item" style="margin-left: 30px">
                            <img style="width:400px;height:400px;float:left;border-radius:5%"
                                src="{{ asset('user') }}/img/product/{{ $product->photo }}" alt="">
                        </div>
                    </div>
                    @foreach ($imgs as $item)
                        <div class="tab-pane" id="tab-{{ $item->id }}" role="tabpanel">
                            <div class="product__details__pic__item" style="margin-left: 30px">
                                <img style="width:400px;height:400px;float:left;border-radius:5%"
                                    src="{{ asset('user') }}/img/shop-details/{{ $item->photo }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class=" col-md-5">
                <div style="" align="center">
                    <h3 align="center" style="text-transform: uppercase;">{{ $product->name }}</h3>
                    <h4 align="center">${{ $product->price }}</h4>
                    <br>
                    <button href="{{ url('/shop/buy/')}}{{$product->id}}"  style="width:220px;border-radius:6px;vertical-align: bottom; " align="center"
                        class="btn btn-warning">Mua</button>
                    <a href="{{ url('addorder/' . $product->id) }}"><img
                            style="width:40px;height:40px;background-color:rgb(236, 179, 10);border-radius:5px"
                            src="{{ asset('user') }}/img/icon/cart1.png" alt="{{ $product->name }}"></a>
                    <br>
                    <br>
                    <p><b>->Product details : </b>{{ $product->details }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
              </div></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products_c as $item)
                @if ($item->id != $product->id)
                    <div class=" col-md-3 ">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('user') }}/img/product/{{ $item->photo }}">
                                {{-- <span class="label">Sale</span> --}}
                                <ul class="product__hover">
                                    <li><a href="{{ url('shop/' . $item->id) }}"><img style="width:40px;height:40px"
                                                src="{{ asset('user') }}/img/icon/search.png" alt=""></a>
                                    </li>
                                    <li><a id="cart" href="{{ url('addorder/' . $item->id) }}"><img
                                                style="width:40px;height:40px" src="{{ asset('user') }}/img/icon/cart1.png"
                                                alt="{{ $item->name }}"></a>
                                    </li>
                                </ul>
                                @if ($item->quantity == 0)
                                    <span style="background-color: rgb(255, 0, 0);font-size:20px;color:aliceblue;">het
                                        hang</span>
                                @else
                                @endif
                            </div>
                            <div class="product__item__text" style="display: block">
                                <h6>{{ $item->name }}</h6>
                                <a href="{{ url('/shop/buy/')}}{{$item->id}}" class="add-cart">
                                    <button type="button" style="width:185px;border-radius:6px;display:block "
                                        align="center" class="btn btn-warning " >BUY</button> </a>
                                {{-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> --}}
                                <h5>${{ $item->price }}</h5>
                            </div>
                        </div>
                    </div>
                @else
                @endif
            @endforeach
        </div>
    </div>
@endsection
