@extends('user.layout.layout')
@section('content')
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container" >
            <div class="row">
                <div class="col-md-8" style=" background-image: linear-gradient(rgb(255, 255, 255),rgb(255, 255, 255),rgb(255, 255, 255))">
                    <div class="shopping__cart__table">
                        <table class="table table-sm update_cart-url" border-radius="3px" data-url={{ url('updatecart') }}>
                            <thead style="background-color: rgb(131, 255, 100)">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th align="center">Total</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                    $id=0;
                                @endphp
                                @if (isset($cart))
                                    @foreach ($cart as $item)
                                    
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img style="width:100px;height:100px"
                                                        src=" {{ asset('user') }}/img/product/{{ $item['photo'] }}"
                                                        alt="">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6> {{ $item['name'] }}</h6>
                                                    <h5>$ {{ $item['price'] }}</h5>
                                                </div>

                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input class="qunatity" type="text"
                                                            value="{{ $item['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><b>$ {{ $item['price'] * $item['quantity'] }}</b></td>
                                            {{-- <td class="cart__close">
                                                <a href="{{ url('removeorder/' . $item['id']) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="" class="cart_update" data-id="{{$id}}" >
                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                </a>
                                            </td> --}}
                                            @php
                                                $total += $item['price'] * $item['quantity'];
                                                $id++;
                                            @endphp
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Chu co san pham duoc mua</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="continue__btn">
                                <a href="{{ url('shop') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total 
                                 <span>
                                    @php
                                        echo "$ ".$total;
                                    @endphp
                                </span>
                            </li>
                        </ul>
                            <button class="btn btn-success" style=" width:300px;"  >Paid</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
