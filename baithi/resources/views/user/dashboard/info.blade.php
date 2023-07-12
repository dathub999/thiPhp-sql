@extends('user.layout.layout')
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <h2 style="color:#000000; " align="center">Infomation</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div style="width:100%;height:190px">
                    <img align="center" src="{{ asset('images/bginfo1.jpg') }}"
                        alt=""style="width: 500px;height:150px; display:block;margin-left: auto; margin-right: auto;">

                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8"><img align="center" src="{{ asset('images/bginfo1.jpg') }}"
                            alt=""style="width: 100px;height:100px; display:block;color: #fff;
                                    position: absolute;bottom:20px">
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="clo-md-5"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 align="center"><b>{{session('username')}}</b></h4>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-md-2"></div> -->
            <div class="col-md-12">
                <table align="center" width="100px" >
                    <tr >
                        <td style="text-align: left;" >Name</td>
                        <td style="text-align: right;">{{ $user[0]->name }}</td>
                    </tr>
                    <tr >
                        <td style="text-align: left;padding-left:10px">Age </td>
                        <td style="text-align: right;padding-right:10px">{{ $user[0]->age }}</td>

                    </tr>
                    <tr >
                        <td style="text-align: left;padding-left:10px">Address </td> 
                        <td style="text-align: right;padding-right:10px">
                            {{ $user[0]->address }}
                        </td>
                    </tr>
                    <tr >
                        <td style="text-align: left;padding-left:10px">Email </td> 
                        <td style="text-align: right;padding-right:10px">
                            {{ $user[0]->email }}
                        </td>
                    </tr>
                    <tr >
                        <td style="text-align: left;padding-left:10px">Phone</td> 
                        <td style="text-align: right;padding-right:10px">
                            {{ $user[0]->phone }}
                        </td>
                    </tr>
                </table>
            </div>
            <!-- <div class="col-md-2"></div> -->
        </div>

        {{-- <h4 align="center"><b> 
            <div style="width:500px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table border="1">
                                <tr>
                                    <td class="td">NAME</td>
                                    <td>nguyuen thanh</td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td>18</td>

                                </tr>
                                <tr width="500px">
                                    <td>ADDRESS</td>
                                    <td rowspan="2">
                                        kjdshv,vfnsw,fsdsadssadsadsadsdsadsadsadsadsadsadsan
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div> --}}
    </div>
@endsection
