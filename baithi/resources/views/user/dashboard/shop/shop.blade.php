@extends('user.dashboard.shop.layout')
@section('show')
    <div class="shop__product__option">
        <div class="row">
            <div class="col-md-6">
                {{-- <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div> --}}
            </div>
            <div class="col-md-6">
                <div class="shop__product__option__right">
                    <p>Sort by Price:</p>
                    <select>
                        <option value="">Low To High</option>
                        <option value="">$0 - $55</option>
                        <option value="">$55 - $100</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row addorderr" data-url={{ url('addorder') }} >
            @foreach ($products as $item)
                <div class=" col-md-3 ">
                    <div class="product__item sale">

                        <div class="product__item__pic set-bg"
                            data-setbg="{{ asset('user') }}/img/product/{{ $item->photo }}">
                            {{-- <span class="label">Sale</span> --}}
                            <ul class="product__hover">
                                <li><a href="{{ url('shop/id/' . $item->id) }}"><img style="width:40px;height:40px"
                                            src="{{ asset('user') }}/img/icon/search.png" alt=""></a>
                                </li>
                                <li><a id="cart" class="addorder" data-id="{{ $item->id }}" href=""><img
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
                        <div class="product__item__text">
                            <h6>{{ $item->name }}</h6>
                            <a  data-id="{{ $item->id }}" href="{{ url('/shop/buy/') }}/{{ $item->id }}" class="btn btn-warning add-cart addorder"
                                style="width:185px;border-radius:6px;" align="center">BUY</a>
                            {{-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> --}}
                            <h5>${{ $item->price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                
                     {{ $products->links('pagination::bootstrap-5') }}
                    
                    
            </div>
        </div>
    </div>
@endsection
<script>
    // $(function ad() {
    //     $.ajax({
    //         url: 'localhost:8000',
    //         type: 'POST',
    //         data: {
    //             id: 1
    //         },
    //         success: function() {
    //             alert("Settings has been updated successfully.");
    //         }
    //     });
    // });
</script>
