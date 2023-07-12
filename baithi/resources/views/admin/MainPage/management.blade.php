<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Management</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <div align="center">
        <h2>Management Storage</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/admin/productlist')}}"><i class="fa fa-angle-left"> Product List</i></a>
                <div class="row">
                    <div class="col-md-2">
                        <form>
                            @csrf
                            <select id="Sort" name="Sort" class="form-select form-select-sm">
                                <option value="{{Request::url()}}?sort_by=none">--Sort By--</option>
                                <option value="{{Request::url()}}?sort_by=name_az">Name A -> Z</option>
                                <option value="{{Request::url()}}?sort_by=name_za">Name Z -> A</option>
                                <option value="{{Request::url()}}?sort_by=category_az">Category A -> Z</option>
                                <option value="{{Request::url()}}?sort_by=category_za">Category Z -> A</option>
                                <option value="{{Request::url()}}?sort_by=quantity_desc">Quantity Decrease</option>
                                <option value="{{Request::url()}}?sort_by=quantity_asc">Quantity Increase</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <form action="{{url('/admin/Search_Management')}}" method="get">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="search" class="form-control form-control-sm" placeholder="Search_Product"
                                name="search_product">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" align="center">
        <table class="table table-bordered" align="center" style="text-align: center;">
            <thead>
                <tr>
                    <th>Product's ID</th>
                    <th>Product's Name</th>
                    <th>Photo</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tbody>
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td><img src="{{asset('user/img/product')}}/{{$product->photo}}" alt="pics" style="width: 70px;"></td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category_name}}</td>
                    <form action="{{url('/admin/update_quantity')}}" method="post">
                        @csrf
                        <td class="input-group-text">
                            <input type="submit" class="form-control form-control-sm" value="- Export -" name="export">

                            <input type="number" style="width: 55px;" class="form-control form-control-sm" value="0" name="add_quantity">

                            <input type="submit" class="form-control form-control-sm" value="+ Import +" name="import">
                        </td>
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="current_quantity" value="{{$product->quantity}}">
                    </form>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection
</body>

</html>