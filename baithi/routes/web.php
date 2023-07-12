<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CreateController;
use App\Http\Controllers\admin\EditController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\DashBoardController;
use Illuminate\Support\Facades\Route;
Route::group(['namespace'=>'user'], function(){//tạo đường dẫn chung    
        
    
        Route::get('/addorder',[CartController::class,'addorder']);
        
        
        
        Route::get('/123',[CartController::class,'test']);

        Route::get('/',[DashBoardController::class,'index']);

        Route::post('/send',[DashBoardController::class,'send'])->middleware('throttle:2,1');
        Route::get('/success',[DashBoardController::class,'success']);
        Route::get('/blog',[DashBoardController::class,'blog']);
        Route::get('/index',[DashBoardController::class,'index'])->name('home');
        Route::get('/contacts',[DashBoardController::class,'contacts']);
        Route::get('/account',[DashBoardController::class,'account']);
        Route::get('/search',[DashBoardController::class,'search']);
        Route::get('/blogrm',[DashBoardController::class,'blogrm']);
        Route::get('/blogrm1',[DashBoardController::class,'blogrm1']);
        Route::get('/blogrm2',[DashBoardController::class,'blogrm2']);
        
        Route::get('/searchprice/{id}',[DashBoardController::class,'searchprice']);
        Route::get('/updatecart',[CartController::class,'updatecart']);
        Route::get('/removeorder/{id}',[CartController::class,'remove']);
        Route::group(['prefix'=>'shop'],function(){
            Route::get('/',[DashBoardController::class,'shop']);
            Route::get('/id/{id}',[DashBoardController::class,'details']);
            Route::get('/category/{id}',[DashBoardController::class,'product_categogy']);
            Route::get('/buy/{id}',[CartController::class,'buy']);
            Route::get('/savecart',[CartController::class,'savecart']);//chuc nang
            Route::get('/paidcart',[CartController::class,'layoutpaidcart']);// hien thi giao dien
            Route::get('/payment',[CartController::class,'payment']);

        });

        Route::get('/new',[DashBoardController::class,'new']);
        Route::group(['prefix'=>'login'],function(){
            Route::get('/signin', [DashBoardController::class, 'signin']);// Đường dẫn GET để hiển thị form đăng nhập
            Route::post('/signincheck', [DashBoardController::class, 'signincheck']);// Đường dẫn POST để xử lý đăng nhập
            Route::get('/logout', [DashBoardController::class, 'logout']);
            Route::get('/signup', [DashBoardController::class, 'signup']);
            // // Đăng nhập và xử lý đăng nhập
            Route::post('/add', [DashBoardController::class, 'add']);
            Route::post('/update',[DashboardController::class,'update']);
            // Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
            // Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);            
            // // Đăng xuất
            // Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);
        });
    Route::group(['prefix'=>'pages'],function(){
        Route::get('aboutus',[DashBoardController::class,'aboutus']);
        Route::get('shoppingcart',[CartController::class,'index']);
        Route::get('shopdetails',[DashBoardController::class,'shopdetails']); 
    });
});
Route::group(['middleware' => 'admin'], function () {
    // Các route cho phần quản trị tại đây
    route::group(['namespace'=>'admin','prefix'=>'admin'], function(){
        route::get('/home',[AdminController::class,'Home']);
        route::get('/orderslist',[AdminController::class,'Orders']);
        route::get('/order_details/{id}',[AdminController::class,'Order_Details']);
        route::get('/productlist',[AdminController::class,'Product']);
        route::get('/category',[AdminController::class,'Category']);
        route::get('/management',[AdminController::class,'Management']);
        route::get('/userlist',[AdminController::class,'Users']);
        route::get('/contact',[AdminController::class,'Contact']);
        
    
        route::get('/delete_product/{id}',[AdminController::class,'Delete_Product']);
        route::get('/delete_category/{id}',[AdminController::class,'Delete_Category']);
    
        route::get('/addproduct',[CreateController::class,'AddProduct']);
        route::post('/save_product',[CreateController::class,'Save_Product']);
        route::get('/edit_product/{id}',[EditController::class,'Edit_Product']);
        route::post('/update_product',[EditController::class,'Update_Product']);
    
    
        route::get('/addcategory',[CreateController::class,'AddCategory']);
        route::post('/save_category',[CreateController::class,'Save_Category']);
        route::get('/edit_category/{id}',[EditController::class,'Edit_Category']);
        route::post('/update_category',[EditController::class,'Update_Category']);
    
        route::get('/Search_Product',[AdminController::class,'Search_Product']);
        route::get('/Search_Management',[AdminController::class,'Search_Management']);
        route::get('/Search_Category',[AdminController::class,'Search_Category']);
        route::get('/Search_Contact',[AdminController::class,'Search_Contact']);
    
        route::post('/update_quantity',[EditController::class,'Update_Quantity']);
        route::get('/Search_Orders',[AdminController::class,'Search_Orders']);
        route::get('/Search_Users',[AdminController::class,'Search_Users']);
        route::get('/adduser',[CreateController::class,'AddUser']);
        route::post('/save_user',[CreateController::class,'Save_User']);
    
        Route::get('/logout', [AdminController::class, 'logout']);
        route::post('/delivered',[EditController::class,'Delivered']);
        route::post('/undelivered',[EditController::class,'Undelivered']);
    });
});
// Khi người dùng không phải là quản trị viên và cố gắng truy cập vào "/admin/home", họ sẽ bị chuyển hướng đến đường dẫn gốc (ở đây là "/") hoặc bạn có thể chuyển hướng đến trang thông báo lỗi khác tuỳ theo yêu cầu của bạn.


/* dat commit */




