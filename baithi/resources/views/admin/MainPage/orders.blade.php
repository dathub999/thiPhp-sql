<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderslist</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <div align="center">
        <h2>Orders List</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <form>
                            @csrf
                            <select id="Sort" name="Sort" class="form-select form-select-sm">
                                <option>--Sort--</option>
                                <option value="{{Request::url()}}?sort_by=name_az">Name A -> Z</option>
                                <option value="{{Request::url()}}?sort_by=name_za">Name Z -> A</option>
                                <option value="{{Request::url()}}?sort_by=address_az">Address A -> Z</option>
                                <option value="{{Request::url()}}?sort_by=address_za">Address Z -> A</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form>
                            @csrf
                            <select id="Choose" name="Choose" class="form-select form-select-sm">
                                <option>Status</option>
                                <option value="{{Request::url()}}?choose=delivered">Delivered</option>
                                <option value="{{Request::url()}}?choose=undelivered">Undelivered</option>
                            </select>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <form action="{{url('/admin/Search_Orders')}}" method="get">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="search" class="form-control form-control-sm" placeholder="Search Orders" name="search_orders">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Username</th>
                    <th>Delivery To</th>
                    <th>Delivery Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    @if($order->payment == 1)
                        <tr>
                            <td>{{$order->orderid}}</td>
                            <td>{{$order->username}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->delivered}}</td>
                            <td>
                                <a href="{{url('/admin/order_details/'.$order->orderid)}}">Order's detail</a>
                            </td>
                        </tr>
                        <input type="hidden" name="orderid" value="{{$order->id}}">
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>

</html>