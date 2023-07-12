<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="{{asset('admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @extends('admin.layout')
    @section('content')
    <div align="center">
        <h2>Users List</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <form>
                            @csrf
                            <select id="Choose" name="Choose" class="form-select form-select-sm">
                                <option>Filter</option>
                                <option value="{{Request::url()}}?choose=male">Male</option>
                                <option value="{{Request::url()}}?choose=female">Female</option>
                                <option value="{{Request::url()}}?choose=admin">Admin</option>
                                <option value="{{Request::url()}}?choose=user">User</option>
                            </select>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form action="{{url('/admin/Search_Users')}}" method="get">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="search" class="form-control form-control-sm" placeholder="Search Users" name="search_users">
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
                    <th>ID</th>
                    <th>Username</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{$user->userid}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->age}}</td>
                    <td>
                        @if($user->sex == 1)
                        Male
                        @elseif($user->sex == 0)
                        Female
                        @else
                        ''
                        @endif
                    </td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        @if($user->role_id == 1)
                        Admin
                        @elseif($user->role_id == 2)
                        User
                        @endif
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection
</body>

</html>