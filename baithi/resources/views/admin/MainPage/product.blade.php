<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <div align="center">
        <h2>Product List</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <form>
                            @csrf
                            <select id="Sort" name="Sort" class="form-select form-select-sm">
                                <option value="{{Request::url()}}?sort_by=none">--Sort By--</option>
                                <option value="{{Request::url()}}?sort_by=name_az">Name A -> Z</option>
                                <option value="{{Request::url()}}?sort_by=name_za">Name Z -> A</option>
                                <option value="{{Request::url()}}?sort_by=price_desc">Price Decrease</option>
                                <option value="{{Request::url()}}?sort_by=price_asc">Price Increase</option>
                                <option value="{{Request::url()}}?sort_by=category_az">Category A -> Z</option>
                                <option value="{{Request::url()}}?sort_by=category_za">Category Z -> A</option>
                                <option value="{{Request::url()}}?sort_by=quantity_desc">Quantity Decrease</option>
                                <option value="{{Request::url()}}?sort_by=quantity_asc">Quantity Increase</option>
                            </select>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <form action="{{url('/admin/Search_Product')}}" method="get">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="search" class="form-control form-control-sm" placeholder="Search Product" name="search_product">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="{{url('/admin/addproduct')}}">
                            <button class="btn btn-primary form-control form-control-sm">
                                <i class="fas fa-plus"></i> Add Product
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product's ID</th>
                    <th>Product's Name</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tbody>
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td><img src="{{asset('user/img/product')}}/{{$product->photo}}" alt="pics" style="width: 70px;"></td>
                    <td>{{$product->price}}$</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <a href="{{url('/admin/delete_product/'.$product->id)}}" onclick="return confirm('Are you sure !?')">
                            Delete
                        </a> |
                        <a href="{{url('/admin/edit_product/'.$product->id)}}">
                            Edit
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection
</body>

</html>