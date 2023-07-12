<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Admin</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <!-- Content Header (Page header) -->
    <div align="center">
        <h2>Welcome Admin</h2>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><a href="{{url('/admin/productlist')}}" class="fas fa-boxes"></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Number of Product</span>
                            <span class="info-box-number">{{$number}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><a href="#" class="fas fa-users"></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Members</span>
                            <span class="info-box-number">{{$users}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>To Details</th>
                                        </tr>
                                    </thead>
                                    @foreach($orders as $order)
                                    <tbody>
                                        <input type="hidden" name="order_id" ">
                                        <td>{{$order->username}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>
                                            <a href=" {{url('/admin/order_details/'.$order->id)}}">Order's detail</a>
                                        </td>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class=" card-footer clearfix">
                            <a href="{{url('/admin/orderslist')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- PRODUCT LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recently Added Products</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach($products as $product)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{asset('user/img/product')}}/{{$product->photo}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        {{$product->name}}
                                        <span class="badge badge-warning float-right">{{$product->price}}$</span></a>
                                        <span class="product-description">
                                            {{$product->details}}
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{url('/admin/productlist')}}" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
</body>

</html>