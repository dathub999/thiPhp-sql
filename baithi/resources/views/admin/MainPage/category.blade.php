<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <div align="center">
        <h2>Category List</h2>
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
                            </select>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form action="{{url('/admin/Search_Category')}}" method="get">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="search" class="form-control form-control-sm" placeholder="Search Category" name="search_category">
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
                    <th>Category's ID</th>
                    <th>Photo</th>
                    <th>Category's Name</th>
                    <th>Category's Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($categorys as $category)
            <tbody>
                <tr>
                    <td>{{$category->id}}</td>
                    <td><img src="{{asset('user/img/category')}}/{{$category->photo}}" alt="pic" style="width: 70px;"></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="{{url('/admin/delete_category/'.$category->id)}}" onclick="return confirm('Are you sure !?')">
                            Delete
                        </a> |
                        <a href="{{url('/admin/edit_category/'.$category->id)}}">Edit</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/admin/addcategory')}}">
                    <button class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Add Category</button>
                </a>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>