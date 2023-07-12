<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order_Details</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <div align="center">
        <h2>Orders Details</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer's Information</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Username</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$orders->orderid}}</td>
                                        <td>{{$orders->username}}</td>
                                        <td>{{$orders->phone}}</td>
                                        <td>{{$orders->email}}</td>
                                        <td>{{$orders->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer's Product</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product's Name</th>
                                        <th>Photo</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Total money</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_products as $order_prod)
                                    <tr>
                                        <td>{{$order_prod->product_name}}</td>
                                        <td><img src="{{asset('user/img/product')}}/{{$order_prod->product_photo}}" alt="pics" style="width: 70px; height: 70px;"></td>
                                        <td>{{$order_prod->quantity_product_order}}</td>
                                        <td>{{$order_prod->product_price}}$</td>
                                        <td>{{$order_prod->quantity_product_order * $order_prod->product_price}}$</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">Total Payable</td>
                                        <td>
                                            <?php $sum = 0 ?>
                                            @foreach($order_products as $order_prod)
                                            <?php
                                            $sum += ($order_prod->quantity_product_order * $order_prod->product_price);
                                            ?>
                                            @endforeach
                                            {{$sum}}$
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</body>

</html>